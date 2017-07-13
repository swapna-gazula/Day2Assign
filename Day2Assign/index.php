
<?php
include('server.php');

if (empty($_SESSION['mobileno'])) {
  header('location: login.php');
}
 ?>
<!DOCTYPE  HTML>
<html>
<body>

  <div class ="header">
    <h1>Home Page</h1>
  </div>

  <div class="content">
    <?php if (isset($_SESSION['success'])): ?>
      <div class="error success">
        <h3>
          <?php
              echo $_SESSION['success'];
              unset($_SESSION['success']);
           ?>
        </h3>

      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['mobileno'])): ?>
      <p>Welcome <strong><?php echo $_SESSION['mobileno']; ?></strong> User</p>
      <p><a href="index.php?logout='1'" style="color:red;">Log out</a></p>
    <?php endif; ?>
  </div>

</body>
</html>
