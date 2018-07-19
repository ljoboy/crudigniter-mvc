<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$tampil = $this->session->flashdata('url_tampil');
$simpan = $this->session->flashdata('url_simpan');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRUD - ID Tambah</title>
    <?php include '/../assetCss.php';?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include '/../navigasi.php';?>

    <div class="content-wrapper">
        <div class="container-fluid col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="float-left mt-1">
                        <h6><i class="fa fa-fw fa-table"></i> Tambah Data</h6>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo $tampil?>';" tabindex="4">
                            <i class="fa fa-fw fa-arrow-left"></i> Kembali
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="<?php echo $simpan?>" method="post">
                        <div class="row mb-2">
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>ID Anda</label>
                                        <input type="text" name="id" class="form-control" value="<?php echo strtoupper($id)?>" minlength="2" maxlength="7" required readonly>
                                        <span class="small text-danger">
                                            <?php echo form_error('id')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>Nama <i class="text-danger">*</i></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Silahkan masukan nama" value="<?php echo set_value('nama')?>" minlength="2" maxlength="40" required tabindex="1">
                                        <span class="small text-danger">
                                            <?php echo form_error('nama')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body float-right mt-5 mb-1">
                                    <button class="btn btn-danger btn-sm" type="reset" tabindex="3">
                                        <i class="fa fa-fw fa-undo"></i> Reset
                                    </button>
                                    <button class="btn btn-primary btn-sm" type="submit" tabindex="2">
                                        <i class="fa fa-fw fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include '/../footer.php'; ?>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>

    <?php include '/../assetJs.php';?>
    <?php include '/../dataNav.php';?>
    <?php include '/../dataHal.php';?>
</body>
</html>
