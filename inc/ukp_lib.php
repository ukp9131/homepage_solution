<?php

/*
 * 라이브러리 버전별 세팅
 */


$dir = dirname(__FILE__);
if (version_compare(phpversion(), '8.0.0', '>=')) {
    require_once "{$dir}/../vendor/autoload.php";
    eval('$phpexcel = new PhpOffice\\PhpSpreadsheet\\Spreadsheet();');
    eval('$phpmailer = new PHPMailer\\PHPMailer\\PHPMailer();');
} else {
    require_once "{$dir}/phpexcel/PHPExcel.php";
    require_once "{$dir}/phpmailer/class.phpmailer.php";
    require_once "{$dir}/phpmailer/class.smtp.php";
    $phpexcel = new PHPExcel();
    $phpmailer = new PHPMailer();
}
$ukp_lib = array(
    "phpmailer" => $phpmailer,
    "phpexcel" => $phpexcel
);