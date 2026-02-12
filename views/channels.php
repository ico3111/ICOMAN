<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/styles/base.css">
    <link rel="stylesheet" href="views/styles/style.css">
    <title>Channels</title>
</head>
<body>

<?php include_once('views/templates/pageHeader.php'); ?>
<main class="pageContainer">
    <div>
        <h3>[ New Channel ]</h3>
        <div class="channelCard">
        <form action="channel_add.php" method="post">
            <table>   
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="description" rows="5" cols="50">Descrição...</textarea>
                        </td>
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
        </div>
    </div>
    <div>
        <h3>[ Channels You are In ]</h3> 
        <div>
            <?php foreach($channels as $channel): ?>
                <div>
                    <table>
                        <tr>
                            <td><?php echo $channel->getName(); ?></td>
                            <td><?php echo $channel->getOwnerName(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea cols="20" rows="2"><?php echo $channel->getDescription(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="posts.php?id=<?php echo $channel->getId(); ?>">ENTER</a></td>
                            <td><?php 
                                if ($channel->getOwnerName() == $user) { ?>
                                    <a href="channel_del.php?id=<?php echo $channel->getId(); ?>">
                                        <button class="deleteButton" type="button">delete</button>
                                    </a>
                                    <?php } else { ?>
                                    <a href="channel_delUser.php?user=<?php echo $user; ?>&channel=<?php echo $channel->getId(); ?>">
                                        <button class="deleteButton" type="button">Quit</button>
                                    </a>
                                <?php } ?> 
                            </td>
                        </tr>
                    </table>
                </div>
            <?php endforeach;  ?>
        </div>
    </div>
</main>

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