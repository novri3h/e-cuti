<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("pegawai/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard | e-CUTI
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $cuti['total_cuti'] ?></h3>

                                    <p>Data Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $cuti_acc['total_cuti'] ?></h3>

                                    <p>Data Cuti Diterima</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $cuti_reject['total_cuti'] ?></h3>

                                    <p>Data Cuti Ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $cuti_confirm['total_cuti'] ?></h3>

                                    <p>Data Cuti Menunggu Konfirmasi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php
                                        // echo var_dump($cuti_pegawai[0]['mulai']);
                                        // echo var_dump($cuti_pegawai[0]['berakhir']);
                                        if ($cuti_pegawai == null) {
                                            echo 'Belum Ada';
                                        } else {
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($cuti_pegawai[0]['berakhir']);
                                            $datediff = $your_date - $now;

                                            $date_akhir = round($datediff / (60 * 60 * 24));



                                            $now = time(); // or your date as well
                                            $your_date = strtotime($cuti_pegawai[0]['mulai']);
                                            $datediff = $now - $your_date;

                                            $date_mulai = round($datediff / (60 * 60 * 24));



                                            if ($date_mulai >= 0 and $date_akhir >= 0) {
                                                echo $date_akhir . ' Hari Lagi';
                                            } else {
                                                echo "Belum Ada";
                                            }
                                        }

                                        ?></h3>

                                    <p>Sisa Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <h1>Syarat Permohonan Cuti</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Tahunan
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Tahunan : 12 Hari Kerja</h5>
                                    <p class="card-text">Aturan cuti ini diberikan untuk KARYAWAN yang setidaknya sudah
                                        bekerja
                                        sekurang-kurangnya 1 tahun secara terus menerus. Dengan lamanya masa cuti adalah
                                        12 hari
                                        kerja.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Besar
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Besar : 3 Bulan</h5>
                                    <p class="card-text">Jenis cuti ini diberikan kepada mereka yang telah mengabdikan
                                        dirinya
                                        sekurang-kurangnya 6 tahun secara terus menerus. Durasi cuti besar yang boleh
                                        diambil
                                        adalah 3 bulan.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Sakit
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Besar : 3 Bulan</h5>
                                    <p class="card-text">Bila KARYAWAN jatuh sakit dan tidak memungkinkan untuk melakukan
                                        pekerjaan,
                                        yang bersangkutan berhak atas cuti sakit. Aturan cuti KARYAWAN yang sakit diberikan 1
                                        hari
                                        atau 2 hari kerja dengan ketentuan bahwa ia harus memberitahukan kepada
                                        atasannya
                                        dan
                                        melampirkan surat keterangan dokter.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Melahirkan
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Melahirkan : 3 Bulan</h5>
                                    <p class="card-text">Untuk persalinan anak yang pertama, kedua, dan ketiga, KARYAWAN
                                        wanita
                                        berhak atas cuti melahirkan. Namun, untuk persalinan anak keempat dan
                                        seterusnya,
                                        diberikan cuti di luar tanggungan negara. Ketentuan lamanya cuti melahirkan
                                        adalah 1
                                        bulan sebelum dan 2 bulan sesudah persalinan. Cuti ini diajukan secara tertulis
                                        dan
                                        selama menjalankan cuti ini, KARYAWAN wanita masih berhak mendapatkan penghasilannya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Alasan Penting
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Alasan Penting : Maksimal 2 bulan</h5>
                                    <p class="card-text">Cuti alasan penting ini diberikan ketika ibu, bapak, istri,
                                        suami,
                                        anak, adik, kakak, mertua, atau menantu yang sedang sakit keras atau meninggal
                                        dunia.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Bersama
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Bersama</h5>
                                    <p class="card-text">Salah satu jenis cuti yang pasti sudah tidak asing lagi. Cuti
                                        bersama
                                        ditetapkan oleh Presiden. Biasanya cuti bersama ada saat perayaan Idulfitri,
                                        Natal
                                        dan
                                        tahun baru. Tentu saja, karena namanya cuti bersama, cuti ini tidak perlu
                                        diajukan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Cuti di Luar Tanggungan Negara
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Cuti di Luar Tanggungan Negara</h5>
                            <p class="card-text">Jenis cuti ini diberikan kepada KARYAWAN yang telah bekerja
                                sekurang-kurangnya 5 tahun secara terus menerus karena alasan-alasan pribadi yang
                                penting dan mendesak dapat diberikan cuti di luar tanggungan perusahaan. Cuti di luar
                                tanggungan perusahaan dapat diberikan paling lama 3 tahun. Jangka waktu cuti di luar
                                tanggungan perusahaan dapat diperpanjang paling lama 1 tahun apabila ada alasan-alasan yang
                                penting untuk memperpanjangnya.
                            </p>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("pegawai/components/js.php") ?>
</body>

</html>
