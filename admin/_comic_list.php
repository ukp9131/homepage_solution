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

$author = $ukp->input_request("author");

$where_arr = array(
    "a2.name" => $author
);
$result = $ukp->solution_table_list("comic", $where_arr);

echo $ukp->common_json_encode(array(
    "code" => "1",
    "list" => $result
));