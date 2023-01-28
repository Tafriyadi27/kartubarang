<?php
include '../../layout/header.php';
?>

<style>
  <?php
  include '../../assets/css/userData.css';
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
  <?php
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
    $total = $db->query("SELECT * FROM kartu_barang");
    $pages = ceil($total->num_rows / $halaman);
    $sql = "SELECT * FROM kartu_barang LIMIT $mulai, $halaman";
    $res = $db->query($sql);
    if ($res) {
  ?>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col" class="col-tanggal">Tanggal</th>
                <th scope="col" class="col-masuk">Masuk</th>
                <th scope="col" class="col-keluar">Keluar</th>
                <th scope="col" class="col-sisa">Sisa</th>
                <th scope="col" class="col-keterangan">Keterangan</th>
                <th scope="col" class="col-keterangan">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = $mulai + 1;
              while ($data = $res->fetch_assoc()) {
                $tanggal = $data['tanggal'];
                $formattanggal = date('d-m-Y', strtotime($tanggal));
              ?>
                <tr>
                  <th class="align-middle"><?= $no ?></th>
                  <td class="align-middle"><?= $formattanggal ?></td>
                  <td class="align-middle"><?= $data['masuk'] ?></td>
                  <td class="align-middle"><?= $data['keluar'] ?></td>
                  <td class="align-middle"><?= $data['sisa'] ?></td>
                  <td class="align-middle"><?= $data['keterangan'] ?></td>
                  <td>
                    <a href="./ProductEdit.php?id=<?= urlencode(openssl_encrypt(
                                                    $data['no'],
                                                    'aes-128-cbc',
                                                    $_SESSION["passphrase"],
                                                    0,
                                                    $_SESSION["iv"]
                                                  )) ?>" class="btn btn-primary">Ubah Data</a>
                    <a href="./ProductConfirmDelete.php?id=<?= urlencode(openssl_encrypt(
                                                              $data['no'],
                                                              'aes-128-cbc',
                                                              $_SESSION["passphrase"],
                                                              0,
                                                              $_SESSION["iv"]
                                                            )) ?>" class="btn btn-danger">Hapus Data</a>
                  </td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
          <?php echo $db->error; ?>
          <?php for ($i = 1; $i <= $pages; $i++) { ?>
            <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

          <?php }

          ?>
        </div>
      </div>
  <?php
      $res->free();
    } else
      echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
  } else
    echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
  ?>
  <!-- ending content -->

  <?php
  include '../../layout/footer.php';
  ?>