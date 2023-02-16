<?php
session_start();
if (!isset($_SESSION["id_user"])) {
  header("Location: ../login.php?error=4");
}
?>
<?php
include_once("../../functions.php");
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  sidebar("Dashboard");
  ?>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/sweethapus.js"></script>

<body>
  <div class="container mt-3">

    <h1>Dashboard</h1>

</body>

</html>