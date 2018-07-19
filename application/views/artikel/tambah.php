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
    <title>CRUD - Artikel Tambah</title>
    <?php include '/../assetCss.php';?>

    <!-- plugin CSS Select2 -->
    <link href="<?php echo base_url()?>/vendor/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/vendor/bootstrap-wysihtml5/lib/css/prettify.css" rel="stylesheet">

    <!-- plugin CSS Select2 -->
    <link href="<?php echo base_url()?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
</head>

<style type="text/css">
.form-group .preview
{
    display: none;
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
                        <h6><i class="fa fa-fw fa-table"></i> Tambah Data</h6>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo $tampil?>';" tabindex="4">
                            <i class="fa fa-fw fa-arrow-left"></i> Kembali
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="<?php echo $simpan?>" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="table-responsive col-lg-12">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Judul Artikel <i class="text-danger">*</i></label>
                                        <textarea class="form-control" name="judul" minlength="20" maxlength="200" required tabindex="1"><?php echo set_value('judul')?></textarea>
                                        <span class="small text-danger">
                                            <?php echo form_error('judul')?>
                                        </span>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Lampirkan Gambar</label>
                                        <input class="form-control" type="file" name="gambar" id="pilih" accept="image/*" tabindex="2">
                                        <span class="small text-danger">
                                            <?php echo form_error('gambar')?>
                                        </span>
                                        <img id="preview" class="form-control preview">
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Isi Artikel <i class="text-danger">*</i></label>
                                        <textarea id="isi" class="form-control" name="isi" style="height: 500px" minlength="200" maxlength="65535" required tabindex="3"><?php echo set_value('isi')?></textarea>
                                        <span class="small text-danger">
                                            <?php echo form_error('isi')?>
                                        </span>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" class="form-control" id="tag" name="tag" data-role="tagsinput" value="<?php echo set_value('tag')?>" maxlength="200" required tabindex="4">
                                        <span class="small text-danger">
                                            <?php echo form_error('tag')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8"></div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body float-right mt-5 mb-1">
                                    <button class="btn btn-danger btn-sm" type="reset" tabindex="6">
                                        <i class="fa fa-fw fa-undo"></i> Reset
                                    </button>
                                    <button class="btn btn-primary btn-sm" type="submit" tabindex="5">
                                        <i class="fa fa-fw fa-send"></i> Post
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

    <style>
    .wysihtml5-toolbar .wysihtml5-command-active
    {
        background: #006EE5 !important;
    }
    
    /*body.wysihtml5-editor:hover,*/
    .wysihtml5-sandbox:focus
    {
        border-color: #80bdff !important;
        outline: 0 !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
    }

    .wysihtml5-toolbar ul.dropdown-menu li a
    {
        padding-left: 10px !important;
        display: block !important;
        width: 100% !important;
    }

    .wysihtml5-toolbar ul.dropdown-menu li a:hover
    {
        background: #DDD !important;
    }

    .wysihtml5-toolbar ul.dropdown-menu li a.wysihtml5-command-active
    {
        color: white;
        background: #007BFF !important;
    }

    .wysihtml5-toolbar ul.dropdown-menu li a.wysihtml5-command-active:hover
    {
        background: #006EE5 !important;
    }

    span.label-info
    {
        background: #007BFF !important;
        padding: 0 5px 2px 6px;
        border-radius: 3px;
    }

    .bootstrap-tagsinput input[type='text']
    {
        line-height: 30px;
        background: none;
    }

    .focus
    {
        border-color: #80bdff !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
    }
    </style>

    <?php include '/../assetJs.php';?>
    <?php include '/../dataNav.php';?>
    <?php include '/../dataHal.php';?>

    <!-- plugin WYSIHTML5 -->
    <script src="<?php echo base_url()?>/vendor/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url()?>/vendor/bootstrap-wysihtml5/lib/js/prettify.js"></script>
    <script src="<?php echo base_url()?>/vendor/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <!-- plugin Tagsinput -->
    <script src="<?php echo base_url()?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
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
        $("img#preview").hide();
        $("img#preview").removeAttr('src');
    });

    $("textarea#isi").wysihtml5(
    {
        "font-styles": true,
        "emphasis": true,
        "lists": true, 
        "html": true, 
        "link": false, 
        "image": false, 
        "color": false 
    });

    $(".wysihtml5-toolbar .btn").addClass('btn-primary btn-sm');
    $("i.icon-list").addClass('fa fa-fw fa-list-ul');
    $("i.icon-th-list").addClass('fa fa-fw fa-list-ol');
    $("i.icon-indent-right").addClass('fa fa-fw fa-outdent');
    $("i.icon-indent-left").addClass('fa fa-fw fa-indent');
    $("i.icon-pencil").addClass('fa fa-fw fa-pencil');

    $("textarea#tag").tagsinput(
    {
        maxTags: 20
    });

    $(".bootstrap-tagsinput").addClass("form-control");
    //$(".bootstrap-tagsinput").addClass("focus");
});
</script>