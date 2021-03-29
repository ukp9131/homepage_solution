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

$file_idx = intval($ukp->input_request("file_idx"));
$result = $ukp->solution_table_info("file", $file_idx);
if(file_exists($result["server_path"])) {
    unlink($result["server_path"]);
}
$ukp->solution_delete("file", array("file_idx" => $file_idx));

echo "1";