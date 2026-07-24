<aside class="login">
    <form class="login-form" action="doLogin.php" method="POST">
        <label for="login">Username</label><br>
        <input type="text" name="login" minlength="3"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" minlength="3"><br><br>

        <button class="btn" type="reset">reset</button>
        <button class="btn" type="submit">login</button>
    </form>
    <br><br>
    <a href="register.php">
        Click here to register!
    </a>
</aside>
<section class="presentation">
    <?php echo AssembleInitialMessage(true); ?>
</section>