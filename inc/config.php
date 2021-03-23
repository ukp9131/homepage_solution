<?php

/**
 * config 추가될때 마다 멤버변수에 추가<br>
 * config 연관배열명 = 멤버변수명<br>
 * 추가되는 config 연관배열명 접두어는 common 고정
 * 
 * @author ukp
 * @version 2021.03.12
 */

$config["character_set"] = "utf-8";         //서버 케릭터셋(utf-8, euc-kr)
$config["time_zone"] = "Asia/Seoul";        //타임존 설정
$config["error_log_save_bool"] = true;      //에러로그저장여부
$config["session_limit_time"] = 0;          //세션 만기시간(초), 0인경우 기본설정 따름, 설정시 임시파일 저장경로에 세션파일 저장

$config["db"] = array(                      //db접속정보
    "default" => array(                     //default가 기본 db
        "host" => "localhost",              //호스트
        "user" => "ukp9131",                //아이디
        "password" => "ukp.kr47",           //비밀번호
        "database" => "ukp9131",            //DB명
        "port" => "3306",                   //포트번호
        "character_set" => "utf8",          //케릭터셋(utf8mb4, utf8, euckr)
        "time_zone" => "+09:00",            //타임존(+09:00 = 한국시간)
        "prefix" => "ukp_"                  //테이블 접두어(쿼리실행시 테이블에 접두어 추가)
    )
);

$config["common_log_dir"] = dirname(__FILE__) . "/../log";      //로그 저장경로
$config["common_log_expiration_date"] = 7;                      //로그 만기일

$config["common_temp_dir"] = dirname(__FILE__) . "/../temp";    //임시파일 저장경로
$config["common_temp_expiration_date"] = 7;                     //임시파일 만기일

/****************************** 기본설정 유지 ************************************/

$config["common_aes_key"] = md5("0000");                                                                                                                            //aes 암호화 키
$config["common_user_agent"] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36";   //크롤링용 User-Agent

$config["common_keyin_paynuri_crypto"] = "";            //페이누리 암호화 키
$config["common_keyin_welcome_api_key"] = "";           //웰컴페이 API키
$config["common_keyin_welcome_iv"] = "";                //웰컴페이 IV값

$config["common_onesignal_app_id"] = "";                //원시그널 아이디

$config["common_godata_weather"] = "";                  //공공데이터포털 날씨
$config["common_godata_holiday"] = "";                  //공공데이터포털 휴일

$config["common_kakao_redirect_url"] = "";              //카카오 redirect url
$config["common_kakao_rest_api"] = "";                  //카카오 REST API 키(로그인, 카카오맵)
$config["common_kakao_client_secret"] = "";             //카카오 client secret
$config["common_naver_redirect_url"] = "";              //네이버 redirect url
$config["common_naver_client_id"] = "";                 //네이버 client id
$config["common_naver_client_secret"] = "";             //네이버 client secret
$config["common_facebook_redirect_url"] = "";           //페이스북 redirect url
$config["common_facebook_client_id"] = "";              //페이스북 client id
$config["common_facebook_client_secret"] = "";          //페이스북 client secret
$config["common_google_redirect_url"] = "";             //구글 redirect url
$config["common_google_client_id"] = "";                //구글 client id
$config["common_google_client_secret"] = "";            //구글 client secret
$config["common_pass_redirect_url"] = "";               //PASS redirect url
$config["common_pass_client_id"] = "";                  //PASS client id
$config["common_pass_client_secret"] = "";              //PASS client secret
$config["common_apple_redirect_url"] = "";              //애플 redirect url
$config["common_apple_identifier"] = "";                //애플 identifier(service id)
$config["common_apple_key_id"] = "";                    //애플 key id(key)
$config["common_apple_team_id"] = "";                   //애플 team id
$config["common_apple_private_key_file"] = "";          //애플 private key file

$config["common_shop_smartstore_access_license"] = "";  //스마트스토어 라이센스
$config["common_shop_smartstore_secret_key"] = "";      //스마트스토어 비밀키
$config["common_shop_smartstore_iv"] = "";              //스마트스토어 IV

/****************************** 기본설정 유지 ************************************/