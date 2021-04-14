<?php
    $dir = dirname(__FILE__);
    require_once "{$dir}/inc/ukp.php";
    $ukp = new Ukp();
    
    $url = ($ukp->common_is_https() ? "https://" : "http://") . str_replace("//", "/", "{$ukp->input_server("http_host")}/{$ukp->common_php_self()}/html/");
    $ukp->common_301_redirect($url);
    exit;