<?php

function assemblePageTop(string $pageTitle, string $styleFile, int $pageWidth = 80): string
{

    $message = isset($_GET['message']) ? "<p>{$_GET['message']}</p>" : "";
    $error   = isset($_GET['error']) ? "<p style='color:red;'>{$_GET['error']}</p>" : "";

    return '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="shortcut icon" href="'. MEDIA_URL .'/icons/favicon.ico" />
                <link rel="stylesheet" href="'. STYLES_URL .'/'. $styleFile .'.css" />
                <title>'. $pageTitle .'</title>
            </head>
            <body>
                <div class="container">

                    <header class="header">
                        <div class="cell logo">
                            <h2>['. APP_NAME .']</h2>
                            '. $message .'
                            '. $error   .'
                        </div>

                        <nav class="cell menu">
                            <a href="'. HOME     .'">HOME</a>     |
                            <a href="'. CHANNELS .'">CHANNELS</a> |
                            <a href="'. BOARDS   .'">BOARDS</a>   |
                            <a href="'. LOGOUT   .'">LOGOUT</a>
                        </nav>
                    </header>

                    <main class="content">';
}

function assemblePageFooter(): string
{
    $theme = $_COOKIE['preferences-theme'] ?? '';

    $isThemeLight = $theme === 'light' ? 'selected' : '';
    $isThemeDark  = $theme === 'dark' ? 'selected' : '';

    $currentImage = $_COOKIE['preferences-image'] ?? 'none';

    $images = [
        'none'                              => 'Background Image (none)',
         MEDIA_URL.'./backgrounds/1.jpg'    => 'Image 1',
         MEDIA_URL.'/backgrounds/2.jpg'     => 'Image 2',
         MEDIA_URL.'/backgrounds/3.jpg'     => 'Image 3',
         MEDIA_URL.'/backgrounds/4.jpg'     => 'Image 4',
         MEDIA_URL.'/backgrounds/5.jpg'     => 'Image 5',
         MEDIA_URL.'/backgrounds/6.jpg'     => 'Image 6',
         MEDIA_URL.'/backgrounds/7.jpg'     => 'Image 7',
         MEDIA_URL.'/backgrounds/8.jpg'     => 'Image 8',
         MEDIA_URL.'/backgrounds/9.jpg'     => 'Image 9',
         MEDIA_URL.'/backgrounds/10.jpg'    => 'Image 10',
         MEDIA_URL.'/backgrounds/11.jpg'    => 'Image 11',
         MEDIA_URL.'/backgrounds/p1.png'    => 'Image 12',
         MEDIA_URL.'/backgrounds/p2.png'    => 'Image 13',
         MEDIA_URL.'/backgrounds/p3.png'    => 'Image 14',
         MEDIA_URL.'/backgrounds/p4.png'    => 'Image 15'
    ];

    $imageOptions = '';

    foreach ($images as $value => $label) {
        $selected = $currentImage === $value ? 'selected' : '';
        $imageOptions .= "<option value=\"$value\" $selected>$label</option>";
    }

    return '</main>
            <footer class="footer">
                <form action="" method="post">
                    <select name="themeMode">
                        <option value="light" '. $isThemeLight .'>Theme (light)</option>
                        <option value="dark" '. $isThemeDark .'>Darkmode</option>
                    </select>
                    <select id="selectImage" name="themeImage">
                        '. $imageOptions .'
                    </select>
                    <button type="submit">Define</button>
                </form>
                <p>&copy; 2025 All rights reserved. Version '. APP_VERSION .'</p>
            </footer>
        </div>
    <script src="' . SCRIPTS_URL . '/background.js"></script>
    <script src="' . SCRIPTS_URL . '/instantBgChange.js"></script>
    <script src="' . SCRIPTS_URL . '/cronometro.js"></script>
    <script src="' . SCRIPTS_URL . '/timer.js"></script>
    </body>
    </html>';
    
}

function AssembleInitialMessage($isLogin = true)
{
    return '<table>
            <tbody style="border: 1px solid #dab630">
                <tr>
                    <td style="background-color: #dab630; color: white">
                        Welcome to '.APP_NAME.'
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
                                            <h1 style="font-size: large;">[ '.APP_NAME.' ]</h1>
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
                                        <p>Para começar, '. 
                                            ($isLogin ? "faça login" : "registre-se").'.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>       
                    </td>
                </tr>
            </tbody>
        </table>';
}