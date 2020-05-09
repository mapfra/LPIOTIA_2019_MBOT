<!doctype html>
<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Connection mbot</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="assets/css/login.css" rel="stylesheet" id="bootstrap-css">


  <!-- Responsive css-->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <a href="">Projet Mbot</a>
      </div>

      <?php 
      //connexion bdd
      $host="localhost";
      $user="root";
      $password="totolharicot";
      $db="mbot";

      $link = mysqli_connect($host,$user,$password,$db);

      if (!$link) {
       echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
     }


     

     //verification formulaire
     if(isset($_POST['username'])){

      $uname=$_POST['username'];
      $password=$_POST['password'];
      $hash = '$2y$10$SDsrxcQ03JzfKQwhR4GOpudDqWmcgJ0od.YphR2vbz1JPHXZcFVn.';


      $result = mysqli_query($link, "SELECT * FROM utilisateur where pseudo='".$uname."' limit 1");

      // if(mysqli_num_rows($result)==1){
      //   echo " You Have Successfully Logged in";
      //   //header("Location: http://83.159.82.89:8080/");
      //   exit();
      // }
      // else{
      //   echo " You Have Entered Incorrect Password";
      //   exit();
      // }

      if (password_verify($_POST['password'], $hash)and mysqli_num_rows($result)==1)) {
        echo 'Le mot de passe est valide !';
        header("Location: http://83.159.82.89:8080/board.php");
        exit();
      } 
      else {
        echo 'Le mot de passe est invalide.';
      }

    }
    mysqli_close($link);

    ?>

    <!-- Login Form -->
    <form method="POST" action="">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Identifiant">
      <input type="password" class="fadeIn third" name ="password" id="password" placeholder="Password">
      
      <input type="submit" class="fadeIn fourth" value="Connection" href="localhost/mbot.php">
    </form>

  </div>
</div>
</body>
</html>
