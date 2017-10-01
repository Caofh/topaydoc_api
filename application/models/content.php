<?php
class Content extends CI_Model{

    function __construct ()
    {
        parent::__construct();
    }

    public function get_last_ten_entries()
    {
//        $this->load->database();
//        $this->db->query("SET NAMES GBK"); //防止中文乱码
//        $query = $this->db->get('self_library');

        $query = $this->db->query('select * from self_library');

        return $query->result();
    }
}
?>