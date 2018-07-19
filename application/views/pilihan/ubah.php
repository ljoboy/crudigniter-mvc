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
    <title>CRUD - Pilihan Ubah</title>
    <?php include '/../assetCss.php';?>
    <!-- plugin CSS Select2 -->
    <link href="<?php echo base_url() ?>/vendor/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/vendor/select2/dist/select2-bootstrap.min.css" rel="stylesheet">
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
                        <div class="row mb-2">
                            <div class="form-group" hidden>
                                <label>ID <i class="text-danger">*</i></label>
                                <input type="number" name="id" class="form-control">
                                <?php echo form_error('id')?>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>Jenis Kelamin <i class="text-danger">*</i></label>
                                        <select id="jk" class="form-control" name="jenis_kelamin" required tabindex="1">
                                            <option id="none" value="">Pilih jenis kelamin</option>
                                            <option id="0" value="perempuan">Perempuan</option>
                                            <option id="1" value="laki-laki">Laki-Laki</option>
                                        </select>
                                        <span class="small text-danger">
                                            <?php echo form_error('jenis_kelamin')?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive col-lg-4">
                                <div class="panel-body mt-2">
                                    <div class="form-group">
                                        <label>Hobi <i class="text-danger">*</i></label>
                                        <select multiple class="form-control" name="hobi[]" id="hb" required tabindex="2">
                                            <option value="membaca">Membaca</option>
                                            <option value="menulis">Menulis</option>
                                            <option value="melukis">Melukis</option>
                                            <option value="menyanyi">Menyanyi</option>
                                        </select>
                                        <span class="small text-danger">
                                            <?php echo form_error('hobi[]')?>
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
    <!-- plugin Select2 -->
    <script src="<?php echo base_url() ?>/vendor/select2/dist/js/select2.min.js"></script>
</body>
</html>

<script type="text/javascript">
$(document).ready(function()
{
    $("#hb").select2(
    {
        theme: 'bootstrap',
        placeholder: 'Pilih hobi',
        allowClear: false,
        width: '100%'
    });
});
</script>

<?php
if(is_array($plh) || is_object($plh))
{
    foreach($plh as $er)
    {
        ?>
        <script>
        $("input[name='id']").val("<?php echo $er['id']?>");
        var hobi = "<?php echo $er['hobi']?>";
        $.each(hobi.split(","),function(i,e)
        {
            $("#hb option[value='"+e+"']").attr("selected",true);
        });
        </script>
        <?php
        if($er['jenis_kelamin'] == 'perempuan')
        {
            ?>
            <script>
            $('option#0').attr('selected',true);
            </script>
            <?php
        }
        elseif($er['jenis_kelamin'] == "laki-laki")
        {
            ?>
            <script type="text/javascript">
            $('option#1').attr('selected',true);
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            $('option#none').attr('selected',true);
            </script>
            <?php
        }
    }
}
?>