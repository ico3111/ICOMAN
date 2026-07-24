<aside class="login">
    <form class="login-form" action="doRegister.php" method="POST">
        <label for="login">Username</label><br>
        <input type="text" name="login" minlength="3"><br>
        
        <label for="password">Password</label><br>
        <input type="password" name="password" minlength="3"><br>
        
        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" name="confirm_password" minlength="3"><br>

        <label for="admin_password">Admin Password</label><br>
        <input type="password" name="admin_password" minlength="3"><br><br>
        
        <button class="btn" type="reset">reset</button>
        <button class="btn" type="submit" name="register">register</button>
    </form>
    <br><br>
    <a href="login.php">
        Click here to login!
    </a>
</aside>
<section class="presentation">
    <?php echo AssembleInitialMessage(false); ?>
</section>