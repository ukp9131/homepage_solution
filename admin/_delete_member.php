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

$member_idx = intval($ukp->input_request("member_idx"));

$ukp->solution_delete("member", array("member_idx" => $member_idx));

echo "1";