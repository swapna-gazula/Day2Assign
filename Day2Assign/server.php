<?php
  session_start();

  $username="";
  $mobileno=0;
  $errors = array();

  $db = mysqli_connect('localhost','root','','cfgforum');

  if(isset($_POST['register'])){
    $username =($_POST['username']);
    $mobileno = ($_POST['mobileno']);
    $password = ($_POST['password']);

    if(empty($username)||empty($mobileno)||empty($password)){
      array_push($errors,"Please enter your details");
    }
    if(count($errors)==0){
      $sql = "INSERT INTO users (username,mobileno,password)
                          VALUES('$username','$mobileno','$password')";
      mysqli_query($db, $sql);
      $_SESSION['mobileno'] = $mobileno;
      $_SESSION['success'] = "You are now logged in!";
      header('location: index.php');
    }
  }

    if(isset($_POST['login'])){
      $mobileno =($_POST['mobileno']);
      $password = ($_POST['password']);

      if(empty($mobileno)||empty($password)){
        array_push($errors,"Please enter the details");
      }
      if(count($errors)==0){
        $sql2 = "SELECT * FROM users
          WHERE mobileno='$mobileno' AND password='$password'";
        $res=mysqli_query($db, $sql2);
        if (mysqli_num_rows($res)==1) {
          $_SESSION['mobileno'] = $mobileno;
          $_SESSION['success'] = "You are now logged in!";
          header('location: index.php');
        }else {
          array_push($errors,"Invalid Credentials. Please try again!");
          //header('location: login.php');

        }

      }
    }

    if (isset($_GET['logout'])) {
      echo 'test';
      session_destroy();
      unset($_SESSION['mobileno']);
      header('location: login.php');
    }



?>
