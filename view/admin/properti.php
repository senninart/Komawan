<?php
session_start();
if (!isset($_SESSION["id_user"])) {
  header("Location: ../login.php?error=4");
}
?>
<?php
include("../../functions.php");
?>

<!DOCTYPE html>
<html>

<head>
  <?php sidebar("Data Properti"); ?>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<body>

  <div class="container mt-3">

    <h1>Data Properti</h1>
    <?php
    if (isset($_GET["status"])) {
      $status = $_GET["status"];
      if ($status == 1) {
        showSuksesCrud("Perubahan Data Sewa Berhasil Disimpan");
      } else if ($status == 2) {
        showGagalCrud("Sewa");
      } else if ($status == 3) {
        showSuksesCrud("Data Sewa Berhasil<br>Ditambahkan");
      }
    }
    ?>
    <table class="table table-borderedless">

      <tr>
        <td>
          <form method="post">
            <div class="form-floating">
              <input type="text" name="dicari" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></input>
              <label for="floatingTextarea">Masukan Nama Penghuni / ID Kamar</label>
            </div>
        </td>

        <td>
          <button type="submit" name="TblCari" class="btn btn-outline-secondary btn-lg">Cari</button>
        </td>
        <td align="right">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-success btn-lg" data-bs-toggle="modal" data-bs-target="#tambahProperti">
            Tambah
          </button>
          <!-- <a href="crud_sewa/tambah_sewa.php" type="button" class="btn btn-outline-secondary btn-lg">Tambah</button> -->
        </td>
        </form>
      </tr>

    </table>

    <center>

      <?php
      $db = dbConnect();
      if ($db->connect_errno == 0) {
        if (isset($_POST["TblCari"])) {
          $dicari = $db->escape_string($_POST["dicari"]);
          $sqlcari = "SELECT  * FROM properti
                      WHERE alamat LIKE '%$dicari%' OR
                            harga LIKE '%$dicari%' OR
                            deskripsi LIKE '%$dicari%'";
          $res = $db->query($sqlcari);
          if ($res) {
      ?>
            <table class="table table-bordered">
              <tr class="bg-dark text-white" align="center">
                <th>No</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
              <?php
              $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
              foreach ($data as $properti) { // telusuri satu per satu
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?php echo $properti["alamat"]; ?></td>
                  <td align="right"><?php echo $properti["harga"]; ?></td>
                  <td><?php echo $properti["deskripsi"]; ?></td>
                  <td>
                    <div align="center"><a href="crud_sewa/edit_sewa.php?id_penghuni=<?php echo $properti['id_penghuni']; ?>" class="btn btn-primary"><i class="fa fa-pen"></i></a></div>
                    <div align="center"><a href="crud_sewa/edit_sewa.php?id_penghuni=<?php echo $properti['id_penghuni']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></div>
                  </td>
                </tr>

              <?php
              }
              ?>

            </table>
    </center>
  </div>
<?php
            $res->free();
          }
        } else {
          $sql = "SELECT * FROM t_properti";

          $res = $db->query($sql);
          if ($res) {
?>
  <table class="table table-bordered">
    <tr class="bg-dark text-white" align="center">
      <th>No</th>
      <th>Alamat</th>
      <th style="width:13%">Harga</th>
      <th>Deskripsi</th>
      <th style="width:10%">Aksi</th>
    </tr>
    <?php
            $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
            foreach ($data as $properti) { // telusuri satu per satu
              $no = 1;
    ?>
      <tr>
        <td align="center"><?= $no ?></td>
        <td><?php echo $properti["alamat"]; ?></td>
        <td align="right">Rp. <?php echo number_format($properti["harga"], 0, ',', '.') ?></td>
        <td><?php echo $properti["deskripsi"]; ?></td>
        <td>
          <div align="center">
            <a href="crud_sewa/edit_sewa.php?id_properti=<?php echo $properti['id']; ?>" class="btn btn-primary"><i class="fa fa-pen"></i></a>
            <a href="crud_sewa/edit_sewa.php?id_properti=<?php echo $properti['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </div>

        </td>
      </tr>

    <?php
              $no++;
            }
    ?>

  </table>
  </center>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="tambahProperti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Properti</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3 row">
              <label class="col-form-label">Alamat</label>
              <textarea class="form-control" name="alamat"></textarea>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Harga</label>
              <input type="number" class="form-control" name="harga">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Tipe</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Luas Tanah</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Luas Bangunan</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Kamar Tidur</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Kamar Mandi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Fasilitas</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Sertifikasi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Gambar</label>
              <input type="file" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Tambah</button>
        </div>
      </div>
    </div>
  </div>

<?php
            $res->free();
          } else
            echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
        }
      } else
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
?>
</body>

</html>