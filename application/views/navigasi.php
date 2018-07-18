    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="<?php echo base_url()?>"><b>CRUD MVC</b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" hidden>
                    <a class="nav-link text-right text-white" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>

                <li class="nav-item" id="dashboard" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="<?php echo base_url()?>">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item" id="idAuto" data-toggle="tooltip" data-placement="right" title="ID Auto">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/idauto/tampil">
                        <i class="fa fa-fw fa-key"></i>
                        <span class="nav-link-text">ID Auto</span>
                    </a>
                </li>

                <li class="nav-item" id="tanggal" data-toggle="tooltip" data-placement="right" title="Tanggal">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/tanggal/tampil">
                        <i class="fa fa-fw fa-calendar"></i>
                        <span class="nav-link-text">Tanggal</span>
                    </a>
                </li>

                <li class="nav-item" id="pilihan" data-toggle="tooltip" data-placement="right" title="Pilihan">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/pilihan/tampil">
                        <i class="fa fa-fw fa-check-square"></i>
                        <span class="nav-link-text">Pilihan</span>
                    </a>
                </li>

                <li class="nav-item" id="gambar" data-toggle="tooltip" data-placement="right" title="Gambar">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/gambar/tampil">
                        <i class="fa fa-fw fa-image"></i>
                        <span class="nav-link-text">Gambar</span>
                    </a>
                </li>

                <li class="nav-item" id="artikel" data-toggle="tooltip" data-placement="right" title="Artikel">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/artikel/tampil">
                        <i class="fa fa-fw fa-newspaper-o"></i>
                        <span class="nav-link-text">Artikel</span>
                    </a>
                </li>

                <li class="nav-item" id="file" data-toggle="tooltip" data-placement="right" title="File">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/file/tampil">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">File</span>
                    </a>
                </li>

                <li class="nav-item" id="other" data-toggle="tooltip" data-placement="right" title="Other">
                    <a class="nav-link" href="<?php echo base_url()?>index.php/other/tampil">
                        <i class="fa fa-fw fa-folder"></i>
                        <span class="nav-link-text">Other</span>
                    </a>
                </li>
            </ul>
            
        </div>
    </nav>