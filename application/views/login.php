<!DOCTYPE html>
<html lang="en">

<head>
    <title>e-CUTI | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/Logo.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url();?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url();?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/login/css/main.css">
    <!--===============================================================================================-->
    <!-- Sweetalert -->
    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php if($this->session->flashdata('success_log_out')){?>
    <script>
    swal({
        title: "Success!",
        text: "Anda Berhasil Log Out!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Berhasil Terdaftar!",
        text: "Silahkan Anda Login!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if($this->session->flashdata('loggin_err_no_user')){?>
    <script>
    swal({
        title: "Error!",
        text: "Anda Belum Terdaftar!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if($this->session->flashdata('loggin_err_pass')){?>
    <script>
    swal({
        title: "Error!",
        text: "Password Yang Anda Masukan Salah!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if($this->session->flashdata('loggin_err_no_access')){?>
    <script>
    swal({
        title: "Error!",
        text: "Anda Belum Memiliki Akses!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if($this->session->flashdata('loggin_err')){?>
    <script>
    swal({
        title: "Error!",
        text: "Sesi Anda Habis!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url();?>assets/login/images/icon-logo.png" alt="IMG">
                </div>


                <form class="login100-form validate-form" action="<?= base_url();?>Login/proses" method="POST">
                    <span class="login100-form-title">
                        Aplikasi Cuti Pegawai
						<!-- <center><p>Repost by <a href='https://nadhif-studio.co.id/' title='StokCoding.com' target='_blank'>Nadhif Studio</a></p></center> -->
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="<?=base_url();?>Register/index">
                            Buat akun
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url();?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url();?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url();?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url();?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url();?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url();?>assets/login/js/main.js"></script>

</body>

</html>
