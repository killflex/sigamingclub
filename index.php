<!DOCTYPE html>
<html lang="en">
    <?php include 'style1.php'; ?>
    <body class="hold-transition login-page">
      <div class="login-box">
        <div class="card card-outline card-primary pb-1">
          <div class="card-header text-center">
            <h2 class="mt-1"><b>LOGIN</b></h2>
          </div>
          <div class="card-body">
            <form action="cek_login.php" method="post">
              <div class="input-group mt-1 mb-3">
                <input name="username" type="text" class="form-control" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-2">
                <input name="password" type="password" class="form-control" placeholder="Password" id="spw">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-key" style="font-size: 14px;"></span>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-8">
                  <div class="mt-1">
                    <input class="mr-1" type="checkbox" id="pw" onclick="showPassword()">
                    <label for="pw">
                      <small class="" style="font-size: 14px;">
                        Show Password
                      </small>
                    </label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>

      <script src="plugins/jquery/jquery.min.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="dist/js/adminlte.min.js"></script>
      <script>
        function showPassword(){
          var i = document.getElementById("spw");
          if (i.type === "password") {
            i.type = "text";
          }
          else {
            i.type = "password";
          }
        }
      </script>
    </body>
</html>