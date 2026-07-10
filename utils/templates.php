<?php

function assemblePageTop(string $pageTitle, string $styleFile, int $pageWidth = 80): string
{

    $message = isset($_GET['message']) ? "<p>{$_GET['message']}</p>" : "";
    $error   = isset($_GET['error']) ? "<p style='color:red;'>{$_GET['error']}</p>" : "";

    return '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="shortcut icon" href="'. MEDIA_URL .'/icons/favicon.ico">
                <link rel="stylesheet" href="'. STYLES_URL .'/'. $styleFile .'.css">
                <title>'. $pageTitle .'</title>
            </head>
            <body>
            <center>
                <table width="'. $pageWidth .'%">
                    <tbody>
                        <tr id="header" style="background-color: #55ffff; color: white">
                            <td>
                                <center>
                                    <h2>[ '. APP_NAME .' ]</h2>
                                    '. $message .'
                                    '. $error .'
                                </center>
                            </td>
                            <td>
                                <center>
                                    &nbsp;<a href="'. HOME .'">HOME</a>&nbsp;|
                                    &nbsp;<a href="'. CHANNELS. '">CHANNELS</a>&nbsp;|
                                    &nbsp;<a href="'. BOARDS .'">BOARDS</a>&nbsp;|
                                    &nbsp;<a href="'. LOGOUT .'">LOGOUT</a>&nbsp;|
                                </center>
                            </td>
                        </tr>
                        <tr>';
}

function assemblePageFooter(): string
{
    $theme = $_COOKIE['preferences-theme'] ?? '';

    $isThemeLight = $theme === 'light' ? 'selected' : '';
    $isThemeDark  = $theme === 'dark' ? 'selected' : '';

    $currentImage = $_COOKIE['preferences-image'] ?? 'none';

    $images = [
        'none'                       => 'Background Image (none)',
        'media/backgrounds/1.jpg'    => 'Image 1',
        'media/backgrounds/2.jpg'    => 'Image 2',
        'media/backgrounds/3.jpg'    => 'Image 3',
        'media/backgrounds/4.jpg'    => 'Image 4',
        'media/backgrounds/5.jpg'    => 'Image 5',
        'media/backgrounds/6.jpg'    => 'Image 6',
        'media/backgrounds/7.jpg'    => 'Image 7',
        'media/backgrounds/8.jpg'    => 'Image 8',
        'media/backgrounds/9.jpg'    => 'Image 9',
        'media/backgrounds/10.jpg'   => 'Image 10',
        'media/backgrounds/11.jpg'   => 'Image 11',
        'media/backgrounds/p1.png'   => 'Image 12',
        'media/backgrounds/p2.png'   => 'Image 13',
        'media/backgrounds/p3.png'   => 'Image 14',
        'media/backgrounds/p4.png'   => 'Image 15'
    ];

    $imageOptions = '';

    foreach ($images as $value => $label) {
        $selected = $currentImage === $value ? 'selected' : '';
        $imageOptions .= "<option value=\"$value\" $selected>$label</option>";
    }

    return '
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <center>
                        <form action="" method="post">
                            <select id="selectTheme" name="themeMode">
                                <option value="light" ' . $isThemeLight . '>Theme (light)</option>
                                <option value="dark" ' . $isThemeDark . '>Darkmode</option>
                            </select>
                            &nbsp;
                            <select id="selectImage" name="themeImage">
                                ' . $imageOptions . '
                            </select>
                            &nbsp;
                            <button type="submit">Define</button>
                        </form>
                    </center>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <p>&copy; 2025 All rights reserved. Version ' . APP_VERSION . '</p>
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</center>

<script src="' . SCRIPTS_URL . '/background.js"></script>
</body>
</html>';
}