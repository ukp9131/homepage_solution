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

$category_idx = intval($ukp->input_request("category_idx"));

$ukp->solution_delete("category", array("category_idx" => $category_idx));

echo "1";