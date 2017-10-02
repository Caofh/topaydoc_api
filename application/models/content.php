<?php
class Content extends CI_Model{

    function __construct ()
    {
        parent::__construct();
    }

    public function get_last_ten_entries($param = [])
    {

        $type = $param['type'];

        if (isset($type)) {
            $query = $this->db->query('select * from self_library where type='.$type);
        } else {
            $query = $this->db->query('select * from self_library');
        }

        return $query->result();
    }
}
?>