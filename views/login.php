<?php include_once('templates/pageHeader.php'); ?>

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
    <table>
        <tbody style="border: 1px solid #3b5998">
            <tr>
                <td style="background-color: #3b5998; color: white">
                    Welcome to StudyHub
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td style=" padding-left: 15px;">
                                    <br>
                                    <center>
                                        <h1 style="font-size: large;">[ StudyHub ]</h1>
                                    </center>
                                    <p>O StudyHub é um projeto pessoal com finalidade de uso próprio e talvez de alguns amigos próximos. O programa serve para proporcionar um centro aconchegante com as ferramentas necessárias para proporcionar um ambiente agradável para estudar.</p>
                                    <p>Se você é um hacker ou um bot, plis, não exploda o meu site, ainda estou aprendendo.</p>
                                    <p>O que você pode encontrar por aqui: 
                                        <br>
                                        <b>•</b> Timers e cronômetros para controlar o tempo de estudo<br>
                                        <b>•</b> Músicas para estudar<br>
                                        <b>•</b> Blog diário<br>
                                        <b>•</b> Quadro de tarefas<br>
                                        <b>•</b> Gerenciador de hábitos (para ganhar e perder)<br>
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
