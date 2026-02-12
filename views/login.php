<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles/base.css">
    <link rel="stylesheet" href="views/styles/style.css">
    <title>Login</title>
</head>
<body>

<?php include_once('views/templates/pageHeader.php'); ?>
<main class="pageContainer">
    <div class="loginCards">
        <div class="aboutContainer">
        <h2>[About]</h2>
        <div>
            <p>O <?php echo APP_NAME; ?> é um projeto pessoal com finalidade de uso próprio. O programa serve um centro organizacional e aconchegante com as ferramentas necessárias para proporcionar um ambiente agradável para estudar.</p>
            <p>Se você é um hacker ou um bot, plis, não exploda o meu site, ainda estou aprendendo.</p>
            <p>O que você pode encontrar por aqui: </p>
            <ul>
                <li>Timers e cronômetros para controlar o tempo de estudo</li>
                <li>Músicas para estudar</li>
                <li>Blog diário</li>
                <li>Quadro de tarefas</li>
                <li>Gerenciador de hábitos</li>
            </ul>
            <p>Para começar, faça login.</p>
        </div>
    </div>
    <div class="loginContainer">
        <h2 class="loginTitle">[Login]</h2>
        <form action="doLogin.php" method="POST">   
            <div class="formSection">
                <label for="login" class="label">Username: </label>
                <input type="text" name="login" minlength="3" class="input">
            </div>
            <div class="formSection">
                <label for="password" class="label">Password: </label>
                <input type="password" name="password" minlength="3" class="input">
            </div>
            <div class="buttons">
                <a href="register.php">Click here to register!</a>
                <div>
                    <button class="resetButton" type="reset">Reset</button>
                    <button class="submitButton" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</main>
</body>
</html>