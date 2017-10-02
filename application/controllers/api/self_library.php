<?php
class Self_library extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }


    public function index(){

//        var_dump(111);
//        exit;

        $this->load->model('content');
        $query = $this->content->get_last_ten_entries();

        $data = [
          'data' => $query
        ];

        $out_data = out_format($data, '请求成功');

        renderJson($out_data);

    }



}
?>