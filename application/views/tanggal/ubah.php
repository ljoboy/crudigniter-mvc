<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$tampil = $this->session->flashdata('url_tampil');
$simpan = $this->session->flashdata('url_simpan');
$tgl = date('d')-1;
$bln = date('m');
$thn = date('Y');
$max = ($thn - 6);
$min = ($thn - 75);
$fix_max = $max."-".$bln."-".$tgl;
$fix_min = $min."-".$bln."-".$tgl;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRUD - Tanggal Ubah</title>
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
                        if(is_array($tanggal) || is_object($tanggal))
                        {
                            foreach($tanggal as $er)
                            {
                            ?>
                        <div class="row mb-2">
                            <div class="form-group" hidden>
                                <label>ID <i class="text-danger">*</i></label>
                                <input type="number" name="id" class="form-control" required value="<?php echo $er['id']?>">
                                <span class="small text-danger">
                                    <?php echo form_error('id')?>
                                </span>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>Tanggal Lahir <i class="text-danger">*</i></label>
                                        <input type="date" id="tgl" name="tgl_lahir" class="form-control" min="<?php echo $fix_min?>" max="<?php echo $fix_max?>" required tabindex="1" value="<?php echo $er['tgl_lahir']?>">
                                        <span class="small text-danger">
                                            <?php echo form_error('tgl_lahir')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>Umur</label>
                                        <input type="text" id="umur" name="umur" class="form-control" minlength="3" maxlength="9" required readonly value="<?php echo $er['umur']." Tahun"?>">
                                        <?php echo form_error('umur')?>
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

<script type="text/javascript">
$(document).ready(function()
{
    $('input#tgl').on('change',function()
    {
        var sekarang = new Date();
        var lahir = new Date(this.value);
        var umur = Math.floor((sekarang-lahir) / (365.25 * 24 * 60 * 60 * 1000));
        $('input#umur').val(umur+" Tahun");
    });
});
</script>