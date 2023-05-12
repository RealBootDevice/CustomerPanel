<!-- /////////////////////////////////////////////////////// -->
<!-- // Developed By: ChangeGame                          // -->
<!-- // My Discord: ! ChangeGame#4800                     // -->
<!-- // Built Using: PHP / HTML / CSS / JS / KeyAuth API  // -->
<!-- /////////////////////////////////////////////////////// -->
<!-- // You are not allowed to sell the source it's made  // -->
<!-- // avaliable only for you to use, you can modify it  // -->
<!-- // as you want also credit me for making this not    // -->
<!-- // stealing the credits as that is gay ngl....       // -->
<!-- ///////////////////////////////////////////////////////  -->

<?php
require 'inc/config.php';
require 'inc/auth.php';

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['un'])) {
	header("Location: ../authorized.php");
	exit();
}

$KeyAuthApp = new KeyAuth\api($name, $OwnerId);

if (!isset($_SESSION['sessionid'])) {
	$KeyAuthApp->init();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name; ?> • Register</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/res/css/fontawesome.min.css">
    <link rel="stylesheet" href="/res/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="icon" type="image/png" href="<?php echo $site_icon;?>" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta content="! ChangeGame#4800" name="author" />
</head>
<body>
    <script src="/res/js/jquery.min.js"></script>
    <div class="changegame"></div>
    <div class="bg-image"></div>
    
    <section id="login">
        <div class="container">
            <div id="auth-window" class="content">
                
                               
                <div class="title">
                    <center><img src="<?php echo $site_logo;?>" style="max-height: 175px;"></center>
                </div>
                
                <form method="POST" style="width: 100%; height: 100%">
                    <center>
                        <div class="input"><i class="fas fa-user"></i><span></span><input name="username" type="text" placeholder="Enter Username" maxlength="20" minlength="3" required></div>
                        <div class="input"><i class="fas fa-lock"></i><span></span><input name="password" type="password" placeholder="Enter Password" maxlength="20" minlength="3" required></div>
                        <div class="input"><i class="fas fa-key"></i><span></span><input name="key" type="text" placeholder="Enter Licensekey" maxlength="80" minlength="8" required></div>
                        <button name="register" type="submit" class="btn login" style="border: 0; cursor: pointer;"><span>Register </span></button><br>
                        
                    </center>
                </form>
                <div class="changegame">
    </br>
    <a href="/" style="color:#fff;margin-left: -10px;"> Back to login</a>
    </div>
             <!--</div>-->
        </div>
		</div>
    </section>

</div>
<script src="/res/js/jquery.min.js"></script>
<script src="https://cdn.keyauth.cc/v2/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="https://cdn.keyauth.cc/v2/assets/js/scripts.bundle.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<?php
	if (isset($_POST['register'])) {
		if ($KeyAuthApp->register($_POST['username'],$_POST['password'],$_POST['key'])) {
			$_SESSION['un'] = $_POST['username'];
            $KeyAuthApp->log("🌐DarkAuth");
			echo "<meta http-equiv='Refresh' Content='2; url=authorized'>";
			echo '
                        <script type=\'text/javascript\'>
                        
                        const notyf = new Notyf();
                        notyf
                          .success({
                            message: \'Successfully registered!\',
                            duration: 3500,
                            dismissible: true
                          });                
                        
                        </script>
                        ';
		}
	}
	?>
<!-- /////////////////////////////////////////////////////// -->
<!-- // Developed By: ChangeGame                          // -->
<!-- // My Discord: ! ChangeGame#4800                     // -->
<!-- // Built Using: PHP / HTML / CSS / JS / KeyAuth API  // -->
<!-- /////////////////////////////////////////////////////// -->
<!-- // You are not allowed to sell the source it's made  // -->
<!-- // avaliable only for you to use, you can modify it  // -->
<!-- // as you want also credit me for making this not    // -->
<!-- // stealing the credits as that is gay ngl....       // -->
<!-- ///////////////////////////////////////////////////////  -->
</body>
</html>