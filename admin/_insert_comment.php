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
$parent_comment_idx = intval($ukp->input_request("parent_comment_idx")) == "0" ? "null" : intval($ukp->input_request("parent_comment_idx"));
$content = $ukp->common_html_encode($ukp->input_request("content"), false);
$private_flag = $ukp->input_request("private_flag") == "y" ? "y" : "n";

$row_arr = array(
    "parent_comment_idx is" => $parent_comment_idx,
    "board_idx" => $board_idx,
    "content" => $content,
    "private_flag" => $private_flag,
    "admin_flag" => "y"
);
$ukp->solution_insert("comment", $row_arr);

echo "1";