<?php
  include '../../layout/header.php';
?>

<style>
  <?php
    include '../../assets/css/userAdd.css';
  ?>
</style>

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
        <form>
          <!-- Tanggal-->
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Tanggal</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Tanggal"
            />
          </div>

          <!-- Masuk -->
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Masuk</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Masuk"
            />
          </div>

          <!-- Keluar-->
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keluar</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Keluar"
            />
          </div>
          
           <!-- Sisa-->
           <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sisa</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Sisa"
            />
          </div>

           <!-- Keterangan-->
           <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Keterangan"
            />
          </div>

          <!-- button area -->
          <div class="button-area">
            <button
              type="button"
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              Tambahkan data
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- modal area -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">Anda yakin ingin menambahkan data ini?</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Tidak
            </button>
            <button type="button" class="btn btn-primary">Ya</button>
          </div>
        </div>
      </div>
    </div>
<!-- ending content -->

<?php
  include '../../layout/footer.php';
?>