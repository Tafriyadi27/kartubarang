<?php
include_once("../../../function.php");

$db = dbConnect();
if ($db->connect_errno == 0) {
    if (isset($_POST["signin"])) {
        $username = $db->escape_string($_POST['username']);
        $pass = $db->escape_string($_POST['your_pass']);
        $sql = "SELECT * FROM pegawai WHERE username='$username' AND pass='$pass'";
        $res = $db->query($sql);
        if ($res) {
            if ($res->num_rows == 1) {
                $data = $res->fetch_assoc();
                if ($data['jabatan'] == "ketua") {
                    session_start();
                    $nama = $data['firstname'] . " " . $data['lastname'];
                    $_SESSION["id"] = $data["id"];
                    $_SESSION["username"] = $data["username"];
                    $_SESSION["nama"] = $nama;
                    header("Location: ../ProductDataa.php");
                } else {
                    session_start();
                    $nama = $data['firstname'] . " " . $data['lastname'];
                    $_SESSION["id"] = $data["id"];
                    $_SESSION["username"] = $data["username"];
                    $_SESSION["nama"] = $nama;
                    $_SESSION["passphrase"] = openssl_random_pseudo_bytes(16);
                    $_SESSION["iv"] = openssl_random_pseudo_bytes(16);
                    header("Location: ../../../ProductData.php");
                }
            } else
                header("Location: index.php?error=1");
        }
    } else
        header("Location: index.php?error=2");
} else
    header("Location: index.php?error=3");
