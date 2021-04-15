<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
$ukp = new Ukp();

$board_idx = intval($ukp->input_request("board_idx"));

$cookie_key = "ukp__board_{$board_idx}_{$date}";
if(!isset($_COOKIE[$cookie_key])) {
    $row_arr = array(
        "view_cnt is" => "view_cnt + 1"
    );
    $where_arr = array(
        "board_idx" => $board_idx
    );
    $ukp->solution_update("board", $row_arr, $where_arr);
    setcookie($cookie_key, "1", time() + 86400, "/");
}
$data["member_idx"] = $ukp->session_get("member_idx");
$data["board"] = $ukp->solution_table_info("board", $board_idx);
$data["comment"] = $ukp->solution_comment_list($board_idx);
$data["comment_cnt"] = $ukp->solution_table_cnt("comment", array("c3.board_idx" => $board_idx));
if($data["board"]["private_flag"] == "n") {
    
} else if($data["board"]["admin_flag"] == "y") {
    echo '<script>alert("비공개 게시물입니다.");history.back();</script>';
    exit;
} else if($data["board"]["member_idx"] == "") {
    
} else if($data["board"]["member_idx"] != $data["member_idx"]) {
    echo '<script>alert("비공개 게시물입니다.");history.back();</script>';
    exit;
}

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
$data["remap_title"] = $data["board"]["title"];
//게시글내용
$data["remap_content"] = mb_substr($data["board"]["content"], 0, 30, "utf-8");
//게시글썸네일
$data["remap_article_image"] = "{$data["remap_code"]["public_url"]}/logo.png";
//게시글태그
$data["remap_article_tag"] = "";
//게시글카테고리
$data["remap_article_section"] = $data["board"]["category_title"];
//게시글작성일(YYYY-mm-dd HH:ii:ss)
$data["remap_article_published_time"] = "{$data["board"]["insert_date"]} {$data["board"]["insert_time"]}";
//게시글수정일(YYYY-mm-dd HH:ii:ss)
$data["remap_article_modified_time"] = "{$data["board"]["update_date"]} {$data["board"]["update_time"]}";

$db_field = $ukp->common_get_field("db_info");
$data["remap_time_zone"] = $db_field["default"]["time_zone"];
require_once "{$data["remap_dir"]}/_view/_remap.php";