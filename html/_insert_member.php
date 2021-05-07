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
$nickname = $ukp->input_request("nickname");
$name = $ukp->input_request("name");
$birthday = $ukp->input_request("birthday");
$gender = $ukp->input_request("gender");

$session_auth_flag = $ukp->session_get("auth_flag");
$session_auth_email = $ukp->session_get("auth_email");
if($session_auth_flag != "y" || $session_auth_email != $id) {
    echo "4";
    return;
}

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
$member_idx = $ukp->solution_insert("member", $row_arr, $where_arr, true);
if($member_idx > 0) {
    echo "1";
    return;
}

$where_arr = array(
    "m.nickname" => $nickname
);
$result = $ukp->solution_table_cnt("member", $where_arr, false);
if($result["cnt"] > 0) {
    echo "3";
    return;
}
echo "4";
return;