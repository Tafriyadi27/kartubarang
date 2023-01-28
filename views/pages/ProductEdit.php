<?php
include '../../layout/header.php';
?>

<style>
    <?php
    include '../../assets/css/userAdd.css';
    ?>
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../../library/autonumeric/autoNumeric.js"></script>
<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login/index.php?error=4");
?>
<?php include_once('../../function.php'); ?>
<!-- start content -->
<div class="container">
    <!-- header area -->
    <div class="row">
        <div class="col-md-12 header-area">
            <h1>Ubah Data</h1>
        </div>
    </div>
    <?php
    $db = dbConnect();
    if (isset($_GET["id"])) {
        $id = (string)$_GET["id"];
        $id = openssl_decrypt($id, "aes-128-cbc", $_SESSION["passphrase"], 0, $_SESSION["iv"]);
        if (!$id) {
            echo "Session expired, silahkan login kembali";
        } else
            $sql = "SELECT * FROM kartu_barang WHERE no=$id";
        if ($datakartubarang = getDataKartuBarang($id)) {
            $tanggal = $datakartubarang['tanggal'];
            $formattanggal = date('d-m-Y', strtotime($tanggal));
    ?>
            <div class="row form-area">
                <div class="col-md-12">
                    <form method="post" name="frm" action="ProductUpdate.php">
                        <input type="hidden" name="no" value="<?php echo $datakartubarang["no"] ?>" class="form-control" required>
                        <input type="hidden" name="tanggal" value="<?php echo $datakartubarang["tanggal"] ?>" class="form-control" required>
                        <!-- Tanggal-->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal" value="<?php echo $tanggal; ?>" readonly />
                        </div>

                        <!-- Masuk -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masuk</label>
                            <input type="text" class="form-control" name="masuk" id="someid" value="<?php echo $datakartubarang["masuk"]; ?>" data-an-default="1234.56" required />
                        </div>

                        <!-- Keluar-->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keluar</label>
                            <input type="text" class="form-control" name="keluar" id="someid2" value="<?php echo $datakartubarang["keluar"]; ?>" data-an-default="1234.56" required />
                        </div>

                        <!-- Keterangan-->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Keterangan" value="<?php echo $datakartubarang["keterangan"]; ?>" required />
                        </div>

                        <!-- button area -->
                        <div class="button-area">
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambahkan data
          </button> -->
                            <input type="submit" class="btn btn-primary" name="TblUpdate" value="Ubah Data"></input>
                            <input type="reset" class="btn btn-primary" value="Reset"></input>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        } else
            echo "<div style='color: white'>Data dengan No : $id tidak ada. Pengeditan dibatalkan</div>";
        ?>
    <?php
    } else
        echo "<div style='color: white'>No tidak ada. Pengeditan dibatalkan.</div>";
    ?>

</div>
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    $(document).ready(function() {
        $('#someid').autoNumeric('init');
        $('#someid2').autoNumeric('init');
    });
</script>
<!-- ending content -->
<?php
include '../../layout/footer.php';
?>