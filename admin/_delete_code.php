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

$code_idx = intval($ukp->input_request("code_idx"));

$where_arr = array(
    "code_idx" => $code_idx,
    "core_flag" => "n"
);
$ukp->solution_delete("code", $where_arr);

echo "1";