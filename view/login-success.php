<?php
session_start();

?>
<?php
if ($_SESSION['status_login']) {
    echo '<h1>Login Success<h1>';
    echo 'Welcome ' . $_SESSION['username'];
    ?><br><a href="logout.php">Log Out</a>
    <?php
} else {
    echo '<h1>Login NOW<h1>';
    ?><br><a href="../index.php">Go back index</a>
    <?php
}
?>

