<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
<title>Latihan CRUD MySQLi</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center"><img src="logo1.png" "width=100px; height=50px;" /></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="index.php">Data Karyawan</a></li>
        <li><a href="add.php">Tambah Data</a></li>
      </ul>
       <!-- Dropdown Trigger -->
  <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Our Service</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">VPS</a></li>
    <li><a href="#!">e commerce</a></li>
    <li class="divider"></li>
    <li><a href="#!">Hosting</a></li>
  </ul>
        
    </div>
  </nav>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Biodata</h2>
			<hr />
			
			<?php
			$nik = $_GET['nik'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik='$nik'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">NIK</th>
					<td><?php echo $row['nik']; ?></td>
				</tr>
				<tr>
					<th>Nama Karyawan</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Tempat & Tanggal Lahir</th>
					<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td><?php echo $row['alamat']; ?></td>
				</tr>
				<tr>
					<th>No Telepon</th>
					<td><?php echo $row['no_telepon']; ?></td>
				</tr>
				<tr>
					<th>Jabatan</th>
					<td><?php echo $row['jabatan']; ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<td><?php echo $row['status']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><?php echo $row['password']; ?></td>
				</tr>
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>

   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>

	<script src="js/bootstrap.min.js"></script>

</body>
</html>