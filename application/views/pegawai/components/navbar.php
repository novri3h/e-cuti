<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a type="button" href="#" class="dropdown-item dropdown-footer" data-toggle="modal"
                    data-target="#exampleModal">Lengkapi Data</a>
                <a href="<?= base_url();?>Login/log_out" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                                            $id = 0;
                                            foreach($pegawai_data as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $username = $i['username'];
                                            $password = $i['password'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                            $email = $i['email'];
                                            $nip = $i['nip'];
                                            $pangkat = $i['pangkat'];
                                            $jabatan = $i['jabatan'];
                                            $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                            $no_telp = $i['no_telp'];
                                            $alamat = $i['alamat'];

                                            ?>
                <form action="<?= base_url();?>Settings/lengkapi_data" method="POST">
                    <input type="text" value="<?=$this->session->userdata('id_user');?>" name="id" hidden>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            aria-describedby="nama_lengkap" value="<?=$nama_lengkap?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                            <?php foreach($jenis_kelamin as $u)
                                                                :
                                                                $id = $u["id_jenis_kelamin"];
                                                                $jenis_kelamin = $u["jenis_kelamin"];
                                                                ?>
                            <option value="<?= $id ?>" <?php if($id == $id_jenis_kelamin){
                                                                            echo 'selected';
                                                                        }else{
                                                                            echo '';
                                                                        }?>><?= $jenis_kelamin ?></option>

                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No HP</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?=$no_telp?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" aria-describedby="nip" value="<?=$nip?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pangkat">Pangkat</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat" aria-describedby="pangkat" value="<?=$pangkat?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" aria-describedby="jabatan" value="<?=$jabatan?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?=$alamat?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>