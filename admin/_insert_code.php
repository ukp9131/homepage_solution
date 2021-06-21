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

$title = trim(strtolower($ukp->input_request("title")));
$content = $ukp->input_request("content");
$description = $ukp->input_request("description");

//트랜젝션처리 안됨
//삭제코드조회
$where_arr = array(
    "c2.title" => $title,
    "delete_flag" => "y"
);
$result = $ukp->solution_table_list("code", $where_arr, array(), array(), false);

if (isset($result[0])) {
    $row_arr = array(
        "title" => $title,
        "content" => $content,
        "description" => $description,
        "delete_flag" => "n"
    );
    $where_arr = array(
        "code_idx" => $result[0]["code_idx"]
    );
    $ukp->solution_update("code", $row_arr, $where_arr);
    echo "1";
    return;
}

//삭제코드조회
$where_arr = array(
    "delete_flag" => "y"
);
$result = $ukp->solution_table_list("code", $where_arr, array(), array(), false);

if (isset($result[0])) {
    $row_arr = array(
        "title" => $title,
        "content" => $content,
        "description" => $description,
        "delete_flag" => "n",
        "insert_date is" => "now()",
        "insert_time is" => "now()"
    );
    $where_arr = array(
        "code_idx" => $result[0]["code_idx"]
    );
    $add_arr = array(
        "title" => $title
    );
    $affected_rows = $ukp->solution_update("code", $row_arr, $where_arr, false, "code_idx", $add_arr);
    if($affected_rows > 0) {
        echo "1";
    } else {
        echo "2";
    }
}
$row_arr = array(
    "title" => $title,
    "content" => $content,
    "description" => $description
);
$where_arr = array(
    "title" => $title
);
$code_idx = $ukp->solution_insert("code", $row_arr, $where_arr);
if($code_idx > 0) {
    echo "1";
} else {
    echo "2";
}
