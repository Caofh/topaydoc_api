<?php
class Self_library extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }


    public function index(){

        // 处理传参
        $type = isset($_GET['type']) && $_GET['type'] !== '' ? $_GET['type'] : null;

        $param = [
          'type' => $type
        ];

        $this->load->model('content');
        $query = $this->content->get_last_ten_entries($param);

        $data = [
          'data' => $query,
          'total' => count($query)
        ];

        $out_data = out_format($data);

        renderJson($out_data);

    }



}
?>