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
    <title>CRUD - ID Ubah</title>
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
                        <h6><i class="fa fa-fw fa-table"></i> Ubah Data</h6>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo $tampil?>';" tabindex="4">
                            <i class="fa fa-fw fa-arrow-left"></i> Kembali
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="<?php echo $simpan?>" method="post">
                        <?php
                        if(is_array($other) || is_object($other))
                        {
                            foreach($other as $er)
                            {
                            ?>
                        <div class="row mb-2">
                            <div class="form-group" hidden>
                                <label>ID <i class="text-danger">*</i></label>
                                <input type="number" name="id" class="form-control" value="<?php echo $er['id']?>" required>
                                <?php echo form_error('id')?>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>Email <i class="text-danger">*</i></label>
                                        <input type="email" name="email" class="form-control" placeholder="Silahkan masukan email" value="<?php echo $er['email']?>" min_length="5" max_length="40" required tabindex="1">
                                        <span class="small text-danger">
                                            <?php echo form_error('email')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>No Telepon
                                            <text class="small">(contoh : 08xxxxxxxxx)</text>
                                            <i class="text-danger">*</i>
                                        </label>
                                        <input type="tel" name="no_telp" class="form-control" placeholder="Silahkan masukan no telepon" value="<?php echo $er['no_telp']?>" max_length="12" required tabindex="2">
                                        <span class="small text-danger">
                                            <?php echo form_error('no_telp')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body float-right mt-5 mb-1">
                                    <button class="btn btn-danger btn-sm" type="reset" tabindex="4">
                                        <i class="fa fa-fw fa-undo"></i> Reset
                                    </button>
                                    <button class="btn btn-primary btn-sm" type="submit" tabindex="3">
                                        <i class="fa fa-fw fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                            <?php
                            }
                        }
                        ?>
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