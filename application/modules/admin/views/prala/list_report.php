<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($_GET['t']=='pdf'))
{
	// header("Content-type:application/pdf; charset=utf-8");
	// header("Content-Disposition:attachment;filename='calon peserta.pdf'");
}else{
	header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	header("Content-type: application/x-msexcel; charset=utf-8");
	header("Content-Disposition: attachment; filename=report.xls");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
}
$kelamin = array(1=>'Laki-Laki', 0=>'Perempuan');
?>
<link rel="stylesheet" type="text/css" href="<?php echo @$this->esg->get_esg('extra_css'); ?>">
<table>
	<tr>
		<td colspan="16"><h1 style="text-align: center;">Data Pendaftar Prala</h1></td>
	</tr>
</table>
<table border="1" class="table table-bordered">
	<tbody>
		<tr>
			<td>ID</td>
			<td>KODE PELAUT</td>
			<td>NO REGISTRATION</td>
			<td>NAMA</td>
			<td>NO ID KTP</td>
			<td>TMPT LAHIR</td>
			<td>TGL LAHIR</td>
			<td>KELAMIN</td>
			<td>NAMA IBU</td>
			<td>KEWARGANEGARAAN</td>
			<td>ALAMAT</td>
			<td>KECAMATAN</td>
			<td>KABUPATEN</td>
			<td>PROVINSI</td>
			<td>EMAIL</td>
			<td>HP</td>
		</tr>
		<?php if (!empty($data)): ?>
			<?php foreach ($data as $key => $value): ?>
				<tr>
					<td><?php echo $value['id'] ?></td>
					<td><?php echo $value['kode_pelaut'] ?></td>
					<td><?php echo $value['no_registration'] ?></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['no_id_ktp'] ?></td>
					<td><?php echo $value['tempat_lahir'] ?></td>
					<td><?php echo $value['tgl_lahir'] ?></td>
					<td><?php echo $kelamin[$value['kelamin']] ?></td>
					<td><?php echo $value['nama_ibu'] ?></td>
					<td><?php echo $value['kewarganegaraan'] ?></td>
					<td><?php echo $value['alamat'] ?></td>
					<td><?php echo $value['kecamatan'] ?></td>
					<td><?php echo $value['kabupaten'] ?></td>
					<td><?php echo $value['provinsi'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td><?php echo $value['hp'] ?></td>
				</tr>
			<?php endforeach ?>
		<?php endif ?>
	</tbody>
</table>
<?php 
if(@$_GET['t'] == 'pdf')
{
	?>
	<script type="text/javascript">
		window.print();
	</script>
	<?php
}
?>