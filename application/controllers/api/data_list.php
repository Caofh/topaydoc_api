<?php
class Data_list extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('content');

        date_default_timezone_set('PRC'); // 将区时设为北京时区
    }


    // 查询首页文章列表
    public function index(){

        // 处理传参
        $type = isset($_GET['type']) && $_GET['type'] !== '' ? $_GET['type'] : null; // 选填

        $param = [
            'type' => $type
        ];

        $query = $this->content->get_list($param);

        $data = [
            'data' => $query,
            'total' => count($query)
        ];

        $out_data = out_format($data);

        renderJson($out_data);

    }

    // 删除文章接口
    public function delete_data ()
    {

        $id = isset($_POST['id']) && $_POST['id'] !== '' ? $_POST['id'] : null; // 必填

        $mark = via_param([$id]);

        if ($mark) {
            $param = [
                'id' => $id
            ];

            $query = $this->content->delete_data($param);

            $out_data = out_format(null, '删除成功');

        } else {
            $out_data = out_format(null, '参数id有误', 'fail');
        }

        renderJson($out_data);

    }

    // 增加文章接口
    public function add_data ()
    {

        $name = filter('name', 'post'); // 必填
        $complete = filter('complete', 'post', 'int'); // 必填
        $type = filter('type', 'post', 'int'); // 必填
        $content_uri = filter('content_uri', 'post');
        $content_url = filter('content_url', 'post');
        $logo_uri = filter('logo_uri', 'post');
        $logo_url = filter('logo_url', 'post');
        $create_time = date("y-m-d H:i:s");;
        $update_time = date("y-m-d H:i:s");;
        $bg_color = filter('bg_color', 'post');

        $mark = via_param([$name, $complete, $type]);

        if ($mark) {
            $param = [
                'name' => $name,
                'content_uri' => $content_uri,
                'content_url' => $content_url,
                'logo_uri' => $logo_uri,
                'logo_url' => $logo_url,
                'create_time' => $create_time,
                'update_time' => $update_time,
                'bg_color' => $bg_color,
                'complete' => $complete,
                'type' => $type
            ];

            $query = $this->content->add_data($param);

            $out_data = out_format(null, '操作成功');

        } else {
            $out_data = out_format(null, '参数有误', 'fail');
        }

        renderJson($out_data);

    }

    // 更新文章信息
    public function update_data ()
    {

        $id = filter('id', 'post', 'int'); // 必填
        $name = filter('name', 'post');
        $content_uri = filter('content_uri', 'post');
        $content_url = filter('content_url', 'post');
        $logo_uri = filter('logo_uri', 'post');
        $logo_url = filter('logo_url', 'post');
        $bg_color = filter('bg_color', 'post');
        $complete = filter('complete', 'post', 'int'); // 必填
        $type = filter('type', 'post', 'int'); // 必填
        //        $create_time = filter('create_time', 'post');
        $update_time = date("y-m-d H:i:s");

        $mark = via_param([$id, $complete, $type]);

        if ($mark) {
            $param = [
                'id' => $id,
                'name' => $name,
                'content_uri' => $content_uri,
                'content_url' => $content_url,
                'logo_uri' => $logo_uri,
                'logo_url' => $logo_url,
//                'create_time' => $create_time,
                'update_time' => $update_time,
                'bg_color' => $bg_color,
                'complete' => $complete,
                'type' => $type
            ];

            $query = $this->content->update_data($param);

            $out_data = out_format(null, '更新成功');
        } else {
            $out_data = out_format(null, '参数有误', 'fail');
        }

        renderJson($out_data);

    }


}
?>