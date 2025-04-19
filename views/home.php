<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {border-collapse: collapse;}
        td,th {border: 1px solid #3b5998; text-align: center; vertical-align: middle;}
        input {width: 15px;}
        audio {width: 90%;}
    </style>
    <title>Home</title>
</head>
<body>
    <?php include_once('views/templates/pageHeader.php'); ?>

    <td> 
        <center>
            <h3>[Your Study Musics]</h3>
            <table width="80%">
                
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Audio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>C418</td>
                        <td>
                            <audio src="../musicas/The C418 Playlist.mp3" controls></audio>
                        </td>
                    </tr>
                    <tr>
                        <td>Shadow of the Colossus</td>
                        <td>
                            <audio src="../musicas/Shadow of the Colossus Soundtrack.mp3" controls></audio>
                        </td>
                    </tr>
                    <tr>
                        <td>Medieval Philosopher</td>
                        <td>
                            <audio src="../musicas/Filosofo Medieval.mp3" controls></audio>
                        </td>
                    </tr>
                    <tr>
                        <td>What a Classic</td>
                        <td>
                            <audio src="../musicas/What a Classic.mp3" controls></audio>
                        </td>
                    </tr>
                    <tr>
                        <td>Death Note</td>
                        <td>
                            <audio src="../musicas/Study as if you_re Light Yagami.mp3" controls></audio>
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
        <br>
    </td>
    <td>
        <center>
            <h3>[Timers]</h3>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td>Stopwatch</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <p id="visor">00:00:00</p>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <button type="button" id="start">Start</button>&nbsp;
                                                <button type="button" id="pause">Pause</button>&nbsp;
                                                <button type="button" id="stop">Stop</button>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <table>
                                <tbody>
                                    <tr>
                                        <td>Timer</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <p id="visor2">
                                                    <input type="text" id="inptHour" placeholder="00">:
                                                    <input type="text" id="inptMin" placeholder="00">:
                                                    <input type="text" id="inptSeg" placeholder="00">
                                                </p>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <button type="button" id="start2">Start</button>&nbsp;
                                                <button type="button" id="pause2">Pause</button>&nbsp;
                                                <button type="button" id="stop2">Stop</button>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
        <br>
    </td>

    <?php include_once('views/templates/pageFooter.php'); ?>
</body>
</html>