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
$admin_idx = $ukp->session_get("admin_idx");

$id = $ukp->input_request("id");
$pw = "*" . hash("sha256", $ukp->input_request("pw"));
$update_id = $ukp->input_request("update_id");
$update_pw = "*" . hash("sha256", $ukp->input_request("update_pw"));

$where_arr = array(
    "`a`.`id`" => $id,
    "`a`.`pw`" => $pw
);
$result = $ukp->solution_table_info("admin", $admin_idx, $where_arr);
if ($result["cnt"] < 1) {
    echo "2";
    return;
}

$row_arr = array(
    "id" => $update_id,
    "pw" => $update_pw
);
$where_arr = array(
    "admin_idx" => $admin_idx
);
$ukp->solution_update("admin", $row_arr, $where_arr);

echo "1";