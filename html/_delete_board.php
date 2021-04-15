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
$member_idx = $ukp->session_get("member_idx");

$where_arr = array(
    "board_idx" => $board_idx,
    "member_idx" => $member_idx
);
$ukp->solution_delete("board", $where_arr);
echo "1";