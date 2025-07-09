<center>
    <table width="80%">
        <tbody>
            <tr id="header" style="background-color: #3b5998; color: white">
                <td>
                    <center>
                        <h2>[ StudyHub ]</h2>
                        <?php 
                        echo isset($_GET['message']) ? "<p>". $_GET['message'] ."</p>" : '';
                        echo isset($_GET['error']) ? "<p style='color: red;'>". $_GET['message'] ."</p>" : '';
                        ?>
                    </center>
                </td>
                <td>
                    <?php include_once("navbar.php"); ?>
                </td>
            </tr>
            <tr>
