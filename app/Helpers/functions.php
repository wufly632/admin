<?php
/**
 * Author: fei.wu
 * Date: 2018/8/30
 * Time: 下午10:01
 */

/**
 * 添加css文件
 * @param unknown $dirname
 * @param unknown $file_name
 */
function css($dirname, $file_name, $version=1.0)
{
    $url = env('SKINS_URL', 'http://skins.cucoe.com');
    echo '<link rel="stylesheet" type="text/css" href="'.$url.'/'.$dirname.'/css/'.$file_name.'.css?v='.$version.'"/>';
}


/**
 * 添加js文件
 * @param unknown $dirname
 * @param unknown $file_name
 */
function js($dirname, $file_name, $version=1.0)
{
    $url = env('SKINS_URL', 'http://skins.cucoe.com');
    echo '<script type="text/javascript" src="'.$url.'/'.$dirname.'/js/'.$file_name.'.js?v='.$version.'"></script>';
}