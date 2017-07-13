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
    $confpassword = ($_POST['confpassword']);

    $sql0 = "SELECT mobileno FROM users WHERE mobileno='$mobileno'";
    $dup = mysqli_query($db, $sql0);

    if(empty($username)||empty($mobileno)||empty($password)||empty($confpassword)){
      array_push($errors,"Please enter your details");
    } elseif (mysqli_num_rows($dup) >0) {
        array_push($errors,"Already Existing Mobile Number");
    } elseif ($password != $confpassword) {
      array_push($errors,"Password mismatch");
    }
    else {
      if(count($errors)==0){
        $enpassword=md5($password);
        $sql = "INSERT INTO users (username,mobileno,password)
                            VALUES('$username','$mobileno','$enpassword')";
        $result = mysqli_query($db, $sql);

        if($result){
          $_SESSION['mobileno'] = $mobileno;
          $_SESSION['success'] = "You are now logged in!";
          header('location: index.php');
        }
        else{
              array_push($errors,"Error Registering");
        }

      }
    }

  }

    if(isset($_POST['login'])){
      $mobileno =($_POST['mobileno']);
      $password = ($_POST['password']);

      if(empty($mobileno)||empty($password)){
        array_push($errors,"Please enter the details");
      }
      if(count($errors)==0){
        $enpassword=md5($password);
        $sql2 = "SELECT * FROM users
          WHERE mobileno='$mobileno' AND password='$enpassword'";
        $res=mysqli_query($db, $sql2);
        if (mysqli_num_rows($res)==1) {
          $_SESSION['mobileno'] = $mobileno;
          $_SESSION['success'] = "You are now logged in!";
          header('location: index.php');
        }else {
          array_push($errors,"Invalid Credentials. Please try again!");

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
