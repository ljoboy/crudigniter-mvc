<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$tambah = $this->session->flashdata('url_tambah');
$ubah = $this->session->flashdata('url_ubah');
$hapus = $this->session->flashdata('url_hapus');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRUD - ID Auto</title>
    <?php include '/../assetCss.php';?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <div class="notif"></div>
    <!-- Navigation-->
    <?php include '/../navigasi.php';?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="float-left mt-1">
                        <h6><i class="fa fa-fw fa-table"></i> List Data</h6>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo $tambah?>';">
                            <i class="fa fa-fw fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover idauto" id="dataTable" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th class="text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                if(is_array($auto) || is_object($auto))
                                {
                                    foreach($auto as $er)
                                    {
                                        $no++;
                                        ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo strtoupper($er['id'])?></td>
                                    <td><?php echo ucwords($er['nama'])?></td>
                                    <td class="text-right tindakan">
                                        <button class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#konfirm" data-id="<?php echo $er['id']?>" data-nama="<?php echo ucwords($er['nama'])?>">
                                            <i class="fa fa-fw fa-trash"></i>
                                            <span class="d-xl-inline d-lg-inline d-none">Hapus</span>
                                        </button>
                                        <button class="btn btn-primary btn-sm" onclick="window.location='<?php echo $ubah.$er['id']?>';">
                                            <i class="fa fa-fw fa-edit"></i>
                                            <span class="d-xl-inline d-lg-inline d-none">Ubah</span>
                                        </button>
                                    </td>
                                </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include '/../footer.php'; ?>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>

    <div id="konfirm" class="modal fade" role="form">
        <div class="modal-dialog">
            <div class="modal-content konten-hapus">
                <div class="modal-body">
                    <h5>Konfirmasi Hapus Data</h5>
                    <text class="text-muted teks"></text>
                    <div class="mt-4 float-right">
                        <button class="btn btn-default btn-sm pl-3 pr-3" type="button" onClick="reset();" data-dismiss="modal">
                            <i class="fa fa-fw fa-remove"></i>  Batal
                        </button>
                        <button class="btn btn-primary btn-sm pl-3 pr-3 iya" type="button">
                            <i class="fa fa-fw fa-check"></i>  Ya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '/../assetJs.php';?>
    <?php include '/../dataNav.php';?>
    <?php include '/../dataHal.php';?>
    <?php include '/../popup.php'; ?>
</body>
</html>

<script type="text/javascript">
$(document).on("click",'.hapus',function()
{
    var id = $(this).data('id');
    var nama = $(this).data('nama');

    $(".teks").text("Anda yakin menghapus data dengan nama "+nama+" ?");
    $(document).on("click",'.iya',function()
    {
        window.location="<?php echo $hapus?>"+id;
    });
});
</script>