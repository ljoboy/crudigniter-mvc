<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$tampil = $this->session->flashdata('url_tampil');
$ubah = $this->session->flashdata('url_ubah');
$hapus = $this->session->flashdata('url_hapus');
include '/../lalu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRUD - Artikel Detail</title>
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
                        <h6><i class="fa fa-fw fa-table"></i> Detail Data</h6>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-sm btn-primary" onclick="window.location='<?php echo $tampil?>';" tabindex="4">
                            <i class="fa fa-fw fa-arrow-left"></i> Kembali
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $no = 0;
                    if(is_array($news) || is_object($news))
                    {
                        foreach($news as $er)
                        {
                            $no++;
                            $tag = explode(',',$er['tag']);
                            ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-body">
                                <article>
                                    <h4><?php echo ucwords($er['judul'])?></h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <time>
                                                <?php echo waktu_lalu($er['tgl_post']);?>
                                            </time>
                                        </div>
                                    </div>
                                    <figure>
                                        <img src="<?php echo base_url()?>data/artikel/<?php echo $er['gambar']?>" alt="<?php echo ucwords($er['judul'])?>" class="img-responsive col-lg-7">
                                    </figure>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php echo $er['isi']?>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8"></div>
                        <div class="table-responsive col-lg-4">
                            <div class="panel-body float-right mt-5 mb-1">
                                <button class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#konfirm" data-id="<?php echo $er['id']?>" data-jdl="<?php echo ucwords($er['judul'])?>" data-img="<?php echo $er['gambar']?>">
                                    <i class="fa fa-fw fa-trash"></i> Hapus
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="window.location='<?php echo $ubah.$er['id']?>';">
                                    <i class="fa fa-fw fa-edit"></i> Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                        <?php
                        }
                    }
                    ?>
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
</body>
</html>

<script type="text/javascript">
jQuery(document).ready(function()
{
});

$(document).on("click",'.hapus',function()
{
    var id = $(this).data('id');
    var jdl = $(this).data('jdl');
    var gambar = $(this).data('img');

    $(".teks").text("Anda yakin menghapus artikel dengan judul "+jdl+" ?");
    $(document).on("click",'.iya',function()
    {
        window.location="<?php echo $hapus?>"+id+"/"+gambar;
    });
});
</script>