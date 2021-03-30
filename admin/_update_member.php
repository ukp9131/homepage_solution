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

$member_idx = intval($ukp->input_request("member_idx"));
$id = $ukp->input_request("id");
$pw = $ukp->input_request("pw") == "" ? "" : "*" . hash("sha256", $ukp->input_request("pw"));
$nickname = $ukp->input_request("nickname");
$name = $ukp->input_request("name");
$birthday = $ukp->input_request("birthday");
$gender = $ukp->input_request("gender");

$row_arr = array(
    "id" => $id,
    "nickname" => $nickname,
    "name" => $name,
    "birthday" => $birthday,
    "gender" => $gender
);
if ($pw != "") {
    $row_arr["pw"] = $pw;
}
$where_arr = array(
    "id" => $id,
    "nickname" => $nickname
);
$affected_rows = $ukp->solution_update("member", $row_arr, array("member_idx" => $member_idx), true, "member_idx", $where_arr, true);

if ($affected_rows > 0) {
    echo "1";
    return;
}

$sql = "
    select
        `m`.`nickname`,
        `m`.`id`
    from
        `member` as `m`
    where
        `m`.`nickname` = ? or
        `m`.`id` = ?
";
$binding = array(
    $nickname,
    $id
);
$result = $ukp->db_row_array($sql, $binding);

if ($result["id"] == $id) {
    echo "2";
} else {
    echo "3";
}