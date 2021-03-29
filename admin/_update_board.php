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

$board_idx = intval($ukp->input_request("board_idx"));
$title = $ukp->input_request("title");
$content = $ukp->common_html_encode($ukp->input_request("content"));
$private_flag = $ukp->input_request("private_flag") == "y" ? "y" : "n";
$top_flag = $ukp->input_request("top_flag") == "y" ? "y" : "n";

$code = $ukp->solution_get_code();

$row_arr = array(
    "image_idx is" => "null",
    "title" => $title,
    "content" => $content,
    "private_flag" => $private_flag,
    "top_flag" => $top_flag,
    "admin_flag" => "y"
);
$where_arr = array(
    "board_idx" => $board_idx
);
$ukp->solution_update("board", $row_arr, $where_arr, true);

//이미지 검사
$row_arr = array(
    "idx is" => "null",
    "type_flag" => "n"
);
$where_arr = array(
    "idx" => $board_idx,
    "type_flag" => "b"
);
$ukp->solution_update("image", $row_arr, $where_arr);
preg_match_all("/\!\[image\]\((.*?)\)/", $content, $matches);
$in = array();
foreach ($matches[1] as $temp) {
    $sql = "
        select
            `image_idx`
        from
            `image`
        where
            `web_path` = ? and
            `idx` is null and
            `delete_flag` = 'n'
    ";
    $binding = array(
        $temp
    );
    $result = $ukp->db_row_array($sql, $binding);
    if (isset($result["image_idx"])) {
        $in[] = $result["image_idx"];
    }
}
if (count($in) > 0) {
    //썸네일
    $ukp->solution_update("board", array("image_idx" => $in[0]), array("board_idx" => $board_idx));
    $row_arr = array(
        "idx" => $board_idx,
        "type_flag" => "b"
    );
    $where_arr = array(
        "image_idx" => $in
    );
    $ukp->solution_update("image", $row_arr, $where_arr);
}

//파일첨부
$path = "{$dir}/../public/upload/file";
if(!file_exists($path)) {
    mkdir($path, 0777, true);
}
$file = $ukp->input_file("file");
$ukp->input_file_upload("file", $path, array("jpg", "jpeg", "png", "gif", "zip"), true);
$file_info = $ukp->input_file_upload_info();
$server_path = "{$file_info["src"]}/{$file_info["full_name"]}";
$web_path = "{$code["public_url"]}/upload/image/{$file_info["full_name"]}";
if($file_info["code"] == "1") {
    $row_arr = array(
        "board_idx" => $board_idx,
        "origin_name" => $file["name"],
        "server_path" => $server_path,
        "web_path" => $web_path,
        "size" => $file["size"]
    );
    $ukp->solution_insert("file", $row_arr);
}

echo "1";
