<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles/style1.css">
    <title>Posts</title>
</head>
<body>

<?php include_once('views/templates/pageHeader.php'); ?>
<td colspan="2">
    <br>
    <center>
        <table>
            <tbody>
                <tr>
                    <td>
                        <h3>[ New Post ]</h3>
                        <form action="post_add.php" method="post">
                            <table>   
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="title" placeholder="Title" required>
                                        </td>
                                        <td rowspan="2">
                                            <textarea name="content" rows="5" cols="50">Escreva seu post aqui...</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit">Submit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>[ Your Blog ]</h3>
                            <?php foreach($posts as $post): ?>
                                <center>
                                    <table>
                                        <tbody>
                                            <form action="post_edit.php" method="post">
                                            <tr>
                                                <td colspan="2">
                                                    <input type="hidden" name="id" value="<?php echo $post->getId(); ?>">
                                                    <textarea name="title" cols="25" rows="1"><?php echo $post->getTitle(); ?></textarea>
                                                </td>
                                                <td>
                                                    <?php echo $post->getUserName(); ?>
                                                </td>
                                                <td>
                                                    <?php echo $post->getDate(); ?>
                                                </td>
                                                <td>
                                                    <button type="submit" name="editPost">Update</button>
                                                    <button type="submit" name="deletePost">Delete</button>      
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <center>
                                                        <textarea name="content" rows="5" cols="70"><?php echo $post->getContent();?></textarea>
                                                    </center>
                                                </td>
                                            </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </center>
                                <br>
                        <?php endforeach;  ?>
                    </td>
                </tr>
            </tbody>
        </table> 
    </center>
    <br>
</td>
<?php include_once('views/templates/pageFooter.php'); ?>

<script>
    document.getElementById("selectImage").addEventListener("change", function () {
        document.body.style.backgroundImage = `url(${this.value})`;
    });

    document.getElementById("selectTheme").addEventListener("change", function () {
        const theme = this.value;

        if (theme === "light") {
            document.body.style.backgroundColor = "white";
            document.body.style.color = "black";
        } else if (theme === "dark") {
            document.body.style.backgroundColor = "black";
            document.body.style.color = "white";
        }
    });
</script>
</body>
</html>