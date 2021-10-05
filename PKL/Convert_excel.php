<?php 
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <title>Data Alumni</title>
  
  <style type="text/css">
    html,
    body {
      font-size: 16px;
    }

    body {
      font-family: 'Open Sans', sans-serif;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 1em auto;
      position: relative;
    }

    .title {
      text-align: center;
    }

    table {
      margin: 3em auto;
      border-collapse: collapse;
    }

    table th,
    table td {
      border: 1px solid #3c3c3c;
      padding: 3px 8px;
    }

    a {
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }
	</style>
</head>
<body>

	<?php header('Content-type: application/vnd-ms-excel'); ?>
  <?php 
    header("Content-Disposition: attachment; filename=Data Alumni.xls");
  ?>
	
  <div class="container">
    <div class="title">
      <h1>Data Alumni</h1>
      <p><em>&lt;Tanggal cetak: <?= date('d F Y, h:i:s'); ?>&gt;</em></p>
    </div>
    
    <table border="1" style="width: 100%;">
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telp</th>
        <th>Tahun Lulus</th>
        <th>Profesi</th>
      </tr>
      
      <?php
        $query = "SELECT * FROM alumni WHERE auth = 'Sudah Disetujui'";
        // koneksi database
        $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

        // menampilkan data pegawai
        $data = mysqli_query($koneksi, $query);
        $no = 1;
        while ($d = mysqli_fetch_array($data)) {
      ?>
      <tr>
        <td><?= $no++;?></td>
        <td><?= $d['nama_alumni']; ?></td>
        <td><?= $d['alamat_alumni']; ?></td>
        <td>"<?= $d['telp']; ?>"</td>
        <td><?= $d['tahun']; ?></td>
        <td><?= $d['kerja']; ?></td>
      </tr>
      <?php } ?>
    </table>

  </div>
</body>
</html>