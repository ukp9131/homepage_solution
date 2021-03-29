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

$comment_idx = intval($ukp->input_request("comment_idx"));
$content = $ukp->common_html_encode($ukp->input_request("content"), false);
$private_flag = $ukp->input_request("private_flag") == "y" ? "y" : "n";

$row_arr = array(
    "content" => $content,
    "private_flag" => $private_flag
);
$where_arr = array(
    "comment_idx" => $comment_idx
);
$ukp->solution_update("comment", $row_arr, $where_arr, true);

echo "1";