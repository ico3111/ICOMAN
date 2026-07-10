<td colspan="2">
    <br>
    <center>
        <table>
            <tbody>
                <tr>
                    <td>
                        <center>
                            <h3>[New Task]</h3>
                            <form action="task_add.php" method="post">
                                <table>   
                                    <tbody>
                                        <tr>
                                            <td>
                                            <table>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="board_id" value="<?php echo $_GET['id']; ?>">
                                                            <input type="checkbox" name="isChecked">
                                                        </td>
                                                        <td><input type="text" name="title"></td>
                                                        <td><textarea name="description" cols="30" rows="1"></textarea></td>
                                                        <td><input type="date" name="deadline"></td>
                                                    </tr>
                                            </table> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="submit" style="width: 100%;">Submit</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </center>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>[ <?php echo $board->getName(); ?> ]</h3>
                        <textarea rows="5" cols="70" disabled>CRIADO POR: <?php echo $board->getOwnerName(); ?>. DESCRICAO: <?php echo $board->getDescription(); ?>. USUARIOS: <?php foreach ($users as $user) { echo $user->getUserName(). ', '; } ?>.
                        </textarea>
                        <?php if ($board->getOwner() == $userId): ?>
                            <br><br>
                            <div style="display: flex; justify-content: center;">
                                <form action="board_addUser.php" method="post">
                                    <input type="hidden" name="board_id" value="<?php echo $_GET['id']; ?>">
                                    <input type="text" name="user_name">
                                    <button type="submit">add</button>
                                </form>
                                <form action="board_delUser.php" method="post">
                                    <input type="hidden" name="board_id" value="<?php echo $_GET['id']; ?>">
                                    <input type="text" name="user_name">
                                    <button type="submit">Remove</button>
                                </form>
                            </div>
                        <?php endif; ?>
                        <hr>
                        <center>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Topic</th>
                                        <th>Task</th>
                                        <th>Deadline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tasks as $task) { ?>
                                    <tr>
                                        <form action="task_edit.php" method="POST">
                                            <td>                                                            
                                                <input type="hidden" name="id" value="<?php echo $task->getId(); ?>">
                                                <input type="hidden" name="board_id" value="<?php echo $task->getBoardId(); ?>">
                                                <input type="checkbox" name="isChecked" <?php echo $task->getIsChecked() == 'on' ? 'checked' : '' ?>>
                                            </td>
                                            <td>
                                                <textarea name="title" cols="20" rows="1"><?php echo $task->getTitle(); ?></textarea>
                                            </td>
                                            <td>
                                                <textarea name="description" cols="30" rows="1"><?php echo $task->getDescription(); ?></textarea>
                                            </td>
                                            <td>
                                                <input class="form-input" type="date" name="deadline" value="<?php echo $task->getDeadline(); ?>">
                                            </td>
                                            <td>
                                                <button type="submit" name="editTask">Update</button>
                                                <button type="submit" name="deleteTask">Delete</button>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php } ?>
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