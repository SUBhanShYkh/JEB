<?php
include 'inc/header.php';
include 'Admin/config/config.php';
if(isset($_POST['btn'])){
     $email = $_POST['email'];
     $pswd = md5($_POST['pswd']);
    $sql = "SELECT * FROM `user` WHERE `user_email` = '$email' AND `user_pswd` = '$pswd'";

}


?>
<div class="col-lg-4 col-sm-12">

    <form class="card auth_form" method="POST">
    <div class="header"><img class="logo" src="public/avatar.png" alt=""><h5>Log in</h5></div>
                    
    <div class="body">
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Password" name="pswd" required>                            
         </div>
        <div class="checkbox">
            <input id="remember_me" type="checkbox">
            <label for="remember_me">Show Password</label>
        </div>
        <?php $error; ?>
        <input type="submit" value="SIGN IN" name="btn" class="btn btn-primary btn-block waves-effect waves-light">
        <a href="#">Don't Have Account??</a>                        
    </div>
    </form>

</div>
<?php
include 'inc/footer.php'
?>