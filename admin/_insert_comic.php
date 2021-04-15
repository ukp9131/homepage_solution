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

$category_idx = intval($ukp->input_request("category_idx"));
$author = trim(strtolower($ukp->input_request("author")));
$title = trim($ukp->input_request("title"));
$page = $ukp->input_request("page");
$download_url = $ukp->input_request("download_url");

$row_arr = array(
    "name" => $author
);
$where_arr = array(
    "name" => $author
);
$author_idx = $ukp->solution_insert("author", $row_arr, $where_arr);
if ($author_idx == 0) {
    $sql = "
        select
            `a2`.`author_idx`
        from
            `author` as `a2`
        where
            `a2`.`name` = ?
    ";
    $binding = array(
        $author
    );
    $result = $ukp->db_row_array($sql, $binding);
    $author_idx = isset($result["author_idx"]) ? $result["author_idx"] : "0";
}

$row_arr = array(
    "category_idx" => $category_idx,
    "author_idx" => $author_idx,
    "title" => $title,
    "page" => $page,
    "download_url" => $download_url
);
$where_arr = array(
    "author_idx" => $author_idx,
    "title" => $title
);
$comic_idx = $ukp->solution_insert("comic", $row_arr, $where_arr, false);
if($comic_idx > 0) {
    echo "1";
} else {
    echo "2";
}