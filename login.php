<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
   $error = "";
   $_SESSION["isAdmin"] = false;
?>
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "SELECT * FROM users WHERE u_name = '$myusername'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if (password_verify($mypassword, $row["password"])) {
                // Success!
                  $active = $row['active'];
                //$usertype_id = $row["user_type_id"];
                $username  = $row["username"];
                $name  = $row["name"];
                $usertype_id = $row["user_type_id"];
                $u_id  = $row["id"];
                $count = mysqli_num_rows($result);

                // If result matched $myusername and $mypassword, table row must be 1 row
                if($count == 1) {
                  // session_register("myusername");
                   $_SESSION['user_type'] = $usertype_id;
                   $_SESSION['username'] = $name;
                   $_SESSION['u_id'] = $u_id;

                   if ($usertype_id == 1) {
                      $_SESSION["isAdmin"] = true;
                      redirect_to("admin/dashboard.php");
                   }elseif ($usertype_id == 2) {
                     $_SESSION["isAdmin"] = true;
                     redirect_to("admin/dashboard.php");
                   }elseif ($usertype_id == 3) {
                     $_SESSION["isAdmin"] = true;
                     redirect_to("admin/dashboard.php");
                   }else {
                     $_SESSION["isAdmin"] = false;
                    redirect_to("login.php");
                   }
            }
            else {
                // Invalid credentials
            }
        }else {
           $error = "Your Login Username or Password is incorrect";
        }
    }
?>

  <?php include("includes/frontend/header.php") ?>
  <?php $title = "Login" ?>
  <title>Golden Grill-<?php echo $title ?></title>
  <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- form content box Start -->
                <div class="form-content-box">
                    <!-- Details -->
                    <div class="Details">
                        <h3>Login</h3>
                        <!-- form -->
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="username" class="input-text" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" id="password" placeholder="Password">
                            </div>
                            <div class="form-group checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-submit btn-block btn-primary">login</button>
                            </div>
			    <div class="form-group">
                                Back to Home? <a href="index.php">Home</a>
                            </div>

                       </form>
                       <hr>
                    <!-- Footer -->
                   
                </div>
                <!-- Form content box End -->
            </div>
        </div>
    </div>
  </div>
<?php include("includes/frontend/footer.php") ?>
