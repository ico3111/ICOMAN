<td colspan="2">
    <br>
    <center>
        <table>
            <tbody>
                <tr>
                    <td>
                    <center>
                        <h3>[ New Channel ]</h3>
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
                    </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>[ Channels You are In ]</h3> 
                        <center>
                            <table>
                                <thead>
                                    <th>Enter</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Admin/Owner</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($channels as $channel): ?>
                                    <tr>
                                        <td>
                                            <a href="posts.php?id=<?php echo $channel->getId(); ?>">ENTER</a>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo $channel->getId(); ?>">
                                            <?php echo $channel->getName(); ?>
                                        </td>
                                        <td>
                                            <textarea cols="20" rows="2"><?php echo $channel->getDescription(); ?></textarea>
                                        </td>
                                        <td>
                                            <?php echo $channel->getOwner()->getUsername(); ?>
                                        </td>
                                        <td>
                                            <?php if ($channel->getOwner()->getUsername() == $user) { ?>
                                            <a href="channel_del.php?id=<?php echo $channel->getId(); ?>">
                                                <button type="button">delete</button>
                                            </a>
                                            <?php } else { ?>
                                            <a href="channel_delUser.php?user=<?php echo $user; ?>&channel=<?php echo $channel->getId(); ?>">
                                                <button type="button">Quit</button>
                                            </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;  ?>
                                </tbody>
                            </table>
                        </center>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table> 
    </center>
    <br>
</td>