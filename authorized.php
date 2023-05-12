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
require './inc/config.php';
require './inc/auth.php';

if (!isset($_SESSION['un'])) {
    die("[ERROR] You aren't logged in!");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../");
    exit();
}


$KeyAuthApp = new KeyAuth\api($name, $OwnerId);

$url = "https://keyauth.win/api/seller/?sellerkey={$SellerKey}&type=getsettings";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
$json = json_decode($resp);

if (!$json->success) {
    die("Error: {$json->message}");
}

$download = $json->download;
$webdownload = $json->webdownload;
$appcooldown = $json->cooldown;

$numKeys = $KeyAuthApp->numKeys;
$numUsers = $KeyAuthApp->numUsers;
$numOnlineUsers = $KeyAuthApp->numOnlineUsers;
$customerPanelLink = $KeyAuthApp->customerPanelLink;

$username = $_SESSION["user_data"]["username"];
$subscription = $_SESSION["user_data"]["subscriptions"][0]->subscription;
$expiry = $_SESSION["user_data"]["subscriptions"][0]->expiry;
$ip = $_SESSION["user_data"]["ip"];
$hwid = $_SESSION["user_data"]["hwid"];
$createdate = $_SESSION["user_data"]["createdate"];
$lastLogin = $_SESSION["user_data"]["lastlogin"];
$currentsession = $_SESSION['sessionid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name; ?> • Authorized</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/res/css/fontawesome.min.css">
    <link rel="stylesheet" href="/res/css/style.css">
    <link href="https://cdn.keyauth.cc/v2/panel/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.keyauth.uk/dashboard/unixtolocal.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    
    <link rel="icon" type="image/png" href="<?php echo $site_icon;?>" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta content="! ChangeGame#4800" name="author" />
</head>

<body>

    <script src="/res/js/jquery.min.js"></script>
    
    <section id="dashboardnew">
        <div class="container">
            <div id="auth-window" class="content">
                        
            <div class="title">
                    <center><img src="<?php echo $site_logo;?>" style="max-height: 175px;margin-top: -8px"></center>
                <form method="POST" style="margin-bottom: -130px;margin-left: -132px;margin-top: 90px;margin-right: 32px;">
                    <button name="logout" class="btn2" style="border: 0; cursor: pointer;"><span><i class="fas fa-power-off fa-sm text-white-50"></i>Log out</span></button>
                </form> 
                </div>
                    </br>
                    <center>
                        <h1 style="color:#fff;font-family:inherit;font-size:14px;font-weight:600;">Welcome Back <span><?php echo $username; ?>!</span></h1>
                    </br>
					<div class="input"><i class="fas fa-key"></i><span></span><input title="License Key" type="text" placeholder="<?php $un = $_SESSION['un']; $url = "https://keyauth.win/api/seller/?sellerkey={$SellerKey}&type=userdata&user={$un}"; $curl = curl_init($url); curl_setopt($curl, CURLOPT_URL, $url); curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); $resp = curl_exec($curl); $json = json_decode($resp); $key = $json->subscriptions[0]->key; echo $key; ?>" maxlength="31" minlength="3" disabled></div>
                    <div class="input"><i class="fas fa-hourglass"></i><span></span><input title="When your license expires." type="text" placeholder='Expires: <?php echo date("Y-m-d H:s:i", $expiry);?>' maxlength="80" minlength="3" disabled></div>
                    <div class="input"><i class="fas fa-fingerprint"></i><span></span><input title="Current session id." type="text" onfocus="this.value=''; this.style.color='#000000'" placeholder='Session ID: <?php echo ($currentsession);?>' maxlength="80" minlength="3" disabled></div>
                    <div class="input"><i class="fas fa-file-search"></i><span></span><input title="HWID in our application" type="text" onfocus="this.value=''; this.style.color='#000000'" placeholder='<?php if($hwid == NULL){ echo "No HWID"; } else  echo $hwid; ?>' maxlength="80" minlength="3" disabled></div>
                    </center>
                    </br>
                    <center>
                    <div class="button-container">
                    <?php
                                    $un = $_SESSION['un'];
                                    $url = "https://keyauth.win/api/seller/?sellerkey={$SellerKey}&type=userdata&user={$un}";

                                    $curl = curl_init($url);
                                    curl_setopt($curl, CURLOPT_URL, $url);
                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                                    $resp = curl_exec($curl);
                                    $json = json_decode($resp);
                                    $cooldown = $json->cooldown;
                                    $token = $json->token;
                                    $today = time();

                                    if (is_null($cooldown)) {
                                        echo 
                                        '
                                        <form method="POST">
                                        <button name="resethwid" class="btn login" style="border: 0; cursor: pointer;"><span><i class="fas fa-redo-alt fa-sm text-white-50"></i> Reset HWID</span></button>
                                        </form>
                                        ';
                                    } else {

                                        if ($today > $cooldown) {

                                            echo 
                                            '
                                            <form method="POST">
                                            <button name="resethwid" class="btn login" style="border: 0; cursor: pointer;"><span><i class="fas fa-redo-alt fa-sm text-white-50"></i> Reset HWID</span></button>
                                            </form>
                                            ';
                                        } else {

                                            echo 
                                            '
                                            <form method="POST">
                                            <button name="hwidfail" class="btn login" style="border: 0; cursor: pointer;"><span> <script>document.write(convertTimestamp(' . $cooldown . '));</script></span></button>
                                            </form>
                                            ';
                                        }
                                    }

                                    ?>
                        
                                </br>
                            <a href="<?php echo $download; ?>" class="btn login" style="border: 0; cursor: pointer;"><span><i class="fas fa-download fa-sm text-white-50"></i> Download</span></a>
                            </div>
                    </center>
                                <div class="changegame"></div>

          </div>
    </section>
    
</div>

<script src="/res/js/jquery.min.js"></script>
<script src="https://cdn.keyauth.cc/v2/panel/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="https://cdn.keyauth.cc/v2/panel/js/scripts.bundle.js" type="text/javascript"></script>
<script src="https://cdn.keyauth.cc/v2/panel/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="https://cdn.keyauth.cc/v2/panel/plugins/custom/datatables/datatables.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>  


<?php

if (isset($_POST['resethwid'])) {

    $today = time();

    $cooldown = $today + $appcooldown;
    $un = $_SESSION['un'];
    $url = "https://keyauth.win/api/seller/?sellerkey={$SellerKey}&type=resetuser&user={$un}";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl);

    $url = "https://keyauth.win/api/seller/?sellerkey={$SellerKey}&type=setcooldown&user={$un}&cooldown={$cooldown}";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl);

    echo '
                        <script type=\'text/javascript\'>
                        
                        const notyf = new Notyf();
                        notyf
                          .success({
                            message: \'HWID have been reset!\',
                            duration: 3500,
                            dismissible: true
                          });                
                        
                        </script>
                        ';
    echo "<meta http-equiv='Refresh' Content='2;'>";
}
?>

<?php

if (isset($_POST['hwidfail'])) {

    echo '
                        <script type=\'text/javascript\'>
                        
                        const notyf = new Notyf();
                        notyf
                          .error({
                            message: \'Failed to reset hwid currently on cooldown try again later!\',
                            duration: 4500,
                            dismissible: true
                          });                
                        
                        </script>
                        ';
    echo "<meta http-equiv='Refresh' Content='2;'>";
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