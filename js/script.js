navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
        var video = document.getElementById('video');
        video.srcObject = stream;
        video.play();
    })
    .catch(function(err) {
        console.log("Une erreur s'est produite : " + err);
    });

var captureBtn = document.getElementById('capture-btn');
var photo = document.getElementById('photo');
var canvas = document.getElementById('canvas');
var uploadBtn = document.getElementById('upload-btn');
var refresh = document.getElementById('capture-refresh');

captureBtn.addEventListener('click', function() {
    var video = document.getElementById('video');
    var context = canvas.getContext('2d');

    // Dessiner l'image de la vidéo sur le canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Obtenir l'URL de l'image capturée
    var dataURL = canvas.toDataURL();

    // Afficher l'image capturée
    photo.setAttribute('src', dataURL);
    photo.style.maxHeight = video.offsetHeight + 'px'; // Définir la hauteur maximale de l'image

    // Masquer la vidéo et afficher la photo
    video.style.display = 'none';
    photo.style.display = 'block';
    uploadBtn.style.display = 'block';
    refresh.style.display = 'block';
    

    // Envoyer l'image sur le serveur
    var file = dataURLtoFile(dataURL, 'captured_image.png');
    var formData = new FormData();
    formData.append('image', file);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log('Image uploaded successfully');
    })
    .catch(error => {
        console.error('Error uploading image:', error);
    });
});

uploadBtn.addEventListener('click', function() {
    // L'action de l'upload est effectuée dans le gestionnaire d'événement du bouton de capture
    uploadBtn.style.display = 'none';
});

function dataURLtoFile(dataurl, filename) {
    var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
    while(n--){
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new File([u8arr], filename, {type:mime});
}