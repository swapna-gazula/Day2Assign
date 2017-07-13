<?php  include('server.php'); ?>
<!DOCTYPE  HTML>
<html>
<body>

  <div class ="header">
    <h1>Login</h1>
  </div>
        <form action="/cfgforum/login.php" method="post">
          <?php include('errors.php'); ?>
            <div class="input-group">
            Mobile Number:
                <input type="number" name="mobileno" ><br>
            </div><br>

            <div class="input-group">
              Password:
                <input type="password" name="password" ><br>
            </div><br>

            <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
            </div><br>
            <p>
              Not a member yet?<a href="register.php">Sign Up</a>
            </p>

  </form>


</body>
</html>
