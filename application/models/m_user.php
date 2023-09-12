<?php

class M_user extends CI_Model
{

    public function get_all_pegawai()
    {
        $hasil = $this->db->query('SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 1 ORDER BY user.username ASC');
        return $hasil;
    }

    public function count_all_pegawai()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 1');
        return $hasil;
    }

    public function count_all_admin()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user
        WHERE id_user_level = 2');
        return $hasil;
    }

    public function get_all_admin()
    {
        $hasil = $this->db->query('SELECT * FROM user
        WHERE id_user_level = 2');
        return $hasil;
    }

    public function get_pegawai_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        WHERE user.id_user='$id_user'");
        return $hasil;
    }

    public function cek_login($username)
    {
        
        $hasil=$this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE username='$username'");
        return $hasil;
        
    }

    public function pendaftaran_user($id, $username, $email, $password, $id_user_level)
    {
       $this->db->trans_start();

       $this->db->query("INSERT INTO user(id_user,username,password,email,id_user_level, id_user_detail) VALUES ('$id','$username','$password','$email','$id_user_level','$id')");
       $this->db->query("INSERT INTO user_detail(id_user_detail) VALUES ('$id')");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat, $nip, $pangkat, $jabatan)
    {
       $this->db->trans_start();

       
       $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin' ,no_telp='$no_telp', alamat='$alamat', nip='$nip', pangkat='$pangkat', jabatan='$jabatan' WHERE id_user_detail='$id'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function insert_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat)
    {
       $this->db->trans_start();

       $this->db->query("INSERT INTO user(id_user,username,password,email,id_user_level, id_user_detail) VALUES ('$id','$username','$password','$email','$id_user_level','$id')");
       $this->db->query("INSERT INTO user_detail(id_user_detail, nama_lengkap, id_jenis_kelamin, no_telp, alamat) VALUES ('$id','$nama_lengkap','$id_jenis_kelamin','$no_telp','$alamat')");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat)
    {
       $this->db->trans_start();

       $this->db->query("UPDATE user SET username='$username', password='$password', email='$email', id_user_level='$id_user_level' WHERE id_user='$id'");
       $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin' ,no_telp='$no_telp', alamat='$alamat' WHERE id_user_detail='$id'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_pegawai($id)
    {
       $this->db->trans_start();

       $this->db->query("DELETE FROM user WHERE id_user='$id'");
       $this->db->query("DELETE FROM user_detail WHERE id_user_detail='$id'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_user($id, $username, $password)
    {
       $this->db->trans_start();

       $this->db->query("UPDATE user SET username='$username', password='$password' WHERE id_user='$id'");
      
       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    

    public function delete_admin($id)
    {
       $this->db->trans_start();

       $this->db->query("DELETE FROM user WHERE id_user='$id'");
       $this->db->query("DELETE FROM user_detail WHERE id_user_detail='$id'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

}