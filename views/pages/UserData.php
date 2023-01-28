<?php
include '../../layout/header.php';
?>

<style>
  <?php
  include '../../assets/css/userData.css';
  ?>
</style>

<!-- start content -->
<!-- container -->
<div class="container">
  <!-- header area -->
  <div class="row">
    <div class="col-md-12 header-area">
      <h1>Kartu Barang</h1>
    </div>
  </div>

  <!-- add data button -->
  <div class="row add-button-area">
    <div class="col-md-12">
      <a href="./ProductAdd.php" type="button" class="btn btn-outline-light">
        Tambah Data
      </a>
    </div>
  </div>

  <!-- table data area -->
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Masuk</th>
            <th scope="col">Keluar</th>
            <th scope="col">Sisa</th>
            <th scope="col">Keterangan</th>

          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="align-middle">1</td>
            <td class="align-middle">01-09-2021</td>
            <td class="align-middle"> 5.000</td>
            <td class="align-middle">100</td>
            <td class="align-middle">4.650</td>
            <td class="align-middle">Bidang C</td>
            </td>
            <td>
              <a href="./ProductData.php" class="btn btn-success align-middle">
                Lihat Data
              </a>
              <a href="./ProductAdd.php" class="btn btn-primary align-middle">
                Ubah Data
              </a>
              <button type="button" class="btn btn-danger align-middle">
                Hapus Data
              </button>
            </td>
          </tr>
          <tr>
            <td class="align-middle">2</td>
            <td class="align-middle">01-10-2001</td>
            <td class="align-middle">
              10.000
            </td>
            <td class="align-middle">100</td>
            <td class="align-middle">4.900</td>
            <td class="align-middle">Bidang C</td>

            <td>
              <a href="./ProductData.php" class="btn btn-success align-middle">
                Lihat Data
              </a>
              <a href="./ProductAdd.php" class="btn btn-primary align-middle">
                Ubah Data
              </a>
              <button type="button" class="btn btn-danger align-middle">
                Hapus Data
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- ending content -->

<?php
include '../../layout/footer.php';
?>