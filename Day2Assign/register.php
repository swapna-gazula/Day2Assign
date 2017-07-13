<?php  include('server.php'); ?>
<!DOCTYPE  HTML>
<html>
<body>

  <div class ="header">
    <h1>Register</h1>
  </div>
        <form action="/cfgforum/register.php" method="post">
          <?php include('errors.php'); ?>
            <div class="input-group">
              User Name:
              <input type="text" name="username"><br>
            </div><br>

            <div class="input-group">
              Mobile Number:
              <input type="number" name="mobileno"><br>
            </div><br>

            <div class="input-group">
              Password:
              <input type="password" name="password"><br>
            </div><br>

            <div class="input-group">
              Confirm Password:
              <input type="password" name="confpassword"><br>
            </div><br>

            <div class="input-group">
                <button type="submit" name="register" class="btn">Register</button>
            </div><br>
            <p>
              Already a member<a href="login.php">Sign In</a>
            </p>
  </form>

</body>
</html>
