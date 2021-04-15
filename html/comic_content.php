<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
$ukp = new Ukp();

$comic_idx = intval($ukp->input_request("comic_idx"));

$date = date("Y-m-d");
$cookie_key = "ukp__comic_{$comic_idx}_{$date}";
if(!isset($_COOKIE[$cookie_key])) {
    $row_arr = array(
        "view_cnt is" => "view_cnt + 1"
    );
    $where_arr = array(
        "comic_idx" => $comic_idx
    );
    $ukp->solution_update("comic", $row_arr, $where_arr);
    setcookie($cookie_key, "1", time() + 86400, "/");
}
$data["comic"] = $ukp->solution_table_info("comic", $comic_idx);
$data["comic_dir"] = "https://manga.unknownpops.com/uploads/{$data["comic"]["comic_idx"]}";

//remap
$ukp->solution_connect_log();
$data["remap_code"] = $ukp->solution_get_code();
$data["remap_dir"] = dirname(__FILE__);
$data["remap_base"] = basename(__FILE__);
$data["remap_member_idx"] = $ukp->session_get("member_idx");
$data["remap_header_bool"] = true;
if($data["remap_header_bool"]) {
    $data["remap_category"] = $ukp->solution_category_list();
}
$data["remap_footer_bool"] = true;

$data["remap_url"] = ($ukp->common_is_https() ? "https://" : "http://") . "{$ukp->input_server("http_host")}/{$ukp->input_server("request_uri")}";
//article(게시글정보) 또는 website(홈페이지정보)
$data["remap_type"] = "article";
//게시글제목
$data["remap_title"] = "[{$data["comic"]["author"]}] {$data["comic"]["title"]}";
//게시글내용
$data["remap_content"] = "";
//게시글썸네일
$data["remap_article_image"] = "{$data["comic_dir"]}/1.jpg";
//게시글태그
$data["remap_article_tag"] = "{$data["comic"]["title"]},{$data["comic"]["author"]}";
//게시글카테고리
$data["remap_article_section"] = $data["comic"]["category_title"];
//게시글작성일(YYYY-mm-dd HH:ii:ss)
$data["remap_article_published_time"] = "{$data["comic"]["insert_date"]} {$data["comic"]["insert_time"]}";
//게시글수정일(YYYY-mm-dd HH:ii:ss)
$data["remap_article_modified_time"] = "{$data["comic"]["insert_date"]} {$data["comic"]["insert_time"]}";

$db_field = $ukp->common_get_field("db_info");
$data["remap_time_zone"] = $db_field["default"]["time_zone"];
require_once "{$data["remap_dir"]}/_view/_remap.php";