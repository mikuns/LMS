<?php 
 require_once("admin/setup/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>LMS</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="admin/css/style.css" />
        <link rel="stylesheet" href="admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="admin/css/matrix-login.css" />
        <link href="admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
<body style="margin-top: 4%; height: auto;">


        <div class="lms-container">
  <div class="lms-info" style="margin-left: 30%;">
    <h1 style="color: #28b779">Library Management System</h1>
  </div>
</div>
        <div id="loginbox">      
            <form id="loginform" class="form-vertical" action="" method="POST">
         <div class="control-group normal_text"> <h3><img src="admin/img/logo.png" alt="Admin Login" style="height: 100px" /></h3></div>
         <div id="alert_text">** Incorrect Login Details, Please Try Again **</div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="lms-username" placeholder="Username" required="" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="lms-password" placeholder="Password" required="" />
                        </div>
                    </div>
                </div>
              
                <div class="form-actions">
                    <span style="margin-left: 5%;">
                    <button type="submit" class="btn btn-success" style="background-color: #28B779" /> LOGIN</button>
                    </span>
                    <span class="pull-right"><a href="#" class="flip-link badge badge-important" id="to-recover">Forgot password?</a></span>
                </div>
            </form>
            <form id="recoverform" action="#" method="POST" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover your password.</p>
        
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Recover</a></span>
                </div>
            </form>
        </div>
        
         <div class="lms-container">
  <div class="lms-info" style="margin-left: 45%; margin-top: 3.5%;"><span style="color: #db3615">Powered <i class="icon icon-cogs"></i> by <a href="www.itsolutions.com.ng" style="color: #ffb848">ITSolutions</a></span>
</div>
        <script src="admin/js/jquery.min.js"></script>  
        <script src="admin/js/matrix.login.js"></script> 
    </body>

</html>

<?php
if(isset($_POST['lms-username']) && isset($_POST['lms-password']) ) {
    // Escape user inputs for security
    $login_username = mysqli_real_escape_string($link, $_POST['lms-username']);
    $login_password = mysqli_real_escape_string($link, md5($_POST['lms-password']));
   
    if(!empty($login_username) && !empty($login_password)) {

        $query = "SELECT id FROM admin_tbl WHERE admin_username= '$login_username' AND admin_password = '$login_password'  ";
        $query_run = mysqli_query($link, $query);
        $numRowsCheck = mysqli_num_rows($query_run);
        if ($numRowsCheck == 0) {
             echo '<script type="text/javascript">function hideMsg(){
            document.getElementById("alert_text").style.visibility = "hidden"; }         document.getElementById("alert_text").style.visibility = "visible";
           window.setTimeout("hideMsg()", 40000);
            </script>';
        } elseif ($numRowsCheck == 1) {
            $useridrow = mysqli_fetch_assoc($query_run);
            $userid = $useridrow['id'];
            ob_start();
            session_start();
            $_SESSION['user_id'] = $userid;
            header("Location: /lms/admin/dashboard.php");
        }
    }
} 

?>