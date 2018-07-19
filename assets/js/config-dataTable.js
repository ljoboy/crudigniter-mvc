$(document).ready(function()
{
	function formatTgl(date){
		var bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli",
					 "Agustus","September","Oktober","November","Desember"];

		var hari = date.getDate();
		var noBulan = date.getMonth();
		var tahun = date.getFullYear();

		return hari+'-'+bulan[noBulan]+'-'+tahun;
	};

	$("table#idauto").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data ID Auto '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'pdf',
			title: 'Data ID Auto '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'print',
			title: 'Data ID Auto '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,1,2]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$("table#tanggal").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data Tanggal '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'pdf',
			title: 'Data Tanggal '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'print',
			title: 'Data Tanggal '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,1,2]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$("table#pilihan").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data Pilihan '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'pdf',
			title: 'Data Pilihan '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'print',
			title: 'Data Pilihan '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,1,2]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$("table#gambar").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data Gambar '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,2,3,4]
			},
		},
		{
			extend: 'pdf',
			title: 'Data Gambar '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,2,3,4]
			},
		},
		{
			extend: 'print',
			title: 'Data Gambar '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,2,3,4]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$("table#artikel").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data Artikel '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,1,2,3]
			},
		},
		{
			extend: 'pdf',
			title: 'Data Artikel '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,1,2,3]
			},
		},
		{
			extend: 'print',
			title: 'Data Artikel '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,1,2,3]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$("table#file").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data File '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,1,2,3]
			},
		},
		{
			extend: 'pdf',
			title: 'Data File '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,1,2,3]
			},
		},
		{
			extend: 'print',
			title: 'Data File '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,1,2,3]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$("table#other").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			title: 'Data Other '+formatTgl(new Date()),
			text: "<i class='fa fa-file-excel-o'></i> Excel",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'pdf',
			title: 'Data Other '+formatTgl(new Date()),
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
			exportOptions: {
				columns: [0,1,2]
			},
		},
		{
			extend: 'print',
			title: 'Data Other '+formatTgl(new Date()),
			text: "<i class='fa fa-print'></i> Print",
			exportOptions: {
				columns: [0,1,2]
			},
		}],
		"info": false,
		"language":
		{
			"emptyTable": "<text class='text-danger'>Tidak terdapat data pada tabel</text>",
			"lengthMenu": "Tampilkan _MENU_ data",
			"search": "Cari :",
			"zeroRecords": "<text class='text-danger'>Tidak ada data yang ditemukan</text>",
			"info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"paginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"paginationType":"full_numbers",
	});

	$(".dt-buttons button").removeClass('btn-secondary');
	$(".dt-buttons button").addClass('btn-primary btn-sm');
});