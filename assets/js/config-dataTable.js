$(document).ready(function()
{
	$("#dataTable").dataTable(
	{
		responsive: true,
		dom: 'fBrtip<"clear">l',
		buttons: [
		{
			extend: 'excel',
			text: "<i class='fa fa-file-excel-o'></i> Excel",
		},
		{
			extend: 'pdf',
			text: "<i class='fa fa-file-pdf-o'></i> Pdf",
		},
		{
			extend: 'print',
			text: "<i class='fa fa-print'></i> Print",
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