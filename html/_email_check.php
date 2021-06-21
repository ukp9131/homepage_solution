<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/../inc/ukp.php";
require_once "{$dir}/../inc/ukp_lib.php";
$ukp = new Ukp();

$id = $ukp->input_request("id");

$where_arr = array(
    "m.id" => $id
);
$result = $ukp->solution_table_cnt("member", $where_arr, false);
if($result["cnt"] > 0) {
    echo "2";
    return;
}
$code_info = $ukp->solution_get_code();
$auth_code = sprintf("%06d", mt_rand(0, 999999));

$title = "{$code_info["homepage_name"]} 회원가입 인증번호 입니다.";
$content = "[{$auth_code}]<br><br>위 번호를 인증번호란에 입력해주세요.";

//세션생성
$ukp->session_set("auth_email", $id);
$ukp->session_set("auth_code", $auth_code);

$ukp->solution_phpmailer_send($ukp_lib["phpmailer"], $code_info["smtp_google_email"], $code_info["smtp_google_password"], $code_info["homepage_name"], $id, $title, $content);

echo "1";