<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles/style1.css">
    <title>Register</title>
</head>
<body>

<?php include_once('views/templates/pageHeader.php'); ?>

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
    <table>
        <tbody style="border: 1px solid #3b5998">
            <tr>
                <td style="background-color: #3b5998; color: white">
                    Welcome to <?php echo APP_NAME; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td style="padding-left: 15px;">
                                    <br>
                                    <center>
                                        <h1 style="font-size: large;">[ Welcome to <?php echo APP_NAME; ?> ]</h1>
                                    </center>
                                    <p>O <?php echo APP_NAME; ?> é um projeto pessoal com finalidade de uso próprio. O programa serve um centro organizacional e aconchegante com as ferramentas necessárias para proporcionar um ambiente agradável para estudar.</p>
                                    <p>Se você é um hacker ou um bot, plis, não exploda o meu site, ainda estou aprendendo.</p>
                                    <p>O que você pode encontrar por aqui: 
                                        <br>
                                        <b>•</b> Timers e cronômetros para controlar o tempo de estudo<br>
                                        <b>•</b> Músicas para estudar<br>
                                        <b>•</b> Blog diário<br>
                                        <b>•</b> Quadro de tarefas<br>
                                        <b>•</b> Gerenciador de hábitos<br>
                                    </p>
                                    <p>Para começar, faça login.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>       
                </td>
            </tr>
        </tbody>
    </table>
</td>
 
<?php include_once('views/templates/pageFooter.php'); ?>
</body>
</html>