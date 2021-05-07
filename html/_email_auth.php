<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
$ukp = new Ukp();

$auth_code = $ukp->input_request("auth_code");
$session_auth_code = $ukp->session_get("auth_code");
$session_auth_email = $ukp->session_get("auth_email");

if ($session_auth_email == "") {
    echo "3";
    return;
}

$ukp->common_log_message("{$auth_code} {$session_auth_code}", "error");
if ($auth_code != $session_auth_code) {
    $ukp->session_unset("auth_code");
    $ukp->session_unset("auth_email");
    $ukp->session_unset("auth_flag");
    echo "2";
    return;
}
$ukp->session_set("auth_flag", "y");
echo "1";
