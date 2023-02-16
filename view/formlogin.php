<?php
include("../functions.php");
?>
<?php
$db = dbConnect();
if (isset($_POST["TblLogin"])) {
    $username   = $db->escape_string($_POST["username"]);
    $pass       = $db->escape_string($_POST["pass"]);
    $sql = "SELECT * FROM t_user
            WHERE username = '$username' and pass = '$pass'";
    $res = $db->query($sql);
    if ($res) {
        if ($res->num_rows == 1) {
            $data = $res->fetch_assoc();
            session_start();
            $_SESSION["id_user"] = $data["id"];
            $_SESSION["nama_user"] = $data["nama"];
            header("Location: admin/dashboard.php");
        } else {
            header("Location: login.php?error=1");
        }
    } else {
        header("Location: login.php?error=2");
    }
} else {
    header("Location: login.php?error=3");
}
?>