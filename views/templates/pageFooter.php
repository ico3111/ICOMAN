            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <center>
                        <form action="" method="post">
                            <select id="selectTheme" name="themeMode">
                                <option value="light" <?php echo ($_COOKIE['preferences-theme'] ?? '') == "light" ? 'selected' : ''; ?>>Theme (light)</option>
                                <option value="dark" <?php echo ($_COOKIE['preferences-theme'] ?? '') == "dark" ? 'selected' : ''; ?>>Darkmode</option>
                            </select>
                            &nbsp;
                            <select id="selectImage" name="themeImage">
                                <?php
                                    $currentImage = $_COOKIE['preferences-image'] ?? 'none';

                                    $images = [
                                        'none' => 'Background Image (none)',
                                        'media/backgrounds/1.jpg' => 'Image 1',
                                        'media/backgrounds/2.jpg' => 'Image 2',
                                        'media/backgrounds/3.jpg' => 'Image 3',
                                        'media/backgrounds/4.jpg' => 'Image 4',
                                        'media/backgrounds/5.jpg' => 'Image 5',
                                        'media/backgrounds/6.jpg' => 'Image 6',
                                        'media/backgrounds/7.jpg' => 'Image 7',
                                        'media/backgrounds/8.jpg' => 'Image 8',
                                        'media/backgrounds/9.jpg' => 'Image 9',
                                        'media/backgrounds/10.jpg' => 'Image 10',
                                        'media/backgrounds/11.jpg' => 'Image 11',
                                        'media/backgrounds/p1.png' => 'Image 12',
                                        'media/backgrounds/p2.png' => 'Image 13',
                                        'media/backgrounds/p3.png' => 'Image 14',
                                        'media/backgrounds/p4.png' => 'Image 15',
                                    ];

                                    foreach ($images as $value => $label) {
                                        $selected = $currentImage === $value ? 'selected' : '';
                                        echo "<option value=\"$value\" $selected>$label</option>"; 
                                    }
                                ?>
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
                        <p>&copy; 2025 All rights Reserved. Version <?php echo APP_VERSION; ?></p>
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</center>

<script src="views/scripts/background.js"></script>