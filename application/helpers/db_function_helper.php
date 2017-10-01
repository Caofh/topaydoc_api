<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 获取完整的图片路径，又拍云CDN
 * @param string $img_uri 绝对、相对路径
 * @param string $size [optional] 可选缩率图大小，默认原图
 * @return string 完整的缩率图路径
 */
function out_format ($data = [], $msg = '', $mark = 'success')
{
    $data_new = [];

    $data_new['original'] = $data;

    date_default_timezone_set('PRC');
    $date = date("y-m-d h:i:s");

    $data_new['original']['update_time'] = $date;
    $data_new['original']['msg'] = $msg;
    $data_new['original']['status'] = $mark;

    return $data_new;
}