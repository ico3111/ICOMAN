<td valign="top" style="padding: 3px;">
    <center>
        <?php echo !empty($message) || !empty($error) ?? '<p color="#fdfd96">'. ($message.$error) .'</p>'; ?>
        <form style="border: 1px dashed #3b5998" action="doRegister.php" method="POST">
            Username<br>
            <input type="text" name="login" minlength="3">
            <br>
            Password<br>
            <input type="password" name="password" minlength="3">
            <br>
            Confirm Password<br>
            <input type="password" name="confirm_password" minlength="3">
            <br>
            Admin Password<br>
            <input type="password" name="admin_password" minlength="3">
            <br><br>
            <button class="btn" type="reset">reset</button>&nbsp;&nbsp;
            <button class="btn" type="submit" name="register">register</button>&nbsp;
        </form>
        <br>
        <a href="login.php">Click here to login!</a>
    </center>
</td>
<td width="60%" style="padding: 3px;">
    <?php echo AssembleInitialMessage(false); ?>
</td>