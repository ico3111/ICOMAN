<navbar id="Navbar">
    <div id="mainNavbar">
    <h1><?php echo APP_NAME; ?></h1>
    <?php include_once("navbar.php"); ?>
    </div>
    <div class="messageDiv">
        <?php 
        echo isset($_GET['message']) ? "<p>". $_GET['message'] ."</p>" : '';
        echo isset($_GET['error']) ? "<p style='color: red;'>". $_GET['message'] ."</p>" : '';
        ?>
    </div>
</navbar>