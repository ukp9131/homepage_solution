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

$id = $ukp->input_request("id");
$pw = "*" . hash("sha256", $ukp->input_request("pw"));
$nickname = $ukp->input_request("nickname");
$name = $ukp->input_request("name");
$birthday = $ukp->input_request("birthday");
$gender = $ukp->input_request("gender");

$row_arr = array(
    "id" => $id,
    "pw" => $pw,
    "nickname" => $nickname,
    "name" => $name,
    "birthday" => $birthday,
    "gender" => $gender
);
$where_arr = array(
    "id" => $id,
    "nickname" => $nickname
);
$member_idx = $ukp->solution_insert("member", $row_arr, $where_arr);

if($member_idx > 0) {
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

if($result["id"] == $id) {
    echo "2";
} else {
    echo "3";
}