<?php
include '../../layout/header.php';
?>

<style>
    <?php
    include '../../assets/css/global.css';
    ?>
</style>
<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login/index.php?error=4");
?>
<?php include_once('../../function.php'); ?>
<!-- start content -->

<body>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $no = $db->escape_string($_POST["no"]);
            // Susun query delete
            $sql = "DELETE FROM kartu_barang WHERE no='$no'";
            // Eksekusi query delete
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada data terhapus
    ?>
    <br>
    <br>
    <br>
    <br>
                    <center>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card user-card-full">
                                                <div class="card-block">
                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Data berhasil dihapus</h6>
                                  
                                                    <br>
                                                  
                                                    <a class="btn btn-primary" href="../../ProductData.php" role="button">Kembali Ke Menu Awal</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <?php
                } else { // Jika sql sukses tapi tidak ada data yang terhapus
                ?>
                    <div class="box">
                        <div style='color: white'>Penghapusan gagal karena data yang dihapus tidak ada.<br></div>
                        <a href="ProductData.php"><button>Kembali Ke Menu Awal</button></a>
                    </div>
                <?php
                }
            } else { // gagal query
                ?>
                <div class="box">
                    <div style='color: white'>Penghapusan gagal.<br></div>
                    <a href="ProductData.php"><button>Kembali Ke Menu Awal</button></a>
                </div>
            <?php
            }
            ?>

    <?php
        } else
            echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
    }
    ?>
</body>
<!-- ending content -->

<?php
include '../../layout/footer.php';
?>