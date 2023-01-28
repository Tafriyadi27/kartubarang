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
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $tanggal  = $db->escape_string($_POST["tanggal"]);
            $masuk       = $db->escape_string($_POST["masuk"]);
            $keluar        = $db->escape_string($_POST["keluar"]);
            $keterangan = $db->escape_string($_POST["keterangan"]);
            $masuktoint = (int)$masuk;
            $keluartoint = (int)$keluar;
            $sisa = $masuktoint - $keluartoint;
            // Susun query insert
            $sql = "INSERT INTO kartu_barang(tanggal,masuk,keluar,sisa,keterangan)
			  VALUES('$tanggal','$masuk','$keluar','$sisa','$keterangan')";
            // Eksekusi query insert
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada penambahan data
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
                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Data berhasil di simpan</h6>
                                  
                                                    <br>
                                                  
                                                    <a class="btn btn-primary" href="ProductData.php" role="button">Kembali Ke Menu Awal</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                    <div class="box">
                        <div style="color: white">Data berhasil disimpan.</div><br>
                        <a href="ProductData.php"><button>Kembali Ke Menu Awal</button></a>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="box">
                    <div style="color: white">Data gagal disimpan karena adanya kesalahan dalam memasukan data. Silahkan Cek Kembali</div><br>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                </div>

    <?php
            }
        } else
            echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
    }
    ?>
</body>
<!-- ending content -->

<?php
include '../../layout/footer.php';
?>