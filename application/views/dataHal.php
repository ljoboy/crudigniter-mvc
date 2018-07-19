<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$hal = $this->session->flashdata('hal');

if($hal === 'tampil')
{
	?>
	<script>
	$('li#breadcrumbAct').text('List Data');
	</script>
	<?php
}
if($hal === 'tambah')
{
	?>
	<script>
	$('li#breadcrumbAct').text('Tambah Data');
	</script>
	<?php
}
if($hal === 'ubah')
{
	?>
	<script>
	$('li#breadcrumbAct').text('Ubah Data');
	</script>
	<?php
}
?>