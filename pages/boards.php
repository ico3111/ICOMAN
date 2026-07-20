<td colspan="2">
    <br>
    <center>
        <table>
            <tbody>
                <tr>
                    <td>
                    <center>
                        <h3>[ New board ]</h3>
                        <form action="<?=BOARD_ADD?>" method="post">
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
                        <h3>[ boards You are In ]</h3> 
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
                                    <?php foreach($boards as $board): ?>
                                    <tr>
                                        <td>
                                            <a href="<?=TASKS?>?id=<?php echo $board->getId(); ?>">ENTER</a>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo $board->getId(); ?>">
                                            <?php echo $board->getName(); ?>
                                        </td>
                                        <td>
                                            <textarea cols="20" rows="2"><?php echo $board->getDescription(); ?></textarea>
                                        </td>
                                        <td>
                                            <?php echo $board->getOwner()->getUsername(); ?>
                                        </td>
                                        <td>
                                            <?php if ($board->getOwner()->getUsername() == $user) { ?>
                                            <a href="<?=BOARD_DEL?>?id=<?php echo $board->getId(); ?>">
                                                <button type="button">delete</button>
                                            </a>
                                            <?php } else { ?>
                                            <a href="<?=BOARD_DEL_USER?>?user=<?php echo $user; ?>&board=<?php echo $board->getId(); ?>">
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