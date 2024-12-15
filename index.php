<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link
      rel="icon"
      href="photos/logo.PNG"
      type="image/x-icon"
    />
</head>
<body>
  <style>
    /* Global Styles */
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #062E69;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }
  
  /* Login Container */
  .login-container {
    width: 100%;
    max-width: 400px;
    background-color: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
  }
  
  .login-box h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
    color: #062E69;
  }
  
  .login-box p {
    margin-bottom: 20px;
    color: #c4c4d6;
    font-size: 1em;

  }.login-box img {
    margin-bottom: 10px;
    height: 50%;
    width: 25%;
    border: 50%;
  }


  .login-box p {
    margin-bottom: 20px;
    color: #062E69;
    font-size: 1em;
  }

  /* Form Styles */
  .login-form {
    display: flex;
    flex-direction: column;
  }
  
  .input-group {
    margin-bottom: 20px;
    text-align: left;
  }
  
  .input-group label {
    font-size: 0.9em;
    color: #062E69;
    margin-bottom: 5px;
    display: block;
  }
  
  .input-group input {
    width: 95%;
    padding: 10px;
    font-size: 1em;
    border-radius: 8px;
    border: 1px solid #062E69;
    background-color: #224ddc;
    color: #fff;
    outline: none;
    transition: border-color 0.3s ease;
  }
  
  .input-group input:focus {
    border: 1px solid #224ddc;
  }
  
  .login-btn {
    background-color: #062E69;
    color: #fff;
    border: none;
    padding: 10px;
    font-size: 1em;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .login-btn:hover {
    transform: scale(1.05);
  }
  
  /* Links */
  .links {
    margin-top: 15px;
  }
  
  .links a {
    font-size: 0.9em;
    color: #7f5af0;
    text-decoration: none;
    margin: 0 10px;
    transition: color 0.3s ease;
  }
  
  .links a:hover {
    color: #c4b0ff;
  }
  
  /* Responsive */
  @media (max-width: 480px) {
    .login-box h1 {
      font-size: 2em;
    }
  
    .login-box p {
      font-size: 0.9em;
    }
  
    .login-btn {
      font-size: 0.9em;
      padding: 8px;
    }
  
    .input-group input {
      font-size: 0.9em;
    }
  }
  
  </style>
  <div class="login-container">
    <div class="login-box">
      <img src="photos/logo.PNG">
      <h1>HK_Cuisine</h1>
      <p>Se connecter pour continuer</p>

          <?php 
          session_start();
          session_destroy();
          session_start();
          $db = new PDO('mysql:host=localhost;dbname=bd_hk', 'root', '');

          if (isset($_POST['connexion'])) {
                                    extract($_POST);
              $insertion = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
              $insertion->execute(array($username, $password));
              $checkuser = $insertion->rowCount();
                                
              if ($checkuser == 1) {
                  $userinfo = $insertion->fetch();
                  if ($userinfo) {
                      $_SESSION['id'] = $userinfo['id'];
                      $_SESSION['username'] = $userinfo['username'];
                      $_SESSION['noms'] = $userinfo['noms'];
                      $_SESSION['fonction'] = $userinfo['fonction'];
                      $_SESSION['tel'] = $userinfo['tel'];
                      
                      header("location:loader.html?id=" . $_SESSION['id']);
                  }
                  } else {
                      echo '<div id="errorMessage" style="color: red; font-weight: bold; font-size:14px; margint: 15px;">';
                      echo "Cet utilisateur n'existe pas";
                      echo "</div>";
                  }
              }
          ?>
          <script>
              // Masquer le message d'erreur après 5 secondes
              setTimeout(function() {
                  var errorMessage = document.getElementById('errorMessage');
                  if (errorMessage) {
                                        errorMessage.style.display = 'none'; // Cache l'élément
                  }
              }, 2500); // 5000 ms = 5 secondes
          </script>

      <form class="login-form" method="post">
        <div class="input-group">
          <label for="email">Nom d'utilisateur</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="login-btn" name="connexion">Connexion</button>
      </form>
    </div>
  </div>
</body>
</html>
