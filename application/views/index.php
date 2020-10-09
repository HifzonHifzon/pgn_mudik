<!DOCTYPE html>
<html>
<head>
	<title>Search Pagination Session dengan Codeigniter | AZZURA Media</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default.css'); ?>">
</head>
<body>

	<div class="wrap">
		<h1>Search Pagination Session dengan Codeigniter</h1>

		<form action="<?php echo site_url('welcome/index/'); ?>" method="post">
		<p>
			<input type="search" name="cari" placeholder="Search Keyword..."> <input type="submit" name="q" value="Search">
		</p>
		<table border="1" width="780px">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (count((array)$ListBerita) > 0) {
					foreach($ListBerita as $row)
					{
						echo "<div class=\"letter\">";
						?>

						<tr>
							<td valign="top"><?php echo $row['nim']; ?></td>
							<td valign="top"><?php echo $row['nama']; ?></td>
							<td valign="top"><?php echo $row['jurusan']; ?></td>
							<td valign="top"><?php echo $row['alamat']; ?></td>
						</tr>

				<?php
						echo "</div>";
					}
					echo "<tr><td colspan='6'><div style='background:000; float:right;'>".$this->pagination->create_links()."</div></td></tr>";
				} else {
					echo "<tbody><tr><td colspan='8' style='padding:10px; background:#F00; border:none; color:#FFF;'>Hasil pencarian tidak ditemukan.</td></tr></tbody>";
				}
				?>
			</tbody>
		</table>
		</form>
		<center><p>&copy; 2015 - Tutorial Web Design</p></center>
	</div>

</body>
</html>