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

$sql = "
    select
        `m`.`member_idx`
    from
        `member` as `m`
    where
        `m`.`id` = ? and
        `m`.`pw` = ? and
        `m`.`delete_flag` = 'n'
";
$binding = array(
    $id,
    $pw
);
$result = $ukp->db_row_array($sql, $binding);

if (isset($result["member_idx"])) {
    $ukp->session_set("member_idx", $result["member_idx"]);
    echo "1";
    return;
}
echo "2";