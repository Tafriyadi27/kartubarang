<?php
include '../../layout/header.php';
?>

<style>
  <?php
  include '../../assets/css/userAdd.css';
  ?>
</style>
<?php
session_start();
if (!isset($_SESSION["id"]))
  header("Location: login/index.php?error=4");
?>
<?php include_once('../../function.php'); ?>
<!-- start content -->
<!-- container -->
<div class="container">
  <!-- header area -->
  <div class="row">
    <div class="col-md-12 header-area">
      <h1>Tambah Data</h1>
    </div>
  </div>

  <!-- form area-->
  <div class="row form-area">
    <div class="col-md-12">
      <form method="post" name="frm" action="ProductSave.php">
        <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
        <!-- Tanggal-->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tanggal</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal" value="<?php echo date('d-m-Y'); ?>" readonly />
        </div>

        <!-- Masuk -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Masuk</label>
          <input type="number" class="form-control" name="masuk" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masuk" onkeypress="return onlyNumberKey(event)" required />
        </div>

        <!-- Keluar-->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Keluar</label>
          <input type="number" class="form-control" name="keluar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Keluar" onkeypress="return onlyNumberKey(event)" required />
        </div>

        <!-- Keterangan-->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Keterangan</label>
          <input type="text" class="form-control" name="keterangan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Keterangan" required />
        </div>

        <!-- button area -->
        <div class="button-area">
          <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambahkan data
          </button> -->
          <input type="submit" class="btn btn-primary" name="TblSimpan" value="Tambah Data"></input>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
    return true;
  }
</script>
<!-- modal area -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Anda yakin ingin menambahkan data ini?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Tidak
        </button>
        <button type="button" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div> -->
<!-- ending content -->

<?php
include '../../layout/footer.php';
?>