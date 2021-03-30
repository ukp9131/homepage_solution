<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
$ukp = new Ukp();

$ukp->solution_session_check("1", true);

$page = intval($ukp->input_request("page"));
$limit = 10;

$where_arr = array();
$limit_arr = array(
    "start" => $page,
    "limit" => $limit
);
$data["info"] = $ukp->solution_table_cnt("comment", $where_arr);
$data["list"] = $ukp->solution_table_list("comment", $where_arr, $limit_arr);
$data["pagination"] = $ukp->common_pagination($data["info"]["cnt"], $limit, "page", 5);

//remap
$data["remap_code"] = $ukp->solution_get_code();
$data["remap_dir"] = dirname(__FILE__);
$data["remap_base"] = basename(__FILE__);
$data["remap_header_bool"] = true;
if($data["remap_header_bool"]) {
    $data["remap_admin_info"] = $ukp->solution_table_info("admin", $ukp->session_get("admin_idx"));
}
$data["remap_header_text"] = "댓글관리";
$data["remap_footer_bool"] = true;

$data["remap_url"] = ($ukp->common_is_https() ? "https://" : "http://") . "{$ukp->input_server("http_host")}/{$ukp->input_server("request_uri")}";
//article(게시글정보) 또는 website(홈페이지정보)
$data["remap_type"] = "website";
//게시글제목
$data["remap_title"] = "";
//게시글내용
$data["remap_content"] = "";
//게시글썸네일
$data["remap_article_image"] = "";
//게시글태그
$data["remap_article_tag"] = "";
//게시글카테고리
$data["remap_article_section"] = "";
//게시글작성일(YYYY-mm-dd HH:ii:ss)
$data["remap_article_published_time"] = "";
//게시글수정일(YYYY-mm-dd HH:ii:ss)
$data["remap_article_modified_time"] = "";

$db_field = $ukp->common_get_field("db_info");
$data["remap_time_zone"] = $db_field["default"]["time_zone"];
require_once "{$data["remap_dir"]}/_view/_remap.php";