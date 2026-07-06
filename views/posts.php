<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles/style1.css">
    <title>Posts</title>
</head>
<body>
<?php 
    include_once('views/templates/pageHeader.php');
    include_once('config.php'); 
?>

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
                                            <input type="hidden" name="channel_id" value="<?php echo $_GET['id']; ?>">
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
                        <h3>[ <?php echo $channel->getName(); ?> ]</h3>
                        <textarea rows="5" cols="70" disabled>CRIADO POR: <?php echo $channel->getOwnerName(); ?>. DESCRICAO: <?php echo $channel->getDescription(); ?>. USUARIOS: <?php foreach ($users as $user) { echo $user->getUserName(). ', '; } ?>.
                        </textarea>
                        <?php if ($channel->getOwner() == $userId): ?>
                            <br><br>
                            <div style="display: flex; justify-content: center;">
                                <form action="channel_addUser.php" method="post">
                                    <input type="hidden" name="channel_id" value="<?php echo $_GET['id']; ?>">
                                    <input type="text" name="user_name">
                                    <button type="submit">add</button>
                                </form>
                                <form action="channel_delUser.php" method="post">
                                    <input type="hidden" name="channel_id" value="<?php echo $_GET['id']; ?>">
                                    <input type="text" name="user_name">
                                    <button type="submit">Remove</button>
                                </form>
                            </div>
                        <?php endif; ?>
                        <hr>
                            <?php foreach($posts as $post): ?>
                                <center>
                                    <table>
                                        <tbody>
                                            <form action="post_edit.php" method="post">
                                            <tr>
                                                <td colspan="2">
                                                    <?php if ($channel->getOwner() == $userId || $post->getUserId() == $userId): ?>
                                                    <input type="hidden" name="id" value="<?php echo $post->getId(); ?>">
                                                    <input type="hidden" name="channel_id" value="<?php echo $_GET['id']; ?>">
                                                    <?php endif; ?>
                                                    <textarea name="title" cols="25" rows="1"><?php echo $post->getTitle(); ?></textarea>
                                                </td>
                                                <td>
                                                    <?php echo $post->getUserName(); ?>
                                                </td>
                                                <td>
                                                    <?php echo $post->getDate(); ?>
                                                </td>
                                                <td>
                                                    <?php if ($channel->getOwner() == $userId && $post->getUserId() != $userId) { ?>
                                                        <button type="submit" name="deletePost">Delete</button>      
                                                    <?php } ?>

                                                    <?php if ($post->getUserId() == $userId) { ?>
                                                        <button type="submit" name="editPost">Update</button>
                                                        <button type="submit" name="deletePost">Delete</button>
                                                    <?php } ?>
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