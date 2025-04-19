<?php include_once('templates/pageHeader.php'); ?>

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
                                            <tr>
                                                <td colspan="2">
                                                    <?php echo $post->getTitle(); ?>
                                                </td>
                                                <td>
                                                    <?php echo $post->getUserName(); ?>
                                                </td>
                                                <td>
                                                    <?php echo $post->getDate(); ?>
                                                </td>
                                                <td>
                                                    <a href="post_del.php?id=<?php echo $post->getId(); ?>">
                                                        <button type="button"> Delete</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <center>
                                                        <textarea style="background-color: white; color: black;" rows="5" cols="70" disabled><?php echo $post->getContent();?></textarea>
                                                    </center>
                                                </td>
                                            </tr>
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
         
<?php include_once('templates/pageFooter.php'); ?>