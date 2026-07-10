
<td valign="top" style="padding: 3px;">
    <center>
        <form style="border: 1px dashed #3b5998" action="doLogin.php" method="POST">
            Username<br>
            <input type="text" name="login" minlength="3">
            <br>
            Password<br>
            <input type="password" name="password" minlength="3">
            <br><br>
            <button class="btn" type="reset">reset</button>&nbsp;&nbsp;
            <button class="btn" type="submit">login</button>&nbsp;&nbsp; 
        </form>
        <br>
        <a href="register.php">Click here to register!</a>
    </center>
</td>
<td width="60%" style="padding: 3px;">
    <?php echo AssembleInitialMessage(true); ?>
</td>