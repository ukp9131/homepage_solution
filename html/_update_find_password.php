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
$name = $ukp->input_request("name");
$birthday = $ukp->input_request("birthday");
$gender = $ukp->input_request("gender");

$session_auth_flag = $ukp->session_get("auth_flag");
$session_auth_email = $ukp->session_get("auth_email");
if($session_auth_flag != "y" || $session_auth_email != $id) {
    echo "2";
    return;
}
$row_arr = array(
    "pw" => $pw
);
$where_arr = array(
    "id" => $id,
    "name" => $name,
    "birthday" => $birthday,
    "gender" => $gender,
);
$affected_rows = $ukp->solution_update("member", $row_arr, $where_arr, true);
if($affected_rows > 0) {
    echo "1";
} else {
    echo "3";
}