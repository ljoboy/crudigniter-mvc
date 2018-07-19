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
    <title>CRUD - Gambar Ubah</title>
    <?php include '/../assetCss.php';?>
</head>

<style type="text/css">
.form-group .preview
{
    border: 1px solid #CCC;
    padding: 10px 10px 10px 10px;
    margin-top: 10px;
}
</style>

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
                    <form role="form" enctype="multipart/form-data" action="<?php echo $simpan?>" method="post">
                        <?php
                        if(is_array($img) || is_object($img))
                        {
                            foreach($img as $er)
                            {
                            ?>
                        <div class="row">
                            <div class="table-responsive col-lg-6">
                                <div class="panel-body">
                                    <div class="form-group" hidden>
                                        <input type="text" name="id" value="<?php echo $er['id']?>">
                                        <input type="text" name="source" value="<?php echo $er['source']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar
                                            <text class="small">(jpg/jpeg/png. max : 2mb)</text>
                                            <i class="text-danger">*</i>
                                        </label>
                                        <input type="file" id="pilih" name="gambar" class="form-control" accept="image/*" required tabindex="1">
                                        <span class="small text-danger">
                                            <?php echo form_error('gambar')?>
                                        </span>
                                        <img id="preview" class="form-control preview" src="<?php echo base_url()?>data/gambar/src/<?php echo $er['source']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                        <div class="row">
                            <div class="table-responsive col-lg-6 mt-2">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Nama Gambar <i class="text-danger">*</i></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Silahkan masukan nama gambar" value="<?php echo ucwords($er['nama'])?>" maxlength="40" required tabindex="2">
                                        <span class="small text-danger">
                                            <?php echo form_error('nama')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-6">
                                <div class="panel-body float-right mt-5 mb-1">
                                    <button class="btn btn-danger btn-sm" type="reset" tabindex="4">
                                        <i class="fa fa-fw fa-undo"></i> Reset
                                    </button>
                                    <button class="btn btn-primary btn-sm" type="submit" tabindex="3">
                                        <i class="fa fa-fw fa-upload"></i> Upload
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
$(document).ready( function()
{
    function readURL(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("img#preview").attr('src', e.target.result);
                $("img#preview").show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
        
    $("#pilih").change(function()
    {
        readURL(this);
    });

    $("button[type='reset']").click(function()
    {
        $("img#preview").attr('src','<?php echo base_url()?>data/gambar/src/<?php echo $er['source']?>');
    });
});
</script>
