<?php
include '../../layout/header.php';
?>

<style>
  <?php
  include '../../assets/css/data-user.css';
  ?>
</style>
<?php
session_start();
if (!isset($_SESSION["id"]))
  header("Location: login/index.php?error=4");
?>
<?php include_once('../../function.php'); ?>
<!-- start content -->

<!-- ending content -->

<?php
include '../../layout/footer.php';
?>