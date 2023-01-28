<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
  $db = mysqli_connect("localhost", "root", "", "magang");
  return $db;
}

function getDataKartuBarang($id)
{
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * from kartu_barang where no='$id'");
    if ($res) {
      if ($res->num_rows > 0) {
        $data = $res->fetch_assoc();
        $res->free();
        return $data;
      } else
        return FALSE;
    } else
      return FALSE;
  } else
    return FALSE;
}

function getDataKartuBarang2()
{
  $db = dbConnect();
  $sql = "SELECT * FROM kartu_barang";
  $res = $db->query($sql);
  if ($res) {
    if ($res->num_rows > 0) {
      $data = $res->fetch_all(MYSQLI_ASSOC);
      $res->free();
      return $data;
    } else
      return FALSE;
  }
}

function showError($message)
{
?>
  <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
    <?php echo $message; ?>
  </div>
<?php
}
?>