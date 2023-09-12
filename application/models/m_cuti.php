<?php

class M_cuti extends CI_Model
{

    public function get_all_cuti()
    {
        $hasil = $this->db->query('SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail ORDER BY user_detail.nama_lengkap ASC');
        return $hasil;
    }

    public function get_all_cuti_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE cuti.id_user='$id_user'");
        return $hasil;
    }

    public function get_all_cuti_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE cuti.id_user='$id_user' AND cuti.id_status_cuti='2' ORDER BY cuti.tgl_diajukan DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_cuti_by_id_cuti($id_cuti)
    {
        $hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE cuti.id_cuti='$id_cuti'");
        return $hasil;
    }

    public function insert_data_cuti($id_cuti, $id_user, $alasan, $mulai, $berakhir, $id_status_cuti, $perihal_cuti)
    {
        $this->db->trans_start();
        $this->db->query("INSERT INTO cuti(id_cuti,id_user, alasan, tgl_diajukan, mulai, berakhir, id_status_cuti, perihal_cuti) VALUES ('$id_cuti','$id_user','$alasan',NOW(),'$mulai', '$berakhir', '$id_status_cuti', '$perihal_cuti')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_cuti($id_cuti)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM cuti WHERE id_cuti='$id_cuti'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_cuti($alasan, $perihal_cuti, $tgl_diajukan, $mulai, $berakhir, $id_cuti)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE cuti SET alasan='$alasan', perihal_cuti='$perihal_cuti', tgl_diajukan='$tgl_diajukan', mulai='$mulai', berakhir='$berakhir' WHERE id_cuti='$id_cuti'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function confirm_cuti($id_cuti, $id_status_cuti, $alasan_verifikasi)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE cuti SET id_status_cuti='$id_status_cuti', alasan_verifikasi='$alasan_verifikasi' WHERE id_cuti='$id_cuti'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

   
    public function count_all_cuti()
    {
        $hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail');
        return $hasil;
    }

    public function count_all_cuti_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE cuti.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_cuti_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_cuti=2');
        return $hasil;
    }

    public function count_all_cuti_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_cuti=2 AND cuti.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_cuti_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_cuti=1');
        return $hasil;
    }

    public function count_all_cuti_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_cuti=1 AND cuti.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_cuti_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_cuti=3');
        return $hasil;
    }

    public function count_all_cuti_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_cuti=3 AND cuti.id_user='$id_user'");
        return $hasil;
    }


}