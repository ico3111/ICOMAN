<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles/base.css">
    <link rel="stylesheet" href="views/styles/style.css">
    <title>Home</title>
</head>
<body>
    <?php include_once('views/templates/pageHeader.php'); ?>
    <main class="pageContainer">
        <div class="homeCards">
            <div class="homeMusics">
                <h2>[Your Study Musics]</h2>
                <div>
                    <div class="musicItem">
                        <div>C418 - Aria Math</div>
                        <audio src="media/musics/minecraft1.mp3" controls></audio>
                    </div>
                    <div class="musicItem">
                        <div>C418 - Moog City</div>
                        <audio src="media/musics/minecraft2.mp3" controls></audio>
                    </div>
                </div>
            </div>
            <div class="homeTimers">
                <h2>[Timers]</h2>
                <div>
                    <div class="cronometroDiv">
                        <table>
                            <tr>
                                <td class="center">Stopwatch</td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <p id="visor">00:00:00</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <button type="button" id="start">Start</button>&nbsp;
                                    <button type="button" id="pause">Pause</button>&nbsp;
                                    <button type="button" id="stop">Stop</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="timerDiv">
                        <table>
                            <tr>
                                <td class="center">Timer</td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <p id="visor2"><input type="text" id="inptHour" placeholder="00" class="timerInput">:<input type="text" id="inptMin" placeholder="00" class="timerInput">:<input type="text" id="inptSeg" placeholder="00" class="timerInput"></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <button type="button" id="start2">Start</button>&nbsp;
                                    <button type="button" id="pause2">Pause</button>&nbsp;
                                    <button type="button" id="stop2">Stop</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>                        
        </div>            
    </main>
    <script src="views/scripts/cronometro.js"></script>
    <script src="views/scripts/timer.js"></script>
</body>
</html>