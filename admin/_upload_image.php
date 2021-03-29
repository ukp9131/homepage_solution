<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
$ukp = new Ukp();

$ukp->solution_session_check("1", false);
$code = $ukp->solution_get_code();
$file = $ukp->input_file("file");
$path = "{$dir}/../public/upload/image";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$ukp->input_file_upload("file", $path, array("jpg", "jpeg", "png", "gif"), true);
$file_info = $ukp->input_file_upload_info();
if ($file_info["code"] != "1") {
    echo "";
    return;
}
$server_path = "{$file_info["src"]}/{$file_info["full_name"]}";
$web_path = "{$code["public_url"]}/upload/image/{$file_info["full_name"]}";
$row_arr = array(
    "origin_name" => $file["name"],
    "server_path" => $server_path,
    "web_path" => $web_path,
    "size" => $file["size"]
);
$ukp->solution_insert("image", $row_arr);

echo $web_path;
