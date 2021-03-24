<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
$ukp = new Ukp();

$id = $ukp->input_request("id");
$pw = "*" . hash("sha256", $ukp->input_request("pw"));
$ukp->common_log_message($pw);
$sql = "
    select
        `admin_idx`
    from
        `admin`
    where
        `id` = ? and
        `pw` = ? and
        `delete_flag` = 'n'
";
$binding = array(
    $id,
    $pw
);
$result = $ukp->db_row_array($sql, $binding);

if(isset($result["admin_idx"])) {
    $ukp->session_set("admin_idx", $result["admin_idx"]);
    echo "1";
    return;
}
echo "2";