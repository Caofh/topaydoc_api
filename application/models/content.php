<?php
class Content extends CI_Model{

    function __construct ()
    {
        parent::__construct();
    }

    // 数据表文档：https://www.showdoc.cc/tpdoc?page_id=15405988

    // 查询数据表
    public function get_list($param = [])
    {

        $id = $param['id'];
        $type = $param['type'];

        $condition = '';
        if (isset($id) && $id !== '') {
            $condition = ' where id='.$id.'';
            if (isset($type) && $type !== '') {
                $condition = ' where id='.$id.' and type='.$type.'';
            }
        } elseif (isset($type) && $type !== '') {
            $condition = ' where type='.$type.'';
            if (isset($id) && $id !== '') {
                $condition = ' where type='.$type.' and id='.$id.'';
            }
        }

        $query = $this->db->query('select * from self_library'.$condition);

        return $query->result();
    }

    // 删除数据表数据
    public function delete_data($param = [])
    {
        $id = $param['id']; // 文章id

        if (isset($id)) {
            $query = $this->db->query('delete from self_library where id='.$id);
        }

    }

    // 插入数据表数据
    public function add_data ($param = [])
    {

        $name = isset($param['name']) ? toDatabaseStr($param['name']) : 'null';
        $content_uri = isset($param['content_uri']) ? toDatabaseStr($param['content_uri']) : 'null';
        $content_url = isset($param['content_url']) ? toDatabaseStr($param['content_url']) : 'null';
        $logo_uri = isset($param['logo_uri']) ? toDatabaseStr($param['logo_uri']) : 'null';
        $logo_url = isset($param['logo_url']) ? toDatabaseStr($param['logo_url']) : 'null';
        $create_time = isset($param['create_time']) ? toDatabaseStr($param['create_time']) : 'null';
        $update_time = isset($param['update_time']) ? toDatabaseStr($param['update_time']) : 'null';
        $bg_color = isset($param['bg_color']) ? toDatabaseStr($param['bg_color']) : 'null';
        $complete = isset($param['complete']) ? toDatabaseStr($param['complete']) : 'null';
        $type = isset($param['type']) ? toDatabaseStr($param['type']) : 'null';

        $order = 'insert into self_library
        (id,name,content_uri,content_url,logo_uri,logo_url,create_time,update_time,bg_color,complete,type)
        values(null, '.$name.', '.$content_uri.', '.$content_url.', '.$logo_uri.', '.$logo_url.', '.$create_time.'
        , '.$update_time.', '.$bg_color.', '.$complete.', '.$type.')';

        $query = $this->db->query($order);
    }

    // 更新数据表数据
    function update_data ($param = [])
    {

        $id = isset($param['id']) ? $param['id'] : null;
        $name = isset($param['name']) ? toDatabaseStr($param['name']) : 'null';
        $content_uri = isset($param['content_uri']) ? toDatabaseStr($param['content_uri']) : 'null';
        $content_url = isset($param['content_url']) ? toDatabaseStr($param['content_url']) : 'null';
        $logo_uri = isset($param['logo_uri']) ? toDatabaseStr($param['logo_uri']) : 'null';
        $logo_url = isset($param['logo_url']) ? toDatabaseStr($param['logo_url']) : 'null';
//        $create_time = isset($param['create_time']) ? toDatabaseStr($param['create_time']) : 'null';
        $update_time = isset($param['update_time']) ? toDatabaseStr($param['update_time']) : 'null';
        $bg_color = isset($param['bg_color']) ? toDatabaseStr($param['bg_color']) : 'null';
        $complete = isset($param['complete']) ? $param['complete'] : 'null';
        $type = isset($param['type']) ? $param['type'] : 'null';

        if (isset($id)) {
            $order = 'update self_library set 
            name='.$name.',content_uri='.$content_uri.',content_url='.$content_url.',logo_uri='.$logo_uri.'
            ,logo_url='.$logo_url.',update_time='.$update_time.',bg_color='.$bg_color.'
            ,complete='.$complete.',type='.$type.'
            where id='.$id.'';

            $query = $this->db->query($order);
        }
    }


}
?>