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

$parent_category_idx = intval($ukp->input_request("parent_category_idx")) == "0" ? "null" : intval($ukp->input_request("parent_category_idx"));
$file_name = trim($ukp->input_request("file_name"));
$manager_file_name = $ukp->input_request("manager_file_name");
$title = $ukp->input_request("title");
$sort = intval($ukp->input_request("sort"));

$row_arr = array(
    "parent_category_idx is" => $parent_category_idx,
    "file_name" => $file_name,
    "manager_file_name" => $manager_file_name,
    "title" => $title,
    "sort" => $sort
);
$ukp->solution_insert("category", $row_arr);

echo "1";