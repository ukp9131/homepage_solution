<?php

/**
 * require config.php (2021.06.03)<br>
 * 프로젝트에 맞게 파일명 및 클래스명 변경해서 사용<br>
 * 접두어가 solution인경우 개발환경에 맞게 사용<br>
 * 
 * @author  ukp
 * @version 2021.07.30
 * @since   PHP 5 >= 5.2.0, PHP 7, PHP 8
 */
class Ukp {

    /**
     * 서버 이름
     * 
     * @version 2021.06.03
     * @var     string
     */
    private $server_name;

    /**
     * 서버 케릭터셋
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $character_set;

    /**
     * 서버 타임존
     * 
     * @version 2020.07.29
     * @var     string
     */
    private $time_zone;

    /**
     * mysqli 접속정보
     * 
     * @version 2020.07.10
     * @var     array
     */
    private $db_info;

    /**
     * mysqli insert_id
     * 
     * @version 2020.07.10
     * @var     int
     */
    private $db_insert_id;

    /**
     * mysqli affected_rows
     * 
     * @version 2020.07.10
     * @var     int
     */
    private $db_affected_rows;

    /**
     * 파일 업로드 상태값<br><br>
     *
     * ["code"] - 업로드 결과코드<br>
     * 0 - 업로드한적 없음<br>
     * 1 - 업로드 성공<br>
     * 2 - 업로드파일 없음<br>
     * 3 - 업로드할 폴더 없음<br>
     * 4 - 허용확장자 없음<br><br>
     *
     * ["name"] - 업로드 파일명<br>
     * ["ext"] - 업로드 파일 확장자<br>
     * ["full_name"] - 확장자 포함 파일명<br>
     * ["src"] - 업로드 경로
     * 
     * @version 2020.02.13
     * @var     array
     */
    private $input_upload_info;

    /**
     * 로그 저장경로
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_log_dir;

    /**
     * 로그 만기일
     * 
     * @version 2020.02.13
     * @var     int
     */
    private $common_log_expiration_date;

    /**
     * 로그 저장경로
     * 
     * @version 2020.12.29
     * @var     string
     */
    private $common_temp_dir;

    /**
     * 로그 만기일
     * 
     * @version 2020.12.29
     * @var     int
     */
    private $common_temp_expiration_date;

    /**
     * aes 암호화키
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_aes_key;

    /**
     * User-Agent(크롤링용)
     * 
     * @version 2020.05.26
     * @var     string
     */
    private $common_user_agent;

    /**
     * 페이누리 암호화키
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_keyin_paynuri_crypto;

    /**
     * 웰컴페이 API키
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_keyin_welcome_api_key;

    /**
     * 웰컴페이 IV값
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_keyin_welcome_iv;

    /**
     * 원시그널 앱아이디
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_onesignal_app_id;

    /**
     * 공공데이터포털 날씨 서비스키
     * 
     * @version 2020.02.13
     * @var     string
     */
    private $common_godata_weather;

    /**
     * 공공데이터포털 휴일 서비스키
     * 
     * @version 2020.09.11
     * @var     string
     */
    private $common_godata_holiday;

    /**
     * 카카오 redirect url
     * 
     * @version 2020.11.06
     * @var     string
     */
    private $common_kakao_redirect_url;

    /**
     * 카카오 REST API 키(로그인, 카카오맵)
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_kakao_rest_api;

    /**
     * 카카오 client secret
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_kakao_client_secret;

    /**
     * 네이버 redirect url
     * 
     * @version 2020.11.06
     * @var     string
     */
    private $common_naver_redirect_url;

    /**
     * 네이버 client id
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_naver_client_id;

    /**
     * 네이버 client secret
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_naver_client_secret;

    /**
     * 페이스북 redirect url
     * 
     * @version 2020.11.06
     * @var     string
     */
    private $common_facebook_redirect_url;

    /**
     * 페이스북 client id
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_facebook_client_id;

    /**
     * 페이스북 client secret
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_facebook_client_secret;

    /**
     * 구글 redirect url
     * 
     * @version 2020.11.06
     * @var     string
     */
    private $common_google_redirect_url;

    /**
     * 구글 client id
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_google_client_id;

    /**
     * 구글 client secret
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_google_client_secret;

    /**
     * PASS redirect url
     * 
     * @version 2020.11.06
     * @var     string
     */
    private $common_pass_redirect_url;

    /**
     * PASS client id
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_pass_client_id;

    /**
     * PASS client secret
     * 
     * @version 2020.11.05
     * @var     string
     */
    private $common_pass_client_secret;

    /**
     * 애플 redirect url
     * 
     * @version 2021.03.05
     * @var     string
     */
    private $common_apple_redirect_url;

    /**
     * 애플 identifier(service id)
     * 
     * @version 2021.03.05
     * @var     string
     */
    private $common_apple_identifier;

    /**
     * 애플 key id(key)
     * 
     * @version 2021.03.05
     * @var     string
     */
    private $common_apple_key_id;

    /**
     * 애플 team id
     * 
     * @version 2021.03.08
     * @var     string
     */
    private $common_apple_team_id;

    /**
     * 애플 private key file
     * 
     * @version 2021.03.08
     * @var     string
     */
    private $common_apple_private_key_file;

    /**
     * 스마트스토어 라이센스
     * 
     * @version 2020.08.26
     * @var     string
     */
    private $common_shop_smartstore_access_license;

    /**
     * 스마트스토어 비밀키
     * 
     * @version 2020.08.26
     * @var     string
     */
    private $common_shop_smartstore_secret_key;

    /**
     * 스마트스토어 IV
     * 
     * @version 2020.09.15
     * @var     string
     */
    private $common_shop_smartstore_iv;

    /**
     * asn1 integer
     * 
     * @version 2021.03.10
     * @var     int
     */
    private $common_asn1_integer;

    /**
     * asn1 sequence
     * 
     * @version 2021.03.10
     * @var     int
     */
    private $common_asn1_sequence;

    /**
     * asn1 bit string
     * 
     * @version 2021.03.10
     * @var     int
     */
    private $common_asn1_bit_string;

    /**
     * 생성자
     * 
     * require  2021.06.21 session_start_check
     * @version 2021.06.21
     * 
     * @param bool $api_bool     true - json, false - html
     * @param bool $session_bool 세션사용여부
     * @param bool $cors_bool    cors 허용여부
     */
    function __construct($api_bool = false, $session_bool = true, $cors_bool = false) {
//에러출력 설정
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
//umask 설정
        umask(0);
//config 호출
        $config = array();
        require dirname(__FILE__) . "/ukp_config.php";
//일반변수 초기화(접두어 common)
        foreach ($config as $k => $v) {
            if (substr($k, 0, 6) != "common") {
                continue;
            }
            $this->{$k} = $v;
        }
//타임존 설정
        $this->time_zone = $config["time_zone"];
        date_default_timezone_set($this->time_zone);
//케릭터셋 설정
        $this->character_set = $config["character_set"];
        if ($api_bool) {
            header("Content-Type: application/json; charset={$this->character_set}");
        } else {
            header("Content-Type: text/html; charset={$this->character_set}");
        }
//cors 설정
        if ($cors_bool) {
            header("Access-Control-Allow-Origin: *");
        }
//에러핸들러 설정
        if ($config["error_log_save_bool"]) {
            set_error_handler(array($this, "custom_error_handler"), E_ALL);
            ini_set("display_errors", 0);
        }
//db 접속정보
        $this->db_info = $config["db"];
        $this->db_insert_id = 0;
        $this->db_affected_rows = 0;
//session_start
        if ($session_bool && !$this->session_start_check()) {
            //세션시간 설정한경우
            if ($config["session_limit_time"] > 0) {
                ini_set("session.save_path", $this->common_temp_dir);
                ini_set("session.gc_maxlifetime", $config["session_limit_time"]);
            }
            session_start();
        }
//파일업로드 코드 설정
        $this->input_upload_info = array(
            "code" => "0",
            "name" => "",
            "ext" => "",
            "full_name" => "",
            "src" => ""
        );
//asn1 세팅
        $this->common_asn1_integer = 0x02;
        $this->common_asn1_sequence = 0x10;
        $this->common_asn1_bit_string = 0x03;
//서버이름 설정
        $this->server_name = $config["server_name"];
    }

    /**
     * 소멸자
     * 
     * require  2020.09.23
     * @version 2020.07.10
     * 
     */
    function __destruct() {
        
    }

    /**
     * 커스텀 에러 핸들러
     * 
     * require  2020.12.16 common_log_message
     * @version 2020.12.16
     *
     * @param  int    $errno   에러번호
     * @param  string $errstr  에러메시지
     * @param  string $errfile 에러파일
     * @param  int    $errline 에러줄
     * @return bool
     */
    function custom_error_handler($errno, $errstr, $errfile, $errline) {
        error_reporting(0);
        $backtrace_arr = debug_backtrace();
        $backtrace = "";
        foreach ($backtrace_arr as $k => $v) {
            if (isset($v["file"]) && isset($v["line"])) {
                $backtrace .= "\n{$v["file"]} Line {$v["line"]}";
            }
        }
        $this->common_log_message("Error: [{$errno}] {$errstr} In {$errfile} Line {$errline}\nBacktrace: {$backtrace}", "error");
        error_reporting(E_ALL);
        return true;
    }

    /**
     * 커스텀 xml요소 추가(common_xml_encode에서 사용)
     * 
     * require  2020.09.23
     * @version 2020.08.26
     *
     * @param SimpleXMLElement $xml SimpleXMLElement 객체
     * @param array            $arr 추가할 배열
     */
    function custom_add_xml_element(&$xml, $arr) {
        foreach ($arr as $k => $v) {
            //요소가 숫자인경우(예외처리)
            if (is_numeric($k)) {
                $k = "item{$k}";
            }
            //자식이 배열인경우
            if (is_array($v)) {
                //리스트형 배열인경우
                if (isset($v[0])) {
                    foreach ($v as $temp) {
                        $this->custom_add_xml_element($xml, array($k => $temp));
                    }
                }
                //객체형 배열인경우
                else {
                    $sub_xml = $xml->addChild($k);
                    $this->custom_add_xml_element($sub_xml, $v);
                }
            }
            //자식이 값인경우
            else {
                $xml->addChild("{$k}", htmlspecialchars("{$v}"));
            }
        }
    }

    /**
     * 로그저장
     * 
     * require  2021.01.07 common_temp_remove
     * @version 2021.01.07
     *
     * @param string $str    로그남길 문자열
     * @param string $prefix 로그파일 접두어
     */
    function common_log_message($str, $prefix = "") {
        $date = date("Y_m_d");
        $time = date("H_i_s");
        if ($prefix != "") {
            $prefix .= "_";
        }
//문자열 예외처리
        $message = print_r($str, true);
        $file = fopen("{$this->common_log_dir}/{$prefix}{$date}.log", "a");
        fwrite($file, "{$date}_{$time} --> {$message}\n");
        fclose($file);
//기한지난 로그 삭제
        $this->common_temp_remove($this->common_log_dir, "log", $this->common_log_expiration_date);
    }

    /**
     * 기간지난 파일 삭제
     * 
     * require  2021.01.07
     * @version 2021.01.07
     *
     * @param  string $dir 폴더명
     * @param  string $ext 확장자(점 생략, 공백인경우 전체삭제)
     * @param  int    $day 기간(일)
     * @return bool        true: 성공, false: 실패
     */
    function common_temp_remove($dir, $ext, $day) {
        //폴더 아닌경우
        if (!is_dir($dir)) {
            return false;
        }
        //폴더열기 실패한경우
        if (($dh = opendir($dir)) == false) {
            return false;
        }
        while (($file = readdir($dh)) !== false) {
            $file_name = "{$dir}/{$file}";
            //폴더는 삭제안함
            if (is_dir($file_name)) {
                continue;
            }
            //파일삭제(기간 지났으면서 확장자 문자열 포함된경우)
            if ((time() - filemtime($file_name)) > (86400 * $day) && ($ext == "" || stristr($file, ".{$ext}"))) {
                unlink($file_name);
            }
        }
        closedir($dh);
    }

    /**
     * 필드값 반환
     * 
     * require  2021.01.12
     * @version 2021.01.12
     *
     * @param  string           $key 필드명
     * @return string|array|int      필드값
     */
    function common_get_field($key) {
        return $this->{$key};
    }

    /**
     * JSON 인코딩
     * 
     * require  2021.02.19
     * @version 2021.02.19
     *
     * @param  array  $arr 배열
     * @return string      JSON형태의 문자열
     */
    function common_json_encode($arr) {
//php 5.4버전 이상인경우
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
//php 5.2, 5.3버전인경우
        } else {
            return preg_replace_callback(
                    '/(\\\u[a-f0-9]+)+/',
                    create_function('$s', 'return reset(json_decode(\'{"s":"\'.$s[0].\'"}\'));'),
                    json_encode($arr)
            );
        }
    }

    /**
     * JSON 디코딩
     * 
     * require  2021.02.19
     * @version 2021.02.19
     *
     * @param  string $json JSON형태의 문자열
     * @return array        배열
     */
    function common_json_decode($json) {
        return json_decode($json, true);
    }

    /**
     * 배열값 반환, stdClass인경우 배열로 변환해서 확인
     * 
     * require  2021.07.26
     * @version 2021.07.26
     *
     * @param  array|object $var        배열 또는 stdClass
     * @param  string       $key        인덱스
     * @param  bool         $array_bool 반환값형태, true - 배열, false - 문자열
     * @return string
     */
    function common_array_value($var, $key, $array_bool = false) {
        if (is_object($var)) {
            //객체 배열 변환
            $var = get_object_vars($var);
        }
        if (isset($var[$key])) {
            if ($array_bool) {
                //배열인경우 문자열이면 0번째 배열에 들어간다.
                return is_array($var[$key]) ? $var[$key] : array($var[$key]);
            } else {
                //문자열인경우 배열이면 빈 문자열이 된다.
                return is_array($var[$key]) ? "" : $var[$key];
            }
        } else if ($array_bool) {
            return array();
        } else {
            return "";
        }
    }

    /**
     * 고유번호 생성
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @return string 문자열 형태이지만 10진수 정수를 반환
     */
    function common_unique_id() {
        $date = date("YmdHis");
        $time = explode(" ", str_replace("0.", "", microtime()));
        return $date . $time[0];
    }

    /**
     * 개행문자, &nbsp; 공백변환
     * 
     * require  2020.09.23
     * @version 2020.07.16
     *
     * @param  string $text 변환할 문자열
     * @return string       변환된 문자열
     */
    function common_nl2space($text) {
        return str_replace(array("&nbsp;", "\r\n", "\r", "\n"), " ", $text);
    }

    /**
     * 배열 치환
     * 
     * require  2020.10.14
     * @version 2020.10.14
     *
     * @param  array  $arr         배열
     * @param  string $arr_key     배열 키
     * @param  bool   $unique_flag true - 값으로, false - 배열로
     * @return array               치환된 배열
     */
    function common_array_change($arr, $arr_key, $unique_flag = true) {
        $return_arr = array();
        if ($unique_flag) {
            foreach ($arr as $temp) {
                $return_arr[$temp[$arr_key]] = $temp;
            }
        } else {
            foreach ($arr as $temp) {
                if (!isset($return_arr[$temp[$arr_key]])) {
                    $return_arr[$temp[$arr_key]] = array();
                }
                $return_arr[$temp[$arr_key]][] = $temp;
            }
        }
        return $return_arr;
    }

    /**
     * https여부 확인, 클라우드플레어인경우도 가능
     * 
     * require  2020.09.23 input_server
     * @version 2020.02.13
     *
     * @return bool
     */
    function common_is_https() {
//클라우드플레어
        if (stristr($this->input_server("http_cf_visitor"), "https")) {
            return true;
        } else if (stristr($this->input_server("http_cf_visitor"), "http")) {
            return false;
        } else if (stristr($this->input_server("https"), "on")) {
            return true;
        }
        return false;
    }

    /**
     * 페이지네이션 생성
     * 
     * require  2021.03.25 input_server input_request
     * @version 2021.03.25
     *
     * @param  int    $total_row    총 데이터 갯수
     * @param  int    $per_page     페이지네이션 1개당 데이터 갯수
     * @param  string $query_string 페이지네이션 쿼리스트링 파라미터
     * @param  int    $num_links    페이지네이션 번호출력 갯수(홀수권장)
     * @return array                ["first_link"] - 가장처음 링크, <br>
     *                              ["last_link"] - 가장끝 링크, <br>
     *                              ["list"][]["link"] - 해당번호 링크, <br>
     *                              ["list"][]["num"] - 해당번호, <br>
     *                              ["list"][]["active_bool"] - 현재번호여부
     */
    function common_pagination($total_row = 0, $per_page = 10, $query_string = "page", $num_links = 3) {
        $base_url = preg_replace("/[?&]{$query_string}=[0-9]+/", "", $this->input_server("request_uri"));
        $current_page = intval($this->input_request($query_string)) / $per_page;
        $total_cnt = 0;
        $pagination["first_link"] = $base_url;
        $pagination["last_link"] = $base_url . (strpos($base_url, "?") === false ? "?" : "&") . "{$query_string}=" . (($total_row - 1) - (($total_row - 1) % $per_page));
        $pagination["list"] = array();
        for ($i = $current_page - intval($num_links / 2); $total_cnt < $num_links && $total_row > ($i * $per_page); $i++) {
            if ($i >= 0) {
                $pagination["list"][] = array(
                    "link" => $base_url . (strpos($base_url, "?") === false ? "?" : "&") . "{$query_string}=" . ($i * $per_page),
                    "num" => $i + 1,
                    "active_bool" => $i == $current_page ? true : false
                );
                $total_cnt++;
            }
        }
        return $pagination;
    }

    /**
     * html encode(&amp; &lt; &gt; &quot;)
     * 
     * require  2021.01.05
     * @version 2021.01.05
     * 
     * @param  string $html               html코드
     * @param  bool   $double_encode_bool 이중변환여부
     * @return string                     인코딩 텍스트
     */
    function common_html_encode($html, $double_encode_bool = true) {
        return htmlspecialchars($html, ENT_COMPAT, null, $double_encode_bool);
    }

    /**
     * html decode(&amp; &lt; &gt; &quot;)
     * 
     * require  2021.01.05
     * @version 2021.01.05
     * 
     * @param  string $text 인코딩 텍스트
     * @return string       html코드
     */
    function common_html_decode($text) {
        return htmlspecialchars_decode($text, ENT_COMPAT);
    }

    /**
     * 모바일 여부 (http://detectmobilebrowsers.com/)
     * 
     * require  2020.09.23 input_server
     * @version 2020.05.18
     *
     * @return bool
     */
    function common_is_mobile() {
        $useragent = $this->input_server("http_user_agent");
        //|android|ipad|playbook|silk 추가됨(태블릿 대응)
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 봇 여부
     * 
     * require  2021.01.11 input_server
     * @version 2021.01.11
     *
     * @return bool
     */
    function common_is_bot() {
        $useragent = $this->input_server("http_user_agent");
        //bot문자열 있는경우 bot
        if (stristr($useragent, "bot")) {
            return true;
        }
        //운영체제 문자열 있는경우 봇 아님
        if (stristr($useragent, "Mozilla/5.0 (Macintosh") || stristr($useragent, "Mozilla/5.0 (Windows") || stristr($useragent, "Mozilla/5.0 (Linux") || stristr($useragent, "Mozilla/5.0 (iPhone")) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 해당월의 일요일시작부터 토요일끝까지 날짜범위 반환<br>
     * ex)2019-05 = 2019-04-28 ~ 2019-06-08 - fix<br>
     * ex)2019-05 = 2019-04-28 ~ 2019-06-01 - unfix
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @param  string $date     (YYYY-mm)
     * @param  bool   $fix_flag 6줄 고정여부
     * @return array            ["start_date"] - 시작일(YYYY-mm-dd), <br>
     *                          ["end_date"] - 종료일(YYYY-mm-dd)
     */
    function common_date_range($date, $fix_flag = true) {
        $start_date = date("Y-m-d", strtotime("{$date}-01"));
        $end_date = date("Y-m-t", strtotime("{$date}-01"));
        $start_week = date("w", strtotime($start_date));
        $end_week = $fix_flag ? (42 - $start_week - date("j", strtotime($end_date))) : (6 - date("w", strtotime($end_date)));
        $temp = array(
            "start_date" => date("Y-m-d", strtotime("{$start_date} -{$start_week} days")),
            "end_date" => date("Y-m-d", strtotime("{$end_date} +{$end_week} days"))
        );
        return $temp;
    }

    /**
     * 301 redirect
     * 
     * require  2021.04.13
     * @version 2021.04.13
     * 
     * @param string $url 이동할 url
     */
    function common_301_redirect($url) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: {$url}");
    }

    /**
     * 쿼리스트링을 제외한 현재 경로
     * 
     * require  2020.09.23 input_server
     * @version 2020.02.13
     *
     * @return string
     */
    function common_php_self() {
        $src = explode("?", $this->input_server("request_uri"));
        return $src[0];
    }

    /**
     * curl 요청<br>
     * 파일첨부인경우 헤더에 Content-Type: multipart/form-data 추가(띄어쓰기, 대소문자 구분)<br>
     * 파일첨부인경우 $post_bool은 true, $query는 배열, 파일은 @ + 파일경로
     * 
     * require  2021.07.25 common_get_content_type, common_unique_id, common_array_value
     * @version 2021.07.25
     *
     * @param  string $url            요청 url
     * @param  string $query          요청 파라미터
     * @param  bool   $post_bool      true - post, false - get
     * @param  array  $header         요청 header
     * @param  string $cookie         요청 cookie
     * @param  bool   $header_bool    true - header+body 출력, false - body만 출력
     * @param  string $custom_request 커스텀 요청, 공백인경우 설정 안함
     * @param  int    $timeout        접속 제한시간
     * @return array                  curl 결과정보<br>
     *                                ["http_code"] - http 상태코드<br>
     *                                ["content"] - 응답결과<br>
     *                                ["redirect_url"] - 리다이렉트url(해당하는경우만)
     */
    function common_curl($url, $query = "", $post_bool = false, $header = array(), $cookie = "", $header_bool = false, $custom_request = "", $timeout = 5) {
        $ch = curl_init();
        if ($post_bool == false && $query != "") {
            $url .= "?{$query}";
        }
        if ($post_bool) {
            //multipart/form-data 검사
            $boundary = "";
            foreach ($header as $k => $v) {
                if ($v == "Content-Type: multipart/form-data") {
                    $boundary = "----{$this->common_unique_id()}";
                    $header[$k] .= "; boundary={$boundary}";
                    break;
                }
            }
            //multipart/form-data인경우
            if ($boundary != "" && is_array($query)) {
                $query_text = "";
                foreach ($query as $k => $v) {
                    $query_text .= "--{$boundary}\nContent-Disposition: form-data; name=\"{$k}\"";
                    //파일확인
                    if (substr($v, 0, 1) == "@" && file_exists(substr($v, 1))) {
                        $file_name = basename($v);
                        $content_type = $this->common_get_content_type($file_name);
                        $query_text .= "; filename=\"{$file_name}\"\nContent-Type: {$content_type}\n\n";
                        $query_text .= file_get_contents(substr($v, 1)) . "\n";
                    } else {
                        $query_text .= "\n\n{$v}\n";
                    }
                }
                $query_text .= "--{$boundary}--";
            } else {
                $query_text = $query;
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_text);
        }
        if ($header_bool) {
            curl_setopt($ch, CURLOPT_HEADER, true);
        } else {
            curl_setopt($ch, CURLOPT_HEADER, false);
        }
        if ($custom_request != "") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $custom_request);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_POST, $post_bool);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $content = curl_exec($ch);
        $get_info = curl_getinfo($ch);
        $http_code = $this->common_array_value($get_info, "http_code");
        $redirect_url = $this->common_array_value($get_info, "redirect_url");
        curl_close($ch);
        return array(
            "http_code" => $http_code,
            "content" => $content,
            "redirect_url" => $redirect_url
        );
    }

    /**
     * 쿼리 보내기
     * 
     * require  2021.01.25
     * @version 2021.01.25
     *
     * @param string $sql
     * @param array  $binding  prepared statement 인경우 사용
     * @param string $database 사용할 db
     */
    function db_query($sql, $binding = array(), $database = "default") {
        //db설정값 존재여부
        if (!isset($this->db_info[$database])) {
            trigger_error("Unknown database '{$database}'");
            exit;
        }
        //db접속(접속 실패시 에러메시지)
        $link = mysqli_connect($this->db_info[$database]["host"], $this->db_info[$database]["user"], $this->db_info[$database]["password"], $this->db_info[$database]["database"], $this->db_info[$database]["port"]);
        //db접속확인
        if (!$link) {
            trigger_error("'{$database}' database connect failed");
            exit;
        }
        //접두어 있는경우 쿼리에 접두어 추가
        if ($this->db_info[$database]["prefix"] != "") {
            $pattern = "/(from(?!\s+dual)|join|insert\s+into|update)(\s+`?)([a-zA-Z_]`?)/i";
            $replacement = '${1}${2}' . $this->db_info[$database]["prefix"] . '${3}';
            $sql = preg_replace($pattern, $replacement, $sql);
        }
        //캐릭터셋, 타임존 설정
        mysqli_query($link, "set names {$this->db_info[$database]["character_set"]}");
        mysqli_query($link, "set time_zone = '{$this->db_info[$database]["time_zone"]}'");
        //바인딩 갯수
        $binding_cnt = count($binding);
        //바인딩 있는경우
        if ($binding_cnt > 0) {
            $stmt = mysqli_prepare($link, $sql);
            //쿼리에러인경우 종료
            $db_error = mysqli_error($link);
            if ($db_error) {
                //쿼리랑 바인딩 일치
                if (substr_count($sql, "?") == count($binding)) {
                    $error_sql = str_replace(array("%", "?"), array("%%", "'%s'"), $sql);
                    $sql_error = call_user_func_array("sprintf", array_merge(array($error_sql), $binding));
                } else {
                    $sql_error = $sql;
                }
                mysqli_close($link);
                trigger_error("{$db_error} {$sql_error}");
                exit;
            }
            //기본 파라미터
            $param_arr = array(
                $stmt,
                str_repeat("s", $binding_cnt)
            );
            foreach ($binding as $k => $v) {
                $param_arr[] = &$binding[$k];
            }
            //바인딩함수 실행
            $stmt_bool = call_user_func_array("mysqli_stmt_bind_param", $param_arr) ? true : false;
            //바인딩 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_error($link);
                $sql_error = substr_count($sql, "?") == count($binding) ? call_user_func_array("sprintf", array_merge(array(str_replace("?", "'%s'", $sql)), $binding)) : $sql;
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                if ($sql_error != "") {
                    trigger_error("{$db_error} {$sql_error}");
                }
                exit;
            }
            $stmt_bool = mysqli_stmt_execute($stmt);
            //실행 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_error($link);
                $sql_error = substr_count($sql, "?") == count($binding) ? call_user_func_array("sprintf", array_merge(array(str_replace("?", "'%s'", $sql)), $binding)) : $sql;
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                if ($sql_error != "") {
                    trigger_error("{$db_error} {$sql_error}");
                }
                exit;
            }
            //insert_id, affected_rows 저장
            $this->db_insert_id = mysqli_stmt_insert_id($stmt);
            $this->db_affected_rows = mysqli_stmt_affected_rows($stmt);
            //db접속종료
            mysqli_stmt_close($stmt);
        }
        //바인딩 없는경우
        else {
            mysqli_query($link, $sql);
            //쿼리에러인경우 종료
            $db_error = mysqli_error($link);
            if ($db_error) {
                mysqli_close($link);
                trigger_error("{$db_error} {$sql}");
                exit;
            }
            //insert_id, affected_rows 저장
            $this->db_insert_id = mysqli_insert_id($link);
            $this->db_affected_rows = mysqli_affected_rows($link);
        }
        //db접속종료
        mysqli_close($link);
    }

    /**
     * 쿼리결과 1줄
     * 
     * require  2021.01.25
     * @version 2021.01.25
     *
     * @param  string $sql
     * @param  array  $binding  prepared statement 인경우 사용
     * @param  string $database 사용할 db
     * @return array
     */
    function db_row_array($sql, $binding = array(), $database = "default") {
        //db설정값 존재여부
        if (!isset($this->db_info[$database])) {
            trigger_error("Unknown database '{$database}'");
            exit;
        }
        //db접속(접속 실패시 에러메시지)
        $link = mysqli_connect($this->db_info[$database]["host"], $this->db_info[$database]["user"], $this->db_info[$database]["password"], $this->db_info[$database]["database"], $this->db_info[$database]["port"]);
        //db접속확인
        if (!$link) {
            trigger_error("'{$database}' database connect failed");
            exit;
        }
        //접두어 있는경우 쿼리에 접두어 추가
        if ($this->db_info[$database]["prefix"] != "") {
            $pattern = "/(from(?!\s+dual)|join|insert\s+into|update)(\s+`?)([a-zA-Z_]`?)/i";
            $replacement = '${1}${2}' . $this->db_info[$database]["prefix"] . '${3}';
            $sql = preg_replace($pattern, $replacement, $sql);
        }
        //캐릭터셋, 타임존 설정
        mysqli_query($link, "set names {$this->db_info[$database]["character_set"]}");
        mysqli_query($link, "set time_zone = '{$this->db_info[$database]["time_zone"]}'");
        //바인딩 갯수
        $binding_cnt = count($binding);
        //반환값
        $result = array();
        //바인딩 있는경우
        if ($binding_cnt > 0) {
            $stmt = mysqli_prepare($link, $sql);
            //쿼리에러인경우 종료
            $db_error = mysqli_error($link);
            if ($db_error) {
                //쿼리랑 바인딩 일치
                if (substr_count($sql, "?") == count($binding)) {
                    $error_sql = str_replace(array("%", "?"), array("%%", "'%s'"), $sql);
                    $sql_error = call_user_func_array("sprintf", array_merge(array($error_sql), $binding));
                } else {
                    $sql_error = $sql;
                }
                mysqli_close($link);
                trigger_error("{$db_error} {$sql_error}");
                exit;
            }
            //기본 파라미터
            $param_arr = array(
                $stmt,
                str_repeat("s", $binding_cnt)
            );
            foreach ($binding as $k => $v) {
                $param_arr[] = &$binding[$k];
            }
            //바인딩함수 실행
            $stmt_bool = call_user_func_array("mysqli_stmt_bind_param", $param_arr) ? true : false;
            //바인딩 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_error($link);
                $sql_error = substr_count($sql, "?") == count($binding) ? call_user_func_array("sprintf", array_merge(array(str_replace("?", "'%s'", $sql)), $binding)) : $sql;
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                if ($sql_error != "") {
                    trigger_error("{$db_error} {$sql_error}");
                }
                exit;
            }
            $stmt_bool = mysqli_stmt_execute($stmt);
            //실행 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_error($link);
                $sql_error = substr_count($sql, "?") == count($binding) ? call_user_func_array("sprintf", array_merge(array(str_replace("?", "'%s'", $sql)), $binding)) : $sql;
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                if ($sql_error != "") {
                    trigger_error("{$db_error} {$sql_error}");
                }
                exit;
            }
            $query = mysqli_stmt_result_metadata($stmt);
            //필드배열
            $row = array();
            //bind_result 파라미터
            $binding_arr = array(
                $stmt
            );
            //필드배열 및 bind_result 파라미터 생성
            while ($field = mysqli_fetch_field($query)) {
                $row[$field->name] = "";
                $binding_arr[] = &$row[$field->name];
            }
            //필드값 바인딩
            call_user_func_array("mysqli_stmt_bind_result", $binding_arr);
            //result 생성(참조값으로 인해 일일히 값 넣어줌)
            for ($i = 0; mysqli_stmt_fetch($stmt); $i++) {
                foreach ($row as $k => $v) {
                    $result[$k] = $v;
                }
                break;
            }
            mysqli_stmt_close($stmt);
        }
        //바인딩 없는경우
        else {
            $query = mysqli_query($link, $sql);
            //쿼리에러인경우 종료
            $db_error = mysqli_error($link);
            if ($db_error) {
                mysqli_close($link);
                trigger_error("{$db_error} {$sql}");
                exit;
            }
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $result = $row;
                break;
            }
        }
        //db접속종료
        mysqli_close($link);
        return $result;
    }

    /**
     * 쿼리결과 여러줄
     * 
     * require  2021.01.25
     * @version 2021.01.25
     *
     * @param string $sql
     * @param array  $binding  prepared statement 인경우 사용
     * @param string $database 사용할 db
     * @return array
     */
    function db_result_array($sql, $binding = array(), $database = "default") {
        //db설정값 존재여부
        if (!isset($this->db_info[$database])) {
            trigger_error("Unknown database '{$database}'");
            exit;
        }
        //db접속(접속 실패시 에러메시지)
        $link = mysqli_connect($this->db_info[$database]["host"], $this->db_info[$database]["user"], $this->db_info[$database]["password"], $this->db_info[$database]["database"], $this->db_info[$database]["port"]);
        //db접속확인
        if (!$link) {
            trigger_error("'{$database}' database connect failed");
            exit;
        }
        //접두어 있는경우 쿼리에 접두어 추가
        if ($this->db_info[$database]["prefix"] != "") {
            $pattern = "/(from(?!\s+dual)|join|insert\s+into|update)(\s+`?)([a-zA-Z_]`?)/i";
            $replacement = '${1}${2}' . $this->db_info[$database]["prefix"] . '${3}';
            $sql = preg_replace($pattern, $replacement, $sql);
        }
        //캐릭터셋, 타임존 설정
        mysqli_query($link, "set names {$this->db_info[$database]["character_set"]}");
        mysqli_query($link, "set time_zone = '{$this->db_info[$database]["time_zone"]}'");
        //바인딩 갯수
        $binding_cnt = count($binding);
        //반환값
        $result = array();
        //바인딩 있는경우
        if ($binding_cnt > 0) {
            $stmt = mysqli_prepare($link, $sql);
            //쿼리에러인경우 종료
            $db_error = mysqli_error($link);
            if ($db_error) {
                //쿼리랑 바인딩 일치
                if (substr_count($sql, "?") == count($binding)) {
                    $error_sql = str_replace(array("%", "?"), array("%%", "'%s'"), $sql);
                    $sql_error = call_user_func_array("sprintf", array_merge(array($error_sql), $binding));
                } else {
                    $sql_error = $sql;
                }
                mysqli_close($link);
                trigger_error("{$db_error} {$sql_error}");
                exit;
            }
            //기본 파라미터
            $param_arr = array(
                $stmt,
                str_repeat("s", $binding_cnt)
            );
            foreach ($binding as $k => $v) {
                $param_arr[] = &$binding[$k];
            }
            //바인딩함수 실행
            $stmt_bool = call_user_func_array("mysqli_stmt_bind_param", $param_arr) ? true : false;
            //바인딩 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_error($link);
                $sql_error = substr_count($sql, "?") == count($binding) ? call_user_func_array("sprintf", array_merge(array(str_replace("?", "'%s'", $sql)), $binding)) : $sql;
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                if ($sql_error != "") {
                    trigger_error("{$db_error} {$sql_error}");
                }
                exit;
            }
            $stmt_bool = mysqli_stmt_execute($stmt);
            //실행 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_error($link);
                $sql_error = substr_count($sql, "?") == count($binding) ? call_user_func_array("sprintf", array_merge(array(str_replace("?", "'%s'", $sql)), $binding)) : $sql;
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                if ($sql_error != "") {
                    trigger_error("{$db_error} {$sql_error}");
                }
                exit;
            }
            $query = mysqli_stmt_result_metadata($stmt);
            //필드배열
            $row = array();
            //bind_result 파라미터
            $binding_arr = array(
                $stmt
            );
            //필드배열 및 bind_result 파라미터 생성
            while ($field = mysqli_fetch_field($query)) {
                $row[$field->name] = "";
                $binding_arr[] = &$row[$field->name];
            }
            //필드값 바인딩
            call_user_func_array("mysqli_stmt_bind_result", $binding_arr);
            //result 생성(참조값으로 인해 일일히 값 넣어줌)
            for ($i = 0; mysqli_stmt_fetch($stmt); $i++) {
                foreach ($row as $k => $v) {
                    $result[$i][$k] = $v;
                }
            }
            mysqli_stmt_close($stmt);
        }
        //바인딩 없는경우
        else {
            $query = mysqli_query($link, $sql);
            //쿼리에러인경우 종료
            $db_error = mysqli_error($link);
            if ($db_error) {
                mysqli_close($link);
                trigger_error("{$db_error} {$sql}");
                exit;
            }
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $result[] = $row;
            }
        }
        //db접속종료
        mysqli_close($link);
        return $result;
    }

    /**
     * 쿼리 문자열 이스케이프
     * 
     * require  2020.09.23
     * @version 2020.09.16
     *
     * @param  string $data
     * @param  string $database 사용할 db
     * @return string
     */
    function db_escape($data, $database = "default") {
        //db설정값 존재여부
        if (!isset($this->db_info[$database])) {
            trigger_error("Unknown database '{$database}'");
            exit;
        }
        //db접속(접속 실패시 에러메시지)
        $link = mysqli_connect($this->db_info[$database]["host"], $this->db_info[$database]["user"], $this->db_info[$database]["password"], $this->db_info[$database]["database"], $this->db_info[$database]["port"]);
        //db접속확인
        if (!$link) {
            trigger_error("'{$database}' database connect failed");
            exit;
        }
        //캐릭터셋, 타임존 설정
        mysqli_query($link, "set names {$this->db_info[$database]["character_set"]}");
        mysqli_query($link, "set time_zone = '{$this->db_info[$database]["time_zone"]}'");
        $result = mysqli_escape_string($link, $data);
        //db접속종료
        mysqli_close($link);
        return $result;
    }

    /**
     * 쿼리 변경된 레코드 갯수
     * 
     * require  2020.09.23
     * @version 2020.07.10
     *
     * @return int
     */
    function db_affected_rows() {
        return $this->db_affected_rows;
    }

    /**
     * 마지막으로 인서트된 auto_increment
     * 
     * require  2020.09.23
     * @version 2020.07.10
     *
     * @return int
     */
    function db_insert_id() {
        return $this->db_insert_id;
    }

    /**
     * request
     * 
     * require  2020.10.21 common_array_value
     * @version 2020.10.21
     *
     * @param  string       $key        키, 공백인경우 배열전체
     * @param  bool         $array_bool 반환값형태, true - 배열, false - 문자열
     * @return string|array
     */
    function input_request($key = "", $array_bool = false) {
        if ($key == "") {
            return isset($_REQUEST) ? $_REQUEST : array();
        }
        return $this->common_array_value($_REQUEST, $key, $array_bool);
    }

    /**
     * server
     * 
     * require  2020.09.23
     * @version 2020.05.21
     *
     * @param  string       $key        키, 공백인경우 배열전체
     * @param  bool         $upper_flag 대문자 변환여부
     * @return string|array
     */
    function input_server($key = "", $upper_flag = true) {
        if ($upper_flag) {
            $key = strtoupper($key);
        }
        if ($key == "") {
            return isset($_SERVER) ? $_SERVER : array();
        }
        return isset($_SERVER[$key]) ? $_SERVER[$key] : "";
    }

    /**
     * 파일정보
     * 
     * require  2020.10.14 
     * @version 2020.10.14
     *
     * @param  string $name       파일 태그 name속성
     * @param  bool   $array_bool true - 배열이름, false - 단일이름
     * @return array              파일배열(name, type, tmp_name, error, size)
     */
    function input_file($name, $array_bool = false) {
        if ($array_bool) {
            if (!isset($_FILES[$name])) {
                return array();
            }
            $arr = array();
            foreach ($_FILES[$name]["name"] as $k => $v) {
                $arr[] = array(
                    "name" => $_FILES[$name]["name"][$k],
                    "type" => $_FILES[$name]["type"][$k],
                    "tmp_name" => $_FILES[$name]["tmp_name"][$k],
                    "error" => $_FILES[$name]["error"][$k],
                    "size" => $_FILES[$name]["size"][$k]
                );
            }
            return $arr;
        } else {
            $arr = array(
                "name" => "",
                "type" => "",
                "tmp_name" => "",
                "error" => 0,
                "size" => 0
            );
            return isset($_FILES[$name]) ? $_FILES[$name] : $arr;
        }
    }

    /**
     * 파일업로드
     * 
     * require  2021.07.20 common_unique_id
     * @version 2021.07.20
     *
     * @param  string $name             파일 태그 name속성
     * @param  string $src              저장폴더
     * @param  array  $allow_ext        업로드 허용 확장자(.제외)
     * @param  bool   $unique_name_bool true인경우 고유파일명 false인경우 업로드한 파일명
     * @return bool
     */
    function input_file_upload($name = "file", $src = ".", $allow_ext = array(), $unique_name_bool = false) {
        //파일존재확인
        if (!isset($_FILES[$name])) {
            $this->input_upload_info["code"] = "2";
            return false;
        }
        //폴더존재확인
        if (!is_writable($src)) {
            $this->input_upload_info["code"] = "3";
            return false;
        }
        //업로드파일 확장자
        $temp_name = explode(".", $_FILES[$name]["name"]);
        $ext = count($temp_name) == "0" ? "" : strtolower($temp_name[count($temp_name) - 1]);
        //flag가 true인경우 고유파일명 false인경우 업로드한 파일명
        if ($unique_name_bool) {
            $file_name = $this->common_unique_id();
        } else {
            $file_name = str_replace("." . $ext, "", $_FILES[$name]["name"]);
        }
        $temp_num = "";
        foreach ($allow_ext as $temp) {
            if ($temp == $ext) {
                for ($i = 1; file_exists("{$src}/{$file_name}{$temp_num}.{$ext}"); $i++) {
                    $temp_num = "_{$i}";
                }
                move_uploaded_file($_FILES[$name]["tmp_name"], "{$src}/{$file_name}{$temp_num}.{$ext}");

                $this->input_upload_info["code"] = "1";
                $this->input_upload_info["name"] = "{$file_name}{$temp_num}";
                $this->input_upload_info["ext"] = "{$ext}";
                $this->input_upload_info["full_name"] = "{$file_name}{$temp_num}.{$ext}";
                $this->input_upload_info["src"] = "{$src}";
                return true;
            }
        }
        //확장자 없음
        $this->input_upload_info["code"] = "4";
        return false;
    }

    /**
     * 파일업로드 base64(이미지만)
     * 
     * require  2020.10.21 common_unique_id, common_array_value
     * @version 2020.10.21
     *
     * @param  string $file 파일데이터
     * @param  string $src  저장폴더
     * @return bool
     */
    function input_file_upload_base64($file, $src = ".") {
        //폴더존재확인
        if (!is_writable($src)) {
            $this->input_upload_info["code"] = "3";
            return false;
        }
        //파일처리
        $file_info = explode(";base64,", $file);
        $ext = explode("/", $file_info[0]);
        $ext = strtolower($this->common_array_value($ext, 1));
        //허용 확장자 아닌경우
        if (!in_array($ext, array("jpg", "jpeg", "gif", "png"))) {
            $this->input_upload_info["code"] = "4";
            return false;
        }
        $file = $this->common_array_value($file_info, 1);
        //파일존재확인
        if ($file == "") {
            $this->input_upload_info["code"] = "2";
            return false;
        }
        $file_name = $this->common_unique_id();
        $temp_num = "";
        for ($i = 0; file_exists("{$src}/{$file_name}{$temp_num}.{$ext}"); $i++) {
            $temp_num = "_{$i}";
        }
        file_put_contents("{$src}/{$file_name}{$temp_num}.{$ext}", $file);
        $this->input_upload_info["code"] = "1";
        $this->input_upload_info["name"] = "{$file_name}{$temp_num}";
        $this->input_upload_info["ext"] = "{$ext}";
        $this->input_upload_info["full_name"] = "{$file_name}{$temp_num}.{$ext}";
        $this->input_upload_info["src"] = "{$src}";
        return true;
    }

    /**
     * 파일업로드 결과, $input_upload_info 주석 확인<br><br>
     * 0: 업로드한적 없음<br>
     * 1: 업로드성공<br>
     * 2: 업로드파일 없음<br>
     * 3: 업로드할 폴더 없음<br>
     * 4: 허용확장자 없음<br>
     * code, name, ext, full_name, src
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @return array
     */
    function input_file_upload_info() {
        return $this->input_upload_info;
    }

    /**
     * 세션 저장
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @param string $key   키
     * @param string $value 값
     */
    function session_set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * 세션 값 불러오기
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @param  string       $key 키
     * @return string|array      값
     */
    function session_get($key = "") {
        if ($key == "") {
            return isset($_SESSION) ? $_SESSION : array();
        }
        return isset($_SESSION[$key]) ? $_SESSION[$key] : "";
    }

    /**
     * 세션 제거
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @param string $key
     */
    function session_unset($key = "") {
        if ($key == "") {
            session_destroy();
        } else if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * 세션 시작여부 확인
     * 
     * require  2020.09.23
     * @version 2020.02.13
     *
     * @return bool
     */
    function session_start_check() {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                return session_id() === '' ? false : true;
            }
        }
        return false;
    }

    /**
     * 쿠키 저장
     * 
     * require  2021.07.05
     * @version 2021.07.05
     *
     * @param string $key   키
     * @param string $value 값
     */
    function cookie_set($key, $value) {
        setcookie($key, $value, 0, "/");
        $_COOKIE[$key] = $value;
    }

    /**
     * 쿠키 값 불러오기
     * 
     * require  2021.07.05
     * @version 2021.07.05
     *
     * @param  string       $key 키
     * @return string|array      값
     */
    function cookie_get($key = "") {
        if ($key == "") {
            return isset($_COOKIE) ? $_COOKIE : array();
        }
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : "";
    }

    /**
     * 쿠키 제거
     * 
     * require  2021.07.05 cookie_get
     * @version 2021.07.05
     *
     * @param string $key
     */
    function cookie_unset($key = "") {
        if ($key == "") {
            $cookie = $this->cookie_get();
        } else if (isset($_COOKIE[$key])) {
            $cookie = array(
                $key => $this->cookie_get("key")
            );
        } else {
            $cookie = array();
        }
        foreach ($cookie as $k => $v) {
            setcookie($k, "", 1, "/");
            unset($_COOKIE[$k]);
        }
    }

    /**
     * 테이블 인서트(1개)<br>
     * 테이블에 insert_date, insert_time 필수
     * 
     * require  2021.07.07 db_query, db_affected_rows, db_insert_id, solution_create_where, solution_create_row
     * @version 2021.07.07
     * 
     * @param  string $main_table 테이블명
     * @param  array  $main_row   입력할 row, key가 is 인경우 이스케이프 처리안함
     * @param  array  $main_where 중복 조건문(key에 다른기호 사용 가능), solution_create_where 사용
     * @param  bool   $or_bool    true - 중복체크 or문, false - 중복체크 and문
     * @param  string $database   사용할 db명
     * @return int                insert_id(입력 안된경우 0)
     */
    function solution_insert($main_table, $main_row, $main_where = array(), $or_bool = true, $database = "default") {
        //입력일시 확인
        $insert_date_bool = false;
        $insert_time_bool = false;
        foreach ($main_row as $k => $v) {
            $key = strtolower($k);
            if ($key == "insert_date" || $key == "insert_date is") {
                $insert_date_bool = true;
            }
            if ($key == "insert_time" || $key == "insert_time is") {
                $insert_time_bool = true;
            }
        }
        if (!$insert_date_bool) {
            $main_row["insert_date is"] = "now()";
        }
        if (!$insert_time_bool) {
            $main_row["insert_time is"] = "now()";
        }
        $row_info = $this->solution_create_row($main_row);
        //중복체크인경우
        if (count($main_where) > 0) {
            $where_info = $this->solution_create_where($main_where, $or_bool);
            $sql = "
                insert into `{$main_table}` (
                    {$row_info["into"]}
                )
                select
                    {$row_info["values"]}
                from
                    dual
                where not exists (
                    select
                        *
                    from
                        `{$main_table}`
                    where
                        {$where_info["where"]}
                )
            ";
            $binding = array_merge($row_info["binding"], $where_info["binding"]);
        }
        //아닌경우
        else {
            $sql = "
                insert into `{$main_table}` (
                    {$row_info["into"]}
                ) values (
                    {$row_info["values"]}
                )
            ";
            $binding = $row_info["binding"];
        }

        $this->db_query($sql, $binding, $database);
        return $this->db_affected_rows() > 0 ? $this->db_insert_id() : 0;
    }

    /**
     * 테이블 업데이트(1개)
     * 
     * require  2021.07.07 db_query, db_affected_rows, solution_create_where, solution_create_row, common_array_value
     * @version 2021.07.07
     * 
     * @param  string $main_table     테이블명
     * @param  array  $main_row       수정할 row, key가 is 인경우 이스케이프 처리안함
     * @param  array  $main_where     수정 조건문(중복체크 하는경우 기본키 필수), solution_create_where 사용
     * @param  bool   $update_dt_bool 수정일시 사용여부(update_date, update_time 필수)
     * @param  string $main_primary   기본키 컬럼명(공백 아닌경우 중복체크)
     * @param  array  $main_add_where 중복체크 조건문(key에 다른기호 사용 가능), solution_create_where 사용
     * @param  bool   $or_bool        true - 중복체크 or문, false - 중복체크 and문
     * @param  string $database       사용할 db명
     * @return int                    affected_rows(수정 안된경우 0)
     */
    function solution_update($main_table, $main_row, $main_where, $update_dt_bool = false, $main_primary = "", $main_add_where = array(), $or_bool = true, $database = "default") {
        $where_info = $this->solution_create_where($main_where);
        if ($update_dt_bool) {
            $main_row["update_date is"] = "now()";
            $main_row["update_time is"] = "now()";
        }
        $row_info = $this->solution_create_row($main_row);
        if ($main_primary != "") {
            $primary_key = $this->common_array_value($main_where, $main_primary);
            $add_where_info = $this->solution_create_where($main_add_where, $or_bool);
            $where_info["where"] .= " and (
                    select
                        `cnt`
                    from (
                        select
                            count(*) as `cnt`
                        from
                            `{$main_table}`
                        where
                            ({$add_where_info["where"]}) and
                            `{$main_primary}` <> ?
                    ) as `t1`
                        
                ) = 0
            ";
            $where_info["binding"] = array_merge($where_info["binding"], $add_where_info["binding"], array($primary_key));
        }

        $sql = "
            update
                `{$main_table}`
            set
                {$row_info["set"]}
            where
                {$where_info["where"]}
        ";
        $binding = array_merge($row_info["binding"], $where_info["binding"]);
        $this->db_query($sql, $binding, $database);
        return $this->db_affected_rows();
    }

    /**
     * 테이블 삭제(1개)<br>
     * 테이블에 delete_flag 필수
     * 
     * require  2021.07.07 db_query, db_affected_rows, solution_create_where
     * @version 2021.07.07
     * 
     * @param  string $main_table 테이블명
     * @param  array  $main_where 삭제 조건문, solution_create_where 사용
     * @param  bool   $force_bool true: 삭제, false: delete_flag 변경
     * @param  string $database   사용할 db명
     * @return int                affected_rows(수정 안된경우 0)
     */
    function solution_delete($main_table, $main_where, $force_bool = false, $database = "default") {
        $where_info = $this->solution_create_where($main_where);
        if ($force_bool) {
            $sql = "
                delete from
                    `{$main_table}`
                where
                    {$where_info["where"]}
            ";
        } else {
            $sql = "
                update
                    `{$main_table}`
                set
                    `delete_flag` = 'y'
                where
                    {$where_info["where"]}
            ";
        }
        $binding = $where_info["binding"];
        $this->db_query($sql, $binding, $database);
        return $this->db_affected_rows();
    }

    /**
     * 테이블 다중행 수정 솔루션(모자라는경우 인서트, 남는경우 삭제처리)<br>
     * 데이터 많은경우 속도 느릴 수 있음.<br>
     * 테이블에 insert_date, insert_time, delete_flag 필수
     * 
     * require  2021.07.07 db_result_array, db_query, solution_create_where, solution_create_row
     * @version 2021.07.07
     * 
     * @param string $main_table   테이블명
     * @param string $main_primary 기본키 컬럼명
     * @param array  $main_list    리스트
     * @param array  $main_where   조건문, solution_create_where 사용
     * @param string $database     사용할 db명
     */
    function solution_modify_multiple_row($main_table, $main_primary, $main_list, $main_where = array(), $database = "default") {
        //기존 리스트
        $where_info = $this->solution_create_where($main_where);
        $current_where = "";
        $current_binding = array();
        $sql = "
            select
                `{$main_primary}`
            from
                `{$main_table}`
            where
                {$where_info["where"]}
        ";
        $binding = $where_info["binding"];
        $result = $this->db_result_array($sql, $binding, $database);

        //업데이트 리스트(기본키가 키값)
        $update_arr = array();
        //인서트 리스트
        $insert_arr = array();
        //처리
        foreach ($main_list as $k => $v) {
            //기존리스트 있는경우
            if (isset($result[$k][$main_primary])) {
                $primary_key = $result[$k][$main_primary];
                $update_arr[$primary_key] = $v;
            }
            //없는경우
            else {
                $insert_arr[] = $v;
            }
        }
        //기존리스트 삭제
        $sql = "
            update
                `{$main_table}`
            set
                `delete_flag` = 'y'
            where
                {$where_info["where"]}
        ";
        $binding = $where_info["binding"];
        $this->db_query($sql, $binding, $database);

        //업데이트
        foreach ($update_arr as $k => $v) {
            $row_info = $this->solution_create_row($v);
            $sql = "
                update
                    `{$main_table}`
                set
                    `insert_date` = now(),
                    `insert_time` = now(),
                    `delete_flag` = 'n',
                    {$row_info["set"]}
                where
                    `{$main_primary}` = ?
            ";
            $binding = array_merge($row_info["binding"], array($k));
            $this->db_query($sql, $binding, $database);
        }
        //인서트
        foreach ($insert_arr as $temp) {
            foreach ($main_where as $k => $v) {
                if (!isset($temp[$k])) {
                    $temp[$k] = $v;
                }
            }
            $row_info = $this->solution_create_row($temp);
            $sql = "
                insert into `{$main_table}` (
                    `insert_date`,
                    `insert_time`,
                    {$row_info["into"]}
                ) values (
                    now(),
                    now(),
                    {$row_info["values"]}
                )
            ";
            $binding = $row_info["binding"];
            $this->db_query($sql, $binding, $database);
        }
    }

    /**
     * where문 생성<br>
     * in 쿼리인경우 값이 배열<br>
     * null쿼리인경우 키가 is, 값이 null 또는 not null<br>
     * 일반쿼리인경우 키에 연산자, 연산자 없는경우 =
     * 
     * require  2021.07.07
     * @version 2021.07.07
     * 
     * @param  array $where_arr where 배열(키값에 연산자 사용 가능)
     * @param  bool  $or_bool  true: or, false: and
     * @return array            where 정보<br>
     *                          ["where"] - 추가 where문<br>
     *                          ["binding"] - 추가 binding문
     */
    function solution_create_where($where_arr = array(), $or_bool = false) {
        $return_arr = array(
            "where" => "",
            "binding" => array()
        );
        $first_bool = true;
        $and_text = $or_bool ? " or " : " and ";
        foreach ($where_arr as $k => $v) {
            if (!$first_bool) {
                $return_arr["where"] .= $and_text;
            }
            $key_arr = explode(" ", str_replace("`", "", $k));
            $field_arr = explode(".", $key_arr[0]);
            $field = "`{$field_arr[0]}`" . (isset($field_arr[1]) ? ".`{$field_arr[1]}`" : "");
            $operator = isset($key_arr[1]) ? $key_arr[1] : "=";
            //in쿼리
            if (is_array($v)) {
                if (isset($key_arr[2])) {
                    //not in
                    $operator = "not in";
                } else {
                    //in
                    $operator = "in";
                }
                $return_arr["where"] .= "{$field} {$operator}(";
                foreach ($v as $kk => $vv) {
                    if ($kk != "0") {
                        $return_arr["where"] .= ", ";
                    }
                    $return_arr["where"] .= "?";
                    $return_arr["binding"][] = $vv;
                }
                $return_arr["where"] .= ")";
            }
            //escape, null쿼리
            else if (strtolower($operator) == "is") {
                //escape인경우
                if (!in_array(strtolower($v), array("null", "not null"))) {
                    $operator = "=";
                }
                $return_arr["where"] .= "{$field} {$operator} {$v}";
            }
            //일반쿼리
            else {
                $return_arr["where"] .= "{$field} {$operator} ?";
                $return_arr["binding"][] = $v;
            }
            $first_bool = false;
        }
        return $return_arr;
    }

    /**
     * set, into, values 컬럼 생성<br>
     * escape인경우 키가 is
     * 
     * require  2021.07.07 common_array_value
     * @version 2021.07.07
     * 
     * @param  array $row_arr   row 배열(escape인경우 키가 is)
     * @return array            row 정보<br>
     *                          ["set"] - 추가 set문<br>
     *                          ["into"] - 추가 into문<br>
     *                          ["values"] - 추가 values문<br>
     *                          ["binding"] - 추가 binding문
     */
    function solution_create_row($row_arr = array()) {
        $return_arr = array(
            "set" => "",
            "into" => "",
            "values" => "",
            "binding" => array()
        );
        $first_bool = true;
        foreach ($row_arr as $k => $v) {
            if (!$first_bool) {
                $return_arr["set"] .= ", ";
                $return_arr["into"] .= ", ";
                $return_arr["values"] .= ", ";
            }
            $key_arr = explode(" ", str_replace("`", "", $k));
            $field_arr = explode(".", $key_arr[0]);
            $field = "`{$field_arr[0]}`" . (isset($field_arr[1]) ? ".`{$field_arr[1]}`" : "");
            if (strtolower($this->common_array_value($key_arr, 1)) == "is") {
                $return_arr["set"] .= "{$field} = {$v}";
                $return_arr["into"] .= $field;
                $return_arr["values"] .= $v;
            } else {
                $return_arr["set"] .= "{$field} = ?";
                $return_arr["into"] .= $field;
                $return_arr["values"] .= "?";
                $return_arr["binding"][] = $v;
            }
            $first_bool = false;
        }
        return $return_arr;
    }

    /**
     * phpexcel 객체 생성<br>
     * 
     * require  2021.06.17 PHPExcel_IOFactory
     * @version 2021.06.17
     * 
     * @param  string   $file     파일명
     * @param  bool     $xls_bool true: xls, false: xlsx
     * @return PHPExcel           phpexcel 객체
     */
    function solution_phpexcel_create($file, $xls_bool = false) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$phpexcel = \\PhpOffice\\PhpSpreadsheet\\IOFactory::load($file);');
        } else {
            if ($xls_bool) {
                $reader = PHPExcel_IOFactory::createReader("Excel5");
                $phpexcel = $reader->load($file);
            } else {
                $phpexcel = PHPExcel_IOFactory::load($file);
            }
        }
        return $phpexcel;
    }

    /**
     * phpexcel worksheet 반환
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param  PHPExcel           $phpexcel phpexcel 객체
     * @param  int                $index    worksheet 인덱스
     * @return PHPExcel_Worksheet           worksheet 객체
     */
    function solution_phpexcel_get_worksheet(&$phpexcel, $index = 0) {
        return $phpexcel->setActiveSheetIndex($index);
    }

    /**
     * phpexcel 정보 입력
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param PHPExcel $phpexcel    phpexcel 객체
     * @param string   $writer      작성자
     * @param string   $modifier    최종수정자
     * @param string   $title       제목
     * @param string   $subject     주제
     * @param string   $description 설명
     * @param string   $keyword     키워드
     * @param string   $category    범주
     */
    function solution_phpexcel_set_info(&$phpexcel, $writer = "", $modifier = "", $title = "", $subject = "", $description = "", $keyword = "", $category = "") {
        $phpexcel->getProperties()->
                setCreator($writer)->
                setLastModifiedBy($modifier)->
                setTitle($title)->
                setSubject($subject)->
                setDescription($description)->
                setKeywords($keyword)->
                setCategory($category);
    }

    /**
     * phpexcel 시트명 변경
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param PHPExcel_Worksheet $worksheet worksheet 객체
     * @param string             $name      시트명
     */
    function solution_phpexcel_set_sheet_name(&$worksheet, $name) {
        $worksheet->setTitle($name);
    }

    /**
     * phpexcel 셀값 가져오기
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param  PHPExcel_Worksheet $worksheet worksheet 객체
     * @param  string             $cell      셀이름
     * @return string                        셀값
     */
    function solution_phpexcel_get_value(&$worksheet, $cell) {
        return $worksheet->getCell($cell)->getValue();
    }

    /**
     * phpexcel 셀값 설정하기<br>
     * 값에 따라 셀너비 설정<br>
     * 
     * require  2021.06.17
     * @version 2021.06.17
     * 
     * @param PHPExcel_Worksheet $worksheet   worksheet 객체
     * @param string             $cell        셀이름
     * @param string             $value       셀값
     * @param string             $number_bool true: 숫자, false: 문자열
     */
    function solution_phpexcel_set_value(&$worksheet, $cell, $value, $number_bool = false) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$type_string = \\PhpOffice\\PhpSpreadsheet\\Cell\\DataType::TYPE_STRING;');
        } else {
            $type_string = PHPExcel_Cell_DataType::TYPE_STRING;
        }
        $column = preg_replace("/[0-9]/", "", $cell);
        $kor_len = (strlen($value) - mb_strlen($value, "utf-8")) / 2;
        $eng_len = mb_strlen($value, "utf-8") - $kor_len;
        $total_len = round($kor_len * 2 + $eng_len) + 4;
        if ($number_bool) {
            $worksheet->setCellValue($cell, $value);
        } else {
            $worksheet->setCellValueExplicit($cell, $value, $type_string);
        }
        //셀너비 설정
        if ($worksheet->getColumnDimension($column)->getWidth() < $total_len) {
            $worksheet->getColumnDimension($column)->setWidth($total_len);
        }
    }

    /**
     * phpexcel 셀 합치기
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param PHPExcel_Worksheet $worksheet  worksheet 객체
     * @param string             $start_cell 왼쪽위 셀이름
     * @param string             $end_cell   오른쪽아래 셀이름
     */
    function solution_phpexcel_merge_cell(&$worksheet, $start_cell, $end_cell) {
        $worksheet->mergeCells("{$start_cell}:{$end_cell}");
    }

    /**
     * phpexcel 셀너비 설정
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param PHPExcel_Worksheet $worksheet worksheet 객체
     * @param string             $cell      열알파벳
     * @param int                $width     너비
     */
    function solution_phpexcel_set_width(&$worksheet, $cell, $width) {
        $worksheet->getColumnDimension($cell)->setWidth($width);
    }

    /**
     * phpexcel 셀높이 설정
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param PHPExcel_Worksheet $worksheet worksheet 객체
     * @param int                $cell      행번호
     * @param int                $height    높이
     */
    function solution_phpexcel_set_height(&$worksheet, $cell, $height) {
        $worksheet->getRowDimension($cell)->setRowHeight($height);
    }

    /**
     * phpexcel 셀폰트 설정
     * 
     * require  2020.12.16
     * @version 2020.12.16
     * 
     * @param PHPExcel_Worksheet $worksheet worksheet 객체
     * @param string             $cell      셀이름, 범위로도 설정가능
     * @param int                $size      폰트크기
     * @param string             $color     폰트색상, 컬러코드 대문자
     * @param bool               $bold_bool true: 진하게, false: 일반
     */
    function solution_phpexcel_set_font(&$worksheet, $cell, $size, $color, $bold_bool) {
        $worksheet->getStyle($cell)->getFont()->
                setBold($bold_bool)->
                setSize($size)->
                getColor()->
                setARGB("FF{$color}");
    }

    /**
     * phpexcel 셀정렬 설정<br>
     * 
     * require  2021.06.17
     * @version 2021.06.17
     * 
     * @param PHPExcel_Worksheet $worksheet  worksheet 객체
     * @param string             $cell       셀이름, 범위로도 설정가능
     * @param string             $vertical   수직정렬 - top, center, bottom
     * @param string             $horizontal 수평정렬 - left, center, right
     */
    function solution_phpexcel_set_align(&$worksheet, $cell, $vertical, $horizontal) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$vertical_top = \\PhpOffice\\PhpSpreadsheet\\Style\\Alignment::VERTICAL_TOP;');
            eval('$vertical_bottom = \\PhpOffice\\PhpSpreadsheet\\Style\\Alignment::VERTICAL_BOTTOM;');
            eval('$vertical_center = \\PhpOffice\\PhpSpreadsheet\\Style\\Alignment::VERTICAL_CENTER;');
            eval('$horizontal_left = \\PhpOffice\\PhpSpreadsheet\\Style\\Alignment::HORIZONTAL_LEFT;');
            eval('$horizontal_right = \\PhpOffice\\PhpSpreadsheet\\Style\\Alignment::HORIZONTAL_RIGHT;');
            eval('$horizontal_center = \\PhpOffice\\PhpSpreadsheet\\Style\\Alignment::HORIZONTAL_CENTER;');
        } else {
            $vertical_top = PHPExcel_Style_Alignment::VERTICAL_TOP;
            $vertical_bottom = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
            $vertical_center = PHPExcel_Style_Alignment::VERTICAL_CENTER;
            $horizontal_left = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
            $horizontal_right = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
            $horizontal_center = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
        }
        //수직, 수평 정렬
        if ($vertical == "top") {
            $vertical_code = $vertical_top;
        } else if ($vertical == "bottom") {
            $vertical_code = $vertical_bottom;
        } else {
            $vertical_code = $vertical_center;
        }
        if ($horizontal == "left") {
            $horizontal_code = $horizontal_left;
        } else if ($horizontal == "right") {
            $horizontal_code = $horizontal_right;
        } else {
            $horizontal_code = $horizontal_center;
        }
        $worksheet->getStyle($cell)->getAlignment()->setHorizontal($horizontal_code)->setVertical($vertical_code);
    }

    /**
     * phpexcel 셀색상 설정<br>
     * 
     * require  2021.06.17
     * @version 2021.06.17
     * 
     * @param PHPExcel_Worksheet $worksheet worksheet 객체
     * @param string             $cell      셀이름, 범위로도 설정가능
     * @param string             $color     폰트색상, 컬러코드 대문자, transparent인경우 투명색
     */
    function solution_phpexcel_set_background(&$worksheet, $cell, $color) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$fill_solid = \\PhpOffice\\PhpSpreadsheet\\Style\\Fill::FILL_SOLID;');
        } else {
            $fill_solid = PHPExcel_Style_Fill::FILL_SOLID;
        }
        $color_code = $color == "transparent" ? "00000000" : "FF{$color}";
        $worksheet->getStyle($cell)->getFill()->setFillType($fill_solid)->getStartColor()->setARGB($color_code);
    }

    /**
     * phpexcel 셀테두리 설정<br>
     * 
     * require  2021.06.17
     * @version 2021.06.17
     * 
     * @param PHPExcel_Worksheet $worksheet worksheet 객체
     * @param string             $cell      셀이름, 범위로도 설정가능
     * @param string             $color     폰트색상, 컬러코드 대문자, transparent인경우 투명색
     * @param string             $style     테두리 그리기 타입<br>
     *                                      all - 전체<br>
     *                                      outline - 바깥쪽<br>
     *                                      inside - 안쪽<br>
     *                                      vertical - 안쪽수직<br>
     *                                      horizontal - 안쪽수평<br>
     *                                      left - 왼쪽<br>
     *                                      right - 오른쪽<br>
     *                                      top - 위쪽<br>
     *                                      bottom - 아래쪽<br>
     */
    function solution_phpexcel_set_border(&$worksheet, $cell, $color, $style) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$border_none = \\PhpOffice\\PhpSpreadsheet\\Style\\Border::BORDER_NONE;');
            eval('$border_thin = \\PhpOffice\\PhpSpreadsheet\\Style\\Border::BORDER_THIN;');
            $border_style = "borderStyle";
            $all_borders = "allBorders";
        } else {
            $border_none = PHPExcel_Style_Border::BORDER_NONE;
            $border_thin = PHPExcel_Style_Border::BORDER_THIN;
            $border_style = "style";
            $all_borders = "allborders";
        }
        //색상
        if ($color == "transparent") {
            $color_arr = array(
                $border_style => $border_none
            );
        } else {
            $color_arr = array(
                $border_style => $border_thin,
                "color" => array(
                    "argb" => "FF{$color}"
                )
            );
        }
        $border_arr = array(
            "borders" => array()
        );
        if ($style == "outline") {
            $border_arr["borders"]["outline"] = $color_arr;
        } else if ($style == "inside") {
            $border_arr["borders"]["inside"] = $color_arr;
        } else if ($style == "vertical") {
            $border_arr["borders"]["vertical"] = $color_arr;
        } else if ($style == "horizontal") {
            $border_arr["borders"]["horizontal"] = $color_arr;
        } else if ($style == "left") {
            $border_arr["borders"]["left"] = $color_arr;
        } else if ($style == "right") {
            $border_arr["borders"]["right"] = $color_arr;
        } else if ($style == "top") {
            $border_arr["borders"]["top"] = $color_arr;
        } else if ($style == "bottom") {
            $border_arr["borders"]["bottom"] = $color_arr;
        } else {
            $border_arr["borders"][$all_borders] = $color_arr;
        }
        //테두리
        $worksheet->getStyle($cell)->applyFromArray($border_arr);
    }

    /**
     * phpexcel 다운로드<br>
     * 
     * require  2021.06.17
     * @version 2021.06.17
     * 
     * @param PHPExcel $phpexcel phpexcel 객체
     * @param string   $title    다운로드 파일명
     */
    function solution_phpexcel_download(&$phpexcel, $title) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$writer = \\PhpOffice\\PhpSpreadsheet\\IOFactory::createWriter($phpexcel, "Xlsx");');
        } else {
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
        }
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $title . '.xlsx"');
        header('Cache-Control: max-age=0');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer->save('php://output');
    }

    /**
     * phpexcel 저장<br>
     * 
     * require  2021.06.17
     * @version 2021.06.17
     * 
     * @param PHPExcel $phpexcel phpexcel 객체
     * @param string   $file     파일저장경로(.xlsx까지 적어야함)
     */
    function solution_phpexcel_save(&$phpexcel, $file) {
        //phpspreadsheet
        if (!class_exists("PHPExcel")) {
            eval('$writer = \\PhpOffice\\PhpSpreadsheet\\IOFactory::createWriter($phpexcel, "Xlsx");');
        } else {
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
        }
        $writer->save($file);
    }

    /**
     * phpmailer 구글 smtp 메일전송
     * 
     * require  2022.07.16
     * @version 2022.07.16
     * 
     * @param  PHPMailer    $phpmailer phpmailer 객체
     * @param  string       $gmail_id  gmail 아이디
     * @param  string       $gmail_pw  gmail 비밀번호
     * @param  string       $from_name 보내는사람 이름
     * @param  string|array $to_email  받는사람 이메일
     * @param  string       $title     제목
     * @param  string       $content   내용
     * @param  array        $file      첨부파일 리스트 배열
     * @param  string|array $cc        참조
     * @param  string|array $bcc       숨은참조
     * @return bool                    true: 성공, false: 실패
     */
    function solution_phpmailer_send($phpmailer, $gmail_id, $gmail_pw, $from_name, $to_email, $title, $content, $file = array(), $cc = "", $bcc = "") {
        //Tell PHPMailer to use SMTP
        $phpmailer->isSMTP();
        $phpmailer->CharSet = "utf-8";
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $phpmailer->SMTPDebug = 0;
//Ask for HTML-friendly debug output
//        $phpmailer->Debugoutput = 'html';
//Set the hostname of the mail server
        $phpmailer->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
        $phpmailer->Port = 465;
//Whether to use SMTP authentication
        $phpmailer->SMTPAuth = true;
        $phpmailer->SMTPSecure = "ssl";
//Username to use for SMTP authentication
        $phpmailer->Username = $gmail_id;
//Password to use for SMTP authentication
        $phpmailer->Password = $gmail_pw;
//Set who the message is to be sent from
        $phpmailer->setFrom($gmail_id, $from_name);
//Set an alternative reply-to address
//$phpmailer->addReplyTo($gmail_id, $from_name);
//Set who the message is to be sent to
        if (is_array($to_email)) {
            foreach ($to_email as $temp) {
                $phpmailer->addAddress($temp, '');
            }
        } else {
            $phpmailer->addAddress($to_email, '');
        }
        if (is_array($cc)) {
            foreach ($cc as $temp) {
                $phpmailer->addCC($temp);
            }
        } else if ($cc != "") {
            $phpmailer->addCC($cc);
        }
        if (is_array($bcc)) {
            foreach ($bcc as $temp) {
                $phpmailer->addBCC($temp);
            }
        } else if ($bcc != "") {
            $phpmailer->addBCC($bcc);
        }
//Set the subject line
        $phpmailer->Subject = $title;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $phpmailer->msgHTML($content);
//Replace the plain text body with one created manually
//        $phpmailer->AltBody = 'This is a plain-text message body';
//Attach an image file
        foreach ($file as $temp) {
            $phpmailer->addAttachment($temp);
        }

//send the message, check for errors
        if ($phpmailer->send()) {
            return true;
        }
        $this->common_log_message("Mailer Error: {$phpmailer->ErrorInfo}", "error");
        return false;
    }

    /**
     * phpwebdriver 데이터 가져오기
     * 
     * require  2021.07.09
     * @version 2021.07.09
     * 
     * @param  string $url      전체 url
     * @param  string $selector css 셀렉터
     * @param  int    $port     크롬드라이버 port
     * @return string           결과문자열
     */
    function solution_phpwebdriver_get_content($url, $selector, $port = 4444) {
        try {
            $server_url = "http://localhost:{$port}";
            eval('$option = new Facebook\\WebDriver\\Chrome\\ChromeOptions();');
            $option->addArguments(array(
                "--headless",
                "--no-sandbox",
                "--disable-dev-shm-usage"
            ));
            eval('$capability = Facebook\\WebDriver\\Remote\\DesiredCapabilities::chrome();');
            eval('$capability->setCapability(Facebook\\WebDriver\\Chrome\\ChromeOptions::CAPABILITY, $option);');
            eval('$driver = Facebook\\WebDriver\\Remote\\RemoteWebDriver::create($server_url, $capability, 10000, 10000);');
            $driver->get($url);
            eval('$content = $driver->findElement(Facebook\\WebDriver\\WebDriverBy::cssSelector($selector))->getText();');
        } catch (Exception $e) {
            $content = "";
        }
        if (isset($driver)) {
            $driver->quit();
        }
        return $content;
    }

    /**
     * 코드배열 반환
     */
    function solution_get_code() {
        $sql = "
            select
                `title`,
                `content`
            from
                `code`
            where
                `delete_flag` = 'n'
        ";
        $result = $this->db_result_array($sql);
        $arr = array();
        foreach ($result as $temp) {
            $arr[$temp["title"]] = $temp["content"];
        }
        return $arr;
    }

    /**
     * 세션체크<br>
     * code 리스트<br>
     * 1: 관리자여부
     */
    function solution_session_check($code, $view_bool = true) {
        $text = $view_bool ? '<script>location.replace("index.php")</script>' : "999";
        if ($code == "1") {
            if ($this->session_get("admin_idx") == "") {
                echo $text;
                exit;
            }
        }
    }

    /**
     * 카테고리 계층 리스트
     * 
     */
    function solution_category_list() {
        $where_arr = array(
            "c.parent_category_idx is" => "not null"
        );
        $result = $this->solution_table_list("category", $where_arr);
        $child_arr = array();
        foreach ($result as $temp) {
            $child_arr[$temp["parent_category_idx"]][] = $temp;
        }
        $where_arr = array(
            "c.parent_category_idx is" => "null"
        );
        $result = $this->solution_table_list("category", $where_arr);
        $parent_arr = array();
        foreach ($result as $k => $v) {
            $parent_arr[$k] = $v;
            $parent_arr[$k]["child"] = isset($child_arr[$v["category_idx"]]) ? $child_arr[$v["category_idx"]] : array();
        }
        return $parent_arr;
    }

    /**
     * 댓글 계층 리스트
     * 
     */
    function solution_comment_list($board_idx) {
        $where_arr = array(
            "c3.parent_comment_idx is" => "not null",
            "c3.board_idx" => $board_idx
        );
        $order_arr = array(
            "c3.comment_idx"
        );
        $result = $this->solution_table_list("comment", $where_arr, array(), $order_arr, false);
        $child_arr = array();
        foreach ($result as $temp) {
            $child_arr[$temp["parent_comment_idx"]][] = $temp;
        }
        $where_arr = array(
            "c3.parent_comment_idx is" => "null",
            "c3.board_idx" => $board_idx
        );
        $order_arr = array(
            "c3.comment_idx"
        );
        $result = $this->solution_table_list("comment", $where_arr, array(), $order_arr, false);
        $parent_arr = array();
        foreach ($result as $k => $v) {
            $parent_arr[$k] = $v;
            $parent_arr[$k]["child"] = isset($child_arr[$v["comment_idx"]]) ? $child_arr[$v["comment_idx"]] : array();
        }
        return $parent_arr;
    }

    /**
     * 접속로그
     */
    function solution_connect_log() {
        $ip = $this->input_server("remote_addr");
        $start_page = $this->input_server("request_uri");
        $referer = $this->input_server("http_referer");
        $user_agent = $this->input_server("http_user_agent");
        $date = date("Y-m-d");
        if ($this->common_is_bot()) {
            $device_flag = "b";
        } else if ($this->common_is_mobile()) {
            $device_flag = "m";
        } else {
            $device_flag = "p";
        }
        $row_arr = array(
            "ip" => $ip,
            "start_page" => $start_page,
            "referer" => $referer,
            "user_agent" => $user_agent,
            "device_flag" => $device_flag,
            "connect_cnt" => "1"
        );
        $where_arr = array(
            "ip" => $ip,
            "insert_date" => $date
        );
        $connect_log_idx = $this->solution_insert("connect_log", $row_arr, $where_arr, false);

        if ($connect_log_idx > 0) {
            return;
        }
        $row_arr = array(
            "connect_cnt is" => "`connect_cnt` + 1"
        );
        $this->solution_update("connect_log", $row_arr, $where_arr);
    }

    /**
     * 개인정보 처리방침
     */
    function solution_privacy_policy() {
        $arr = $this->solution_get_code();
        return "
{$arr["homepage_name"]}는 개인정보 보호법 제30조에 따라 정보주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기 위하여 다음과 같이 개인정보 처리지침을 수립 공개합니다. 

제1조(개인정보의 처리목적) 

 {$arr["homepage_name"]}는 다음의 목적을 위하여 개인정보를 처리합니다. 처리하고 있는 개인정보는 다음의 목적 이외의 용도로는 이용되지 않으며, 이용 목적이 변경되는 경우에는 개인정보 보호법 제18조에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다. 

  1. 홈페이지 회원 가입 및 관리
     회원 가입의사 확인, 회원제 서비스 제공에 따른 본인 식별.인증, 회원자격 유지.관리, 제한적 본인확인제 시행에 따른 본인확인, 서비스 부정이용 방지, 만 14세 미만 아동의 개인정보 처리시 법정대리인의 동의여부 확인, 각종 고지 통지, 고충처리 등을 목적으로 개인정보를 처리합니다.

제2조(개인정보의 처리 및 보유기간) 

 ① 회사는 법령에 따른 개인정보 보유.이용기간 또는 정보주체로부터 개인정보를 수집시에 동의받은 개인정보 보유 이용기간 내에서 개인정보를 처리 보유합니다. 

 ② 각각의 개인정보 처리 및 보유 기간은 다음과 같습니다. 

  1. 홈페이지 회원 가입 및 관리 : 사업자/단체 홈페이지 탈퇴시까지 
     다만, 다음의 사유에 해당하는 경우에는 해당 사유 종료시까지 
     1) 관계 법령 위반에 따른 수사.조사 등이 진행중인 경우에는 해당 수사 조사 종료시까지 
     2) 홈페이지 이용에 따른 채권.채무관계 잔존시에는 해당 채권 채무관계 정산시까지 

  2. 재화 또는 서비스 제공 : 재화.서비스 공급완료 및 요금결제 정산 완료시까지
     다만, 다음의 사유에 해당하는 경우에는 해당 기간 종료시까지 
     1) 「전자상거래 등에서의 소비자 보호에 관한 법률」에 따른 표시 광고, 계약내용 및 이행 등 거래에 관한 기록 
        - 표시 광고에 관한 기록 : 6월 
        - 계약 또는 청약철회, 대금결제, 재화 등의 공급기록 : 5년 
        - 소비자 불만 또는 분쟁처리에 관한 기록 : 3년 
     2)「통신비밀보호법」제41조에 따른 통신사실확인자료 보관
       - 가입자 전기통신일시, 개시 종료시간, 상대방 가입자번호, 사용도수, 발신기지국 위치추적자료 : 1년 
       - 컴퓨터통신, 인터넷 로그기록자료, 접속지 추적자료 : 3개월

제3조(개인정보의 제3자 제공) 

 {$arr["homepage_name"]}는 정보주체의 개인정보를 제1조(개인정보의 처리 목적)에서 명시한 범위 내에서만 처리하며, 정보주체의 동의, 법률의 특별한 규정 등 개인정보 보호법 제17조에 해당하는 경우에만 개인정보를 제3자에게 제공합니다.

제4조(정보주체의 권리.의무 및 행사방법)

 ① 정보주체는 {$arr["homepage_name"]}에 대해 언제든지 다음 각 호의 개인정보 보호 관련 권리를 행사할 수 있습니다. 
  
  1. 개인정보 열람요구
  
  2. 오류 등이 있을 경우 정정 요구
  
  3. 삭제요구 
  
  4. 처리정지 요구  
 
 ② 제1항에 따른 권리 행사는 {$arr["homepage_name"]}에 대해 서면, 전화, 전자우편, 모사전송(FAX) 등을 통하여 하실 수 있으며 {$arr["homepage_name"]}는 이에 대해 지체없이 조치하겠습니다. 
 
 ③ 정보주체가 개인정보의 오류 등에 대한 정정 또는 삭제를 요구한 경우에는 {$arr["homepage_name"]}는 정정 또는 삭제를 완료할 때까지 당해 개인정보를 이용하거나 제공하지 않습니다. 
 
 ④ 제1항에 따른 권리 행사는 정보주체의 법정대리인이나 위임을 받은 자 등 대리인을 통하여 하실 수 있습니다. 이 경우 개인정보 보호법 시행규칙 별지 제11호 서식에 따른 위임장을 제출하셔야 합니다. 
 
 ⑤ 정보주체는 개인정보 보호법 등 관계법령을 위반하여 {$arr["homepage_name"]}가 처리하고 있는 정보주체 본인이나 타인의 개인정보 및 사생활을 침해하여서는 아니됩니다. 

제5조(처리하는 개인정보 항목) 

 {$arr["homepage_name"]}는 다음의 개인정보 항목을 처리하고 있습니다. 

  1. 홈페이지 회원 가입 및 관리 
     필수항목 : 성명, 생년월일, 이메일주소, 비밀번호, 성별 

  2. 인터넷 서비스 이용과정에서 아래 개인정보 항목이 자동으로 생성되어 수집될 수 있습니다. 
     IP주소, 쿠키, MAC주소, 서비스 이용기록, 방문기록, 불량 이용기록 등 

제6조(개인정보의 파기) 
 
 ① {$arr["homepage_name"]}는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게 되었을 때에는 지체없이 해당 개인정보를 파기합니다. 
 
 ② 정보주체로부터 동의받은 개인정보 보유기간이 경과하거나 처리목적이 달성되었음에도 불구하고 다른 법령에 따라 개인정보를 계속 보존하여야 하는 경우에는, 해당 개인정보를 별도의 데이터베이스(DB)로 옮기거나 보관장소를 달리하여 보존합니다. 
   
제7조(개인정보 자동 수집 장치의 설치.운영 및 거부에 관한 사항) 
 
 ① {$arr["homepage_name"]}는 이용자에게 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고 수시로 불러오는 ‘쿠키(cookie)’를 사용합니다.
   
 ② 쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터 브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에 저장되기도 합니다.
      가. 쿠키의 사용목적: 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보 제공을 위해 사용됩니다.
      나. 쿠키의 설치∙운영 및 거부 : 웹브라우저 상단의 도구>인터넷 옵션>개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다.
      다. 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.

제8조(권익침해 구제방법) 정보주체는 아래의 기관에 대해 개인정보 침해에 대한 피해구제, 상담 등을 문의하실 수 있습니다. 

  <아래의 기관은 회사와는 별개의 기관으로서, 회사의 자체적인 개인정보 불만처리, 피해구제 결과에 만족하지 못하시거나 보다 자세한 도움이 필요하시면 문의하여 주시기 바랍니다>
 
   ▶ 개인정보 침해신고센터 (한국인터넷진흥원 운영) 
       - 소관업무 : 개인정보 침해사실 신고, 상담 신청 
       - 홈페이지 : privacy.kisa.or.kr 
       - 전화 : (국번없이) 118 
       - 주소 : (58324) 전남 나주시 진흥길 9(빛가람동 301-2) 3층 개인정보침해신고센터

   ▶ 개인정보 분쟁조정위원회
       - 소관업무 : 개인정보 분쟁조정신청, 집단분쟁조정 (민사적 해결) 
       - 홈페이지 : www.kopico.go.kr 
       - 전화 : (국번없이) 1833-6972
       - 주소 : (03171)서울특별시 종로구 세종대로 209 정부서울청사 4층

   ▶ 대검찰청 사이버범죄수사단 : 02-3480-3573 (www.spo.go.kr)

   ▶ 경찰청 사이버안전국 : 182 (http://cyberbureau.police.go.kr)
 
제9조(개인정보 처리방침 변경)
 
 ① 이 개인정보 처리방침은 {$arr["open_date"]}부터 적용됩니다.
        ";
    }

    /**
     * 주 테이블 정보<br>
     * 삭제여부는 항상 n<br>
     * 테이블별로 임의로 추가해서 사용
     * 
     * require  2021.07.07 solution_create_where, db_row_array
     * @version 2021.07.07
     * 
     * @param  string $table     테이블명
     * @param  int    $idx       기본키(count(*)를 위해 필수)
     * @param  array  $where_arr where문
     * @param  string $database  사용 데이터베이스
     * @return array             테이블 정보
     */
    function solution_table_info($table, $idx, $where_arr = array(), $database = "default") {
        $where_info = $this->solution_create_where($where_arr);
        if ($where_info["where"] != "") {
            $where_info["where"] = " and {$where_info["where"]}";
        }
        if ($table == "admin") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `a`.`admin_idx`,
                    `a`.`id`,
                    `a`.`pw`
                from
                    `admin` as `a`
                where
                    `a`.`admin_idx` = ? and
                    `a`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "admin_log") {
            
        } else if ($table == "author") {
            
        } else if ($table == "board") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `b`.`board_idx`,
                    `b`.`category_idx`,
                    `b`.`member_idx`,
                    `b`.`title`,
                    `b`.`content`,
                    case
                        when `b`.`admin_flag` = 'y' then '관리자'
                        when `b`.`member_idx` is null then `b`.`name`
                        else `m`.`nickname`
                    end as `name`,
                    `b`.`view_cnt`,
                    `b`.`private_flag`,
                    `b`.`top_flag`,
                    `b`.`admin_flag`,
                    `b`.`insert_date`,
                    `b`.`insert_time`,
                    `b`.`update_date`,
                    `b`.`update_time`,
                    `c`.`title` as `category_title`
                from
                    `board` as `b`
                left join
                    `category` as `c`
                on
                    `b`.`category_idx` = `c`.`category_idx`
                left join
                    `member` as `m`
                on
                    `b`.`member_idx` = `m`.`member_idx`
                where
                    `b`.`board_idx` = ? and
                    `b`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "category") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `c`.`category_idx`,
                    `c`.`parent_category_idx`,
                    `c`.`file_name`,
                    `c`.`manager_file_name`,
                    `c`.`title`,
                    `c`.`sort`
                from
                    `category` as `c`
                where
                    `c`.`category_idx` = ? and
                    `c`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "code") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `c2`.`code_idx`,
                    `c2`.`title`,
                    `c2`.`content`,
                    `c2`.`description`,
                    `c2`.`core_flag`
                from
                    `code` as `c2`
                where
                    `c2`.`code_idx` = ? and
                    `c2`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "comic") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `c4`.`comic_idx`,
                    `c4`.`author_idx`,
                    `c4`.`title`,
                    `c4`.`page`,
                    `c4`.`view_cnt`,
                    `c4`.`download_url`,
                    `c4`.`insert_date`,
                    `c4`.`insert_time`,
                    `a2`.`name` as `author`,
                    `c`.`title` as `category_title`
                from
                    `comic` as `c4`
                left join
                    `author` as `a2`
                on
                    `c4`.`author_idx` = `a2`.`author_idx`
                left join
                    `category` as `c`
                on
                    `c4`.`category_idx` = `c`.`category_idx`
                where
                    `c4`.`comic_idx` = ? and
                    `c4`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "comment") {
            
        } else if ($table == "connect_log") {
            
        } else if ($table == "file") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `f`.`file_idx`,
                    `f`.`board_idx`,
                    `f`.`origin_name`,
                    `f`.`server_path`,
                    `f`.`web_path`,
                    `f`.`size`,
                    `f`.`insert_date`,
                    `f`.`insert_time`
                from
                    `file` as `f`
                where
                    `f`.`file_idx` = ? and
                    `f`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "image") {
            
        } else if ($table == "member") {
            $sql = "
                select
                    count(*) as `cnt`,
                    `m`.`member_idx`,
                    `m`.`id`,
                    `m`.`nickname`,
                    `m`.`name`,
                    `m`.`birthday`,
                    `m`.`gender`,
                    `m`.`last_login_date`,
                    `m`.`last_login_time`,
                    `m`.`insert_date`,
                    `m`.`insert_time`,
                    `i`.`server_path`,
                    `i`.`web_path`
                from
                    `member` as `m`
                left join
                    `image` as `i`
                on
                    `m`.`image_idx` = `i`.`image_idx`
                where
                    `m`.`member_idx` = ? and
                    `m`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        }
        $binding = array_merge(array($idx), $where_info["binding"]);
        $result = $this->db_row_array($sql, $binding, $database);
        return $result;
    }

    /**
     * 주 테이블 리스트<br>
     * 삭제여부는 항상 n<br>
     * 테이블별로 임의로 추가해서 사용<br>
     * 
     * require  2021.07.07 solution_create_where, db_result_array
     * @version 2021.07.07
     * 
     * @param  string $table            테이블명
     * @param  array  $where_arr        where문
     * @param  array  $limit_arr        ["start"] - 시작, ["limit"] - 갯수
     * @param  array  $order_by_arr     정렬 배열(기본정렬인경우 빈배열)
     * @param  bool   $delete_flag_bool true - 삭제여부 사용, false - 삭제여부 사용안함
     * @param  string $database         사용 데이터베이스
     * @return array                    테이블 리스트
     */
    function solution_table_list($table, $where_arr = array(), $limit_arr = array(), $order_by_arr = array(), $delete_flag_bool = true, $database = "default") {
        $where_info = $this->solution_create_where($where_arr);
        if ($where_info["where"] != "") {
            $where_info["where"] = " and {$where_info["where"]}";
        }
        if ($table == "admin") {
            
        } else if ($table == "admin_log") {
            
        } else if ($table == "author") {
            
        } else if ($table == "board") {
            $sql = "
                select
                    `b`.`board_idx`,
                    `b`.`member_idx`,
                    `b`.`title`,
                    case
                        when `b`.`admin_flag` = 'y' then '관리자'
                        when `b`.`member_idx` is null then `b`.`name`
                        else `m`.`nickname`
                    end as `name`,
                    `b`.`view_cnt`,
                    `b`.`private_flag`,
                    `b`.`top_flag`,
                    `b`.`admin_flag`,
                    `b`.`insert_date`,
                    `b`.`insert_time`,
                    `b`.`update_date`,
                    `b`.`update_time`
                from
                    `board` as `b`
                left join
                    `member` as `m`
                on
                    `b`.`member_idx` = `m`.`member_idx`
                where
                    `b`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `b`.`board_idx` desc
            ";
        } else if ($table == "category") {
            $sql = "
                select
                    `c`.`category_idx`,
                    `c`.`parent_category_idx`,
                    `c`.`file_name`,
                    `c`.`manager_file_name`,
                    `c`.`title`,
                    `c`.`sort`
                from
                    `category` as `c`
                where
                    `c`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `c`.`sort`,
                    `c`.`category_idx`
            ";
        } else if ($table == "code") {
            $sql = "
                select
                    `c2`.`code_idx`,
                    `c2`.`title`,
                    `c2`.`content`,
                    `c2`.`description`,
                    `c2`.`core_flag`
                from
                    `code` as `c2`
                where
                    `c2`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `c2`.`core_flag` desc,
                    `c2`.`code_idx` desc
            ";
        } else if ($table == "comic") {
            $sql = "
                select
                    `c4`.`comic_idx`,
                    `c4`.`author_idx`,
                    `c4`.`title`,
                    `c4`.`page`,
                    `c4`.`view_cnt`,
                    `c4`.`insert_date`,
                    `c4`.`insert_time`,
                    `a2`.`name` as `author`
                from
                    `comic` as `c4`
                left join
                    `author` as `a2`
                on
                    `c4`.`author_idx` = `a2`.`author_idx`
                left join
                    `category` as `c`
                on
                    `c4`.`category_idx` = `c`.`category_idx`
                where
                    `c4`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `c4`.`comic_idx` desc
            ";
        } else if ($table == "comment") {
            $sql = "
                select
                    `c3`.`comment_idx`,
                    `c3`.`parent_comment_idx`,
                    `c3`.`board_idx`,
                    `c3`.`member_idx`,
                    `c3`.`content`,
                    `c3`.`pw`,
                    case
                        when `c3`.`admin_flag` = 'y' then '관리자'
                        when `c3`.`member_idx` is null then `c3`.`name`
                        else `m`.`nickname`
                    end as `name`,
                    `c3`.`private_flag`,
                    `c3`.`admin_flag`,
                    `c3`.`insert_date`,
                    `c3`.`insert_time`,
                    `c3`.`update_date`,
                    `c3`.`update_time`,
                    `c3`.`delete_flag`
                from
                    `comment` as `c3`
                left join
                    `member` as `m`
                on
                    `c3`.`member_idx` = `m`.`member_idx`
                where
                    `c3`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `c3`.`comment_idx` desc
            ";
        } else if ($table == "connect_log") {
            
        } else if ($table == "file") {
            $sql = "
                select
                    `f`.`file_idx`,
                    `f`.`board_idx`,
                    `f`.`origin_name`,
                    `f`.`server_path`,
                    `f`.`web_path`,
                    `f`.`size`,
                    `f`.`insert_date`,
                    `f`.`insert_time`
                from
                    `file` as `f`
                where
                    `f`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `f`.`file_idx` desc
            ";
        } else if ($table == "image") {
            
        } else if ($table == "member") {
            $sql = "
                select
                    `m`.`member_idx`,
                    `m`.`id`,
                    `m`.`nickname`,
                    `m`.`name`,
                    `m`.`birthday`,
                    `m`.`gender`,
                    `m`.`last_login_date`,
                    `m`.`last_login_time`,
                    `m`.`insert_date`,
                    `m`.`insert_time`,
                    `i`.`server_path`,
                    `i`.`web_path`
                from
                    `member` as `m`
                left join
                    `image` as `i`
                on
                    `m`.`image_idx` = `i`.`image_idx`
                where
                    `m`.`delete_flag` = 'n'
                    {$where_info["where"]}
                order by
                    `m`.`member_idx` desc
            ";
        }
        $binding = $where_info["binding"];
        //삭제여부 사용 안하는경우
        if (!$delete_flag_bool) {
            $sql = str_replace("`delete_flag` = 'n'", "`delete_flag` is not null", $sql);
        }
        //order by 있는경우
        if (is_array($order_by_arr) && count($order_by_arr) > 0) {
            $sql_arr = explode("order by", $sql);
            $sql = $sql_arr[0];
            $sql .= " order by ";
            foreach ($order_by_arr as $k => $v) {
                if ($k > 0) {
                    $sql .= ", ";
                }
                $sql .= $v;
            }
        }
        //limit 있는경우
        if (isset($limit_arr["limit"])) {
            $sql .= " limit " . (isset($limit_arr["start"]) ? "{$limit_arr["start"]}, " : "") . $limit_arr["limit"];
        }
        $result = $this->db_result_array($sql, $binding, $database);
        return $result;
    }

    /**
     * 주 테이블 cnt쿼리<br>
     * 삭제여부는 항상 n<br>
     * 테이블별로 임의로 추가해서 사용
     * 
     * require  2021.07.07 solution_create_where, db_row_array
     * @version 2021.07.07
     * 
     * @param  string $table     테이블명
     * @param  array  $where_arr where문
     * @param  bool   $delete_flag_bool true - 삭제여부 사용, false - 삭제여부 사용안함
     * @param  string $database  사용 데이터베이스
     * @return array             테이블 cnt쿼리 결과
     */
    function solution_table_cnt($table, $where_arr = array(), $delete_flag_bool = true, $database = "default") {
        $where_info = $this->solution_create_where($where_arr);
        if ($where_info["where"] != "") {
            $where_info["where"] = " and {$where_info["where"]}";
        }
        if ($table == "admin") {
            
        } else if ($table == "admin_log") {
            
        } else if ($table == "author") {
            
        } else if ($table == "board") {
            $sql = "
                select
                    count(*) as `cnt`
                from
                    `board` as `b`
                where
                    `b`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "category") {
            
        } else if ($table == "code") {
            $sql = "
                select
                    count(*) as `cnt`
                from
                    `code` as `c2`
                where
                    `c2`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "comic") {
            $sql = "
                select
                    count(*) as `cnt`
                from
                    `comic` as `c4`
                left join
                    `author` as `a2`
                on
                    `c4`.`author_idx` = `a2`.`author_idx`
                left join
                    `category` as `c`
                on
                    `c4`.`category_idx` = `c`.`category_idx`
                where
                    `c4`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "comment") {
            $sql = "
                select
                    count(*) as `cnt`
                from
                    `comment` as `c3`
                where
                    `c3`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        } else if ($table == "connect_log") {
            
        } else if ($table == "file") {
            
        } else if ($table == "image") {
            
        } else if ($table == "member") {
            $sql = "
                select
                    count(*) as `cnt`
                from
                    `member` as `m`
                where
                    `m`.`delete_flag` = 'n'
                    {$where_info["where"]}
            ";
        }
        $binding = $where_info["binding"];
        //삭제여부 사용 안하는경우
        if (!$delete_flag_bool) {
            $sql = str_replace("`delete_flag` = 'n'", "`delete_flag` is not null", $sql);
        }
        $result = $this->db_row_array($sql, $binding, $database);
        return $result;
    }
}
