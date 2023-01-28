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
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $no = $db->escape_string($_POST["no"]);
            $tanggal  = $db->escape_string($_POST["tanggal"]);
            $masuk       = str_replace(",", "", explode(".", $db->escape_string($_POST["masuk"]))[0]);
            $keluar       = str_replace(",", "", explode(".", $db->escape_string($_POST["keluar"]))[0]);
            $keterangan = $db->escape_string($_POST["keterangan"]);
            $masuktoint = (int)$masuk;
            $keluartoint = (int)$keluar;
            $sisa = $masuktoint - $keluartoint;
            // Susun query update
            $sql = "UPDATE kartu_barang SET
                    tanggal='$tanggal',
                    masuk='$masuk',
                    keluar='$keluar',
                    sisa='$sisa',
                    keterangan='$keterangan'
                    WHERE no='$no'";
            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
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
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Data berhasil di update</h6>

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
                } else { // Jika sql sukses tapi tidak ada data yang berubah
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
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Data Tidak Ada Perubahan</h6>

                                                <br>
                                                <a class="btn btn-primary" href="javascript:history.back()" role="button">Edit Kembali</a>
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
                }
            } else // gagal query 
            {
                ?>
                <div class="box">
                    <div style="color: white">Data gagal diupdate.</div>
                    <a href="javascript:history.back()"><button>Edit Kembali</button></a>
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