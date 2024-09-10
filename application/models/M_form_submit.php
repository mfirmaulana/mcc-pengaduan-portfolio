<?php

class M_form_submit extends CI_Model {

    public function submitForm($data){
        $this->db->insert('form_pengaduan', $data);
    }

}

?>