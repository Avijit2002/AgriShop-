
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>famrmer's registeration page Student Chapter</title>
  
</head>

<body>

  <?php
  require '../NAV/nav.php';
  require '../ADMIN/login_auth.php';
  ?>
  <?php
  if($showerror)
  {
    echo '<div style="z-index: 99999999;" class="alert alert-warning alert-dismissible fade show" role="alert">
    Invalid Credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  ?>
  

  <div class="container-fluid bg">
    <div class="container" id="mainArea">
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->

          <!-- Icon -->
          <div class="fadeIn first">
            <img src="img/user.png" id="icon" alt="User Icon" class="mt-2" />
          </div>
          <br>
          <!-- Login Form -->
          <form method="POST" action="../ADMIN/login.php">
            <input type="email" id="username" class="fadeIn second" name="email" placeholder="Enter your email" required />
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter your password" required />
            <input type="submit" class="fadeIn fourth mt-3 mb-3" name="user_login" value="Login" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>