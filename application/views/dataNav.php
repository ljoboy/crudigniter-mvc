<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$nav = $this->session->flashdata('nav');

if($nav === 'dashboard')
{
	?>
	<script>
	$('li#dashboard').addClass('active');
	$('a#breadcrumbNav').text('Dashboard');
	$('li#breadcrumbAct').text('Dashboard');
	</script>
	<?php
}

if($nav === 'idauto')
{
	?>
	<script>
	$('li#idAuto').addClass('active');
	$('a#breadcrumbNav').text('ID Auto');
	</script>
	<?php
}

if($nav === 'tanggal')
{
	?>
	<script>
	$('li#tanggal').addClass('active');
	$('a#breadcrumbNav').text('Tanggal');
	</script>
	<?php
}

if($nav === 'pilihan')
{
	?>
	<script>
	$('li#pilihan').addClass('active');
	$('a#breadcrumbNav').text('Pilihan');
	</script>
	<?php
}

if($nav === 'gambar')
{
	?>
	<script>
	$('li#gambar').addClass('active');
	$('a#breadcrumbNav').text('Gambar');
	</script>
	<?php
}

if($nav === 'artikel')
{
	?>
	<script>
	$('li#artikel').addClass('active');
	$('a#breadcrumbNav').text('Artikel');
	</script>
	<?php
}

if($nav === 'file')
{
	?>
	<script>
	$('li#file').addClass('active');
	$('a#breadcrumbNav').text('File');
	</script>
	<?php
}

if($nav === 'other')
{
	?>
	<script>
	$('li#other').addClass('active');
	$('a#breadcrumbNav').text('Other');
	</script>
	<?php
}
?>