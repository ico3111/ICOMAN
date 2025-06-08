</tr>
            <tr>
                <td colspan="2">
                    <br>
                    <center>
                        <form action="" method="post">
                        <span><?php echo $_COOKIE['preferences-theme'] .' | '; echo $_COOKIE['preferences-image']; ?></span>
                        <select id="selectTheme" name="themeMode">
                            <option value="light" <?php echo ($_COOKIE['preferences-theme'] ?? '') == "light" ? 'selected' : ''; ?>>Theme (light)</option>
                            <option value="dark" <?php echo ($_COOKIE['preferences-theme'] ?? '') == "dark" ? 'selected' : ''; ?>>Darkmode</option>
                        </select>
                        &nbsp;
                        <select id="selectImage" name="themeImage">
                            <option value="none" <?php echo empty($_COOKIE['preferences-image']) || $_COOKIE['preferences-image'] == "none" ? 'selected' : ''; ?>>Background Image (none)</option>
                            <option value="media/backgrounds/1.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/1.jpg" ? 'selected' : ''; ?>>Image 1</option>
                            <option value="media/backgrounds/2.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/2.jpg" ? 'selected' : ''; ?>>Image 2</option>
                            <option value="media/backgrounds/3.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/3.jpg" ? 'selected' : ''; ?>>Image 3</option>
                            <option value="media/backgrounds/4.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/4.jpg" ? 'selected' : ''; ?>>Image 4</option>
                            <option value="media/backgrounds/5.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/5.jpg" ? 'selected' : ''; ?>>Image 5</option>
                            <option value="media/backgrounds/6.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/6.jpg" ? 'selected' : ''; ?>>Image 6</option>
                            <option value="media/backgrounds/7.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/7.jpg" ? 'selected' : ''; ?>>Image 7</option>
                            <option value="media/backgrounds/8.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/8.jpg" ? 'selected' : ''; ?>>Image 8</option>
                            <option value="media/backgrounds/9.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/9.jpg" ? 'selected' : ''; ?>>Image 9</option>
                            <option value="media/backgrounds/10.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/10.jpg" ? 'selected' : ''; ?>>Image 10</option>
                            <option value="media/backgrounds/11.jpg" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/11.jpg" ? 'selected' : ''; ?>>Image 11</option>
                            <option value="media/backgrounds/p1.png" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/p1.png" ? 'selected' : ''; ?>>Image 12</option>
                            <option value="media/backgrounds/p2.png" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/p2.png" ? 'selected' : ''; ?>>Image 13</option>
                            <option value="media/backgrounds/p3.png" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/p3.png" ? 'selected' : ''; ?>>Image 14</option>
                            <option value="media/backgrounds/p4.png" <?php echo ($_COOKIE['preferences-image'] ?? '') == "media/backgrounds/p4.png" ? 'selected' : ''; ?>>Image 15</option>
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
                        <p>&copy; 2025 All rights Reserved.</p>
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</center>
<script src="/views/scripts/cronometro.js"></script>
<script src="/views/scripts/timer.js"></script>
<script src="/views/scripts/changeBackground.js"></script>
</body>
</html>
