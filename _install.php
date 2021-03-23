<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dir = dirname(__FILE__);
require_once "{$dir}/inc/ukp.php";
$ukp = new Ukp();

$db_info = $ukp->common_get_field("db_info");
$prefix = $db_info["default"]["prefix"];

//캐릭터셋별 설정
if($db_info["default"]["character_set"] == "utf8mb4") {
    $engine = "InnoDB";
    $charset = "utf8mb4";
    $collate = "utf8mb4_unicode_ci";
} else if($db_info["default"]["character_set"] == "utf8") {
    $engine = "MyISAM";
    $charset = "utf8";
    $collate = "utf8_general_ci";
} else if($db_info["default"]["character_set"] == "euckr") {
    $engine = "MyISAM";
    $charset = "euckr";
    $collate = "euckr_korean_ci";
} else {
    echo "설치실패";
    exit;
}

//테이블 생성문
$sql = "
CREATE TABLE if not exists {$prefix}admin
(
    `admin_idx`    int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `id`           varchar(191)    NULL        COMMENT '아이디', 
    `pw`           varchar(191)    NULL        COMMENT '비밀번호', 
    `insert_date`  date            NULL        COMMENT '입력일', 
    `insert_time`  time            NULL        COMMENT '입력시', 
    `delete_flag`  varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`id`),
    PRIMARY KEY (admin_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='관리자(a)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}admin_log
(
    `admin_log_idx`  int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `admin_idx`      int(11)         NULL        COMMENT '관리자', 
    `ip`             varchar(191)    NULL        COMMENT '아이피', 
    `user_agent`     text            NULL        COMMENT '유저에이전트', 
    `description`    varchar(191)    NULL        COMMENT '설명', 
    `insert_date`    date            NULL        COMMENT '입력일', 
    `insert_time`    time            NULL        COMMENT '입력시', 
    `delete_flag`    varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`admin_idx`),
    index (`insert_date`),
    PRIMARY KEY (admin_log_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='관리자이력(al)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}board
(
    `board_idx`     int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `category_idx`  int(11)         NULL        COMMENT '카테고리', 
    `member_idx`    int(11)         NULL        COMMENT '회원', 
    `image_idx`     int(11)         NULL        COMMENT '썸네일', 
    `title`         varchar(191)    NULL        COMMENT '제목', 
    `content`       text            NULL        COMMENT '내용', 
    `pw`            varchar(191)    NULL        COMMENT '비밀번호(비회원)', 
    `name`          varchar(191)    NULL        COMMENT '작성자명(비회원)', 
    `view_cnt`      int(11)         NULL        DEFAULT 0 COMMENT '조회수', 
    `private_flag`  varchar(1)      NULL        DEFAULT 'n' COMMENT '비공개여부', 
    `top_flag`      varchar(1)      NULL        DEFAULT 'n' COMMENT '상위노출여부', 
    `admin_flag`    varchar(1)      NULL        DEFAULT 'n' COMMENT '관리자작성여부', 
    `insert_date`   date            NULL        COMMENT '입력일', 
    `insert_time`   time            NULL        COMMENT '입력시', 
    `update_date`   date            NULL        COMMENT '수정일', 
    `update_time`   time            NULL        COMMENT '수정시', 
    `delete_flag`   varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`category_idx`),
    index (`image_idx`),
    index (`member_idx`),
    PRIMARY KEY (board_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='게시판(b)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}category
(
    `category_idx`         int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `parent_category_idx`  int(11)         NULL        COMMENT '상위카테고리', 
    `category_type_idx`    int(11)         NULL        COMMENT '카테고리타입', 
    `title`                varchar(191)    NULL        COMMENT '카테고리명', 
    `sort`                 int(11)         NULL        DEFAULT 0 COMMENT '정렬순서', 
    `board_flag`           varchar(1)      NULL        DEFAULT 'n' COMMENT '게시글작성flag', 
    `comment_flag`         varchar(1)      NULL        DEFAULT 'n' COMMENT '댓글작성flag', 
    `editor_flag`          varchar(1)      NULL        DEFAULT 'n' COMMENT '에디터사용flag', 
    `file_flag`            varchar(1)      NULL        DEFAULT 'n' COMMENT '파일첨부사용flag', 
    `insert_date`          date            NULL        COMMENT '입력일', 
    `insert_time`          time            NULL        COMMENT '입력시', 
    `delete_flag`          varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`parent_category_idx`),
    index (`category_type_idx`),
    PRIMARY KEY (category_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='카테고리(c)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}category_type
(
    `category_type_idx`  int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `file_name`          varchar(191)    NULL        COMMENT '시작파일명', 
    `manager_file_name`  varchar(191)    NULL        COMMENT '관리자시작파일명', 
    `title`              varchar(191)    NULL        COMMENT '타입명', 
    `board_flag_list`    varchar(191)    NULL        COMMENT '게시글작성flag리스트', 
    `comment_flag_list`  varchar(191)    NULL        COMMENT '댓글작성flag리스트', 
    `editor_flag_list`   varchar(191)    NULL        COMMENT '에디터사용flag리스트', 
    `file_flag_list`     varchar(191)    NULL        COMMENT '파일첨부사용flag리스트', 
    `insert_date`        date            NULL        COMMENT '입력일', 
    `insert_time`        time            NULL        COMMENT '입력시', 
    `delete_flag`        varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    PRIMARY KEY (category_type_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='카테고리타입(ct)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}code
(
    `code_idx`     int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `title`        varchar(191)    NULL        COMMENT '키', 
    `content`      varchar(191)    NULL        COMMENT '값', 
    `description`  varchar(191)    NULL        COMMENT '설명', 
    `core_flag`    varchar(1)      NULL        DEFAULT 'n' COMMENT '필수코드여부', 
    `insert_date`  date            NULL        COMMENT '입력일', 
    `insert_time`  time            NULL        COMMENT '입력시', 
    `delete_flag`  varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`title`),
    PRIMARY KEY (code_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='코드(c2)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}comment
(
    `comment_idx`         int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `parent_comment_idx`  int(11)         NULL        COMMENT '상위댓글', 
    `board_idx`           int(11)         NULL        COMMENT '게시판', 
    `member_idx`          int(11)         NULL        COMMENT '회원', 
    `content`             text            NULL        COMMENT '내용', 
    `pw`                  varchar(191)    NULL        COMMENT '비밀번호(비회원)', 
    `name`                varchar(191)    NULL        COMMENT '작성자명(비회원)', 
    `private_flag`        varchar(1)      NULL        DEFAULT 'n' COMMENT '비공개여부',
    `admin_flag`          varchar(1)      NULL        DEFAULT 'n' COMMENT '관리자작성여부', 
    `insert_date`         date            NULL        COMMENT '입력일', 
    `insert_time`         time            NULL        COMMENT '입력시', 
    `update_date`         date            NULL        COMMENT '수정일', 
    `update_time`         time            NULL        COMMENT '수정시', 
    `delete_flag`         varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`board_idx`),
    index (`member_idx`),
    index (`parent_comment_idx`),
    PRIMARY KEY (comment_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='댓글(c3)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}connect_log
(
    `connect_log_idx`  int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `member_idx`       int(11)         NULL        COMMENT '회원', 
    `ip`               varchar(191)    NULL        COMMENT '아이피', 
    `start_page`       text            NULL        COMMENT '시작페이지', 
    `referer`          text            NULL        COMMENT '이전페이지', 
    `user_agent`       text            NULL        COMMENT '유저에이전트', 
    `device_flag`      varchar(1)      NULL        DEFAULT 'n' COMMENT 'p-pc, m-mobile, n-bot', 
    `connect_cnt`      int(11)         NULL        DEFAULT 0 COMMENT '접속횟수', 
    `insert_date`      date            NULL        COMMENT '입력일', 
    `insert_time`      time            NULL        COMMENT '입력시', 
    `delete_flag`      varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`insert_date`),
    index (`ip`),
    index (`member_idx`),
    PRIMARY KEY (connect_log_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='접속로그(cl)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}file
(
    `file_idx`     int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `board_idx`    int(11)         NULL        COMMENT '게시판', 
    `origin_name`  varchar(191)    NULL        COMMENT '원본파일명', 
    `server_path`  varchar(191)    NULL        COMMENT '서버파일경로', 
    `web_path`     varchar(191)    NULL        COMMENT '웹파일경로', 
    `size`         int(11)         NULL        COMMENT '용량', 
    `insert_date`  date            NULL        COMMENT '입력일', 
    `insert_time`  time            NULL        COMMENT '입력시', 
    `delete_flag`  varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`board_idx`),
    PRIMARY KEY (file_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='파일첨부(f)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}image
(
    `image_idx`    int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `idx`          int(11)         NULL        COMMENT 'fk', 
    `type_flag`    varchar(1)      NULL        DEFAULT 'n' COMMENT 'b-board, c-comment', 
    `origin_name`  varchar(191)    NULL        COMMENT '원본파일명', 
    `server_path`  varchar(191)    NULL        COMMENT '서버파일경로', 
    `web_path`     varchar(191)    NULL        COMMENT '웹파일경로', 
    `size`         int(11)         NULL        DEFAULT 0 COMMENT '용량', 
    `insert_date`  date            NULL        COMMENT '입력일', 
    `insert_time`  time            NULL        COMMENT '입력시', 
    `delete_flag`  varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`idx`),
    index (`web_path`),
    PRIMARY KEY (image_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='업로드이미지(i)'
";
$ukp->db_query($sql);
$sql = "
CREATE TABLE if not exists {$prefix}member
(
    `member_idx`       int(11)         NOT NULL    AUTO_INCREMENT COMMENT 'pk', 
    `image_idx`        int(11)         NULL        COMMENT '프로필이미지', 
    `id`               varchar(191)    NULL        COMMENT '아이디', 
    `pw`               varchar(191)    NULL        COMMENT '비밀번호', 
    `nickname`         varchar(191)    NULL        COMMENT '닉네임', 
    `name`             varchar(191)    NULL        COMMENT '이름', 
    `birthday`         date            NULL        COMMENT '생년월일', 
    `gender`           varchar(1)      NULL        DEFAULT 'n' COMMENT '성별', 
    `last_login_date`  date            NULL        COMMENT '마지막로그인일', 
    `last_login_time`  time            NULL        COMMENT '마지막로그인시', 
    `insert_date`      date            NULL        COMMENT '입력일', 
    `insert_time`      time            NULL        COMMENT '입력시', 
    `delete_flag`      varchar(1)      NULL        DEFAULT 'n' COMMENT '삭제여부', 
    index (`id`),
    index (`image_idx`),
    PRIMARY KEY (member_idx)
) ENGINE={$engine} DEFAULT CHARSET={$charset} COLLATE={$collate} COMMENT='회원(m)'
";
$ukp->db_query($sql);

//코드, 관리자계정 설정
$sql = "
    insert into `admin` (
        `id`,
        `pw`,
        `insert_date`,
        `insert_time`
    )
    select
        ?,
        ?,
        now(),
        now()
    from
        dual
    where not exists (
        select
            *
        from
            `admin`
        limit
            1
    )
";
$binding = array(
    "admin",
    "*" . hash("sha256", "1234")
);
$ukp->db_query($sql, $binding);
//코드, 설명
$code_arr = array(
    "smtp_google_email" => "구글smtp 이메일",
    "smtp_google_password" => "구글smtp 비밀번호",
    "open_date" => "홈페이지 오픈일(YYYY-mm-dd)",
    "homepage_name" => "홈페이지명",
    "homepage_title" => "홈페이지 title태그",
    "homepage_content" => "홈페이지 설명",
    "address" => "주소",
    "tel" => "연락처",
    "owner" => "대표자",
    "email" => "이메일",
    "public_url" => "public 폴더 web경로"
);
foreach($code_arr as $k => $v) {
    $content = "";
    if($k == "public_url") {
        $content = "../public";
    }
    $sql = "
        insert into `code` (
            `title`,
            `content`,
            `description`,
            `core_flag`,
            `insert_date`,
            `insert_time`
        )
        select
            ?,
            ?,
            ?,
            'y',
            now(),
            now()
        from
            dual
        where not exists (
            select
                *
            from
                `code`
            where
                `title` = ?
        )
    ";
    $binding = array(
        $k,
        $content,
        $v,
        $k
    );
    $ukp->db_query($sql, $binding);
}

echo "설치완료";