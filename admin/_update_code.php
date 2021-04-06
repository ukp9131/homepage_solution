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

$code_idx = intval($ukp->input_request("code_idx"));
$title = trim(strtolower($ukp->input_request("title")));
$content = $ukp->input_request("content");
$description = $ukp->input_request("description");

//코드정보
$result = $ukp->solution_table_info("code", array("code_idx" => $code_idx));

if ($result["core_flag"] == "y") {
    $row_arr = array(
        "content" => $content
    );
    $where_arr = array(
        "code_idx" => $code_idx
    );
    $ukp->solution_update("code", $row_arr, $where_arr);
    echo "1";
    return;
}
$row_arr = array(
    "title" => $title,
    "content" => $content,
    "description" => $description
);
$where_arr = array(
    "code_idx" => $code_idx
);
$add_arr = array(
    "title" => $title
);
$affected_rows = $ukp->solution_update("code", $row_arr, $where_arr, false, "code_idx", $add_arr);
if($affected_rows > 0) {
    echo "1";
    return;
}
$where_arr = array(
    "title" => $title
);
$sql = "
    select
        count(*) as `cnt`
    from
        `code` as `c2`
    where
        `c2`.`title` = ?
";
$binding = array(
    $title
);
$result = $ukp->db_row_array($sql, $binding);
if($result["cnt"] == "0") {
    echo "1";
} else {
    echo "2";
}