<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_title"] : "{$data["remap_title"]} - {$data["remap_code"]["homepage_name"]}" ?></title>
        <meta name="description" content="<?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_content"] : $data["remap_content"] ?>">
        <link rel="shortcut icon" href="<?= $data["remap_code"]["public_url"] ?>/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:locale" content="ko_KR">
        <meta property="og:type" content="<?= $data["remap_type"] ?>">
        <meta property="og:title" content="<?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_title"] : $data["remap_title"] ?>">
        <meta property="og:description" content="<?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_content"] : $data["remap_content"] ?>">
        <meta property="og:url" content="<?= $data["remap_url"] ?>">
        <meta property="og:site_name" content="<?= $data["remap_code"]["homepage_name"] ?>">
        <meta property="og:update_time" content="<?= $data["remap_type"] == "website" ? (date("Y-m-d") . "T" . date("H:i:s") . $data["remap_time_zone"]) : (str_replace(" ", "T", $data["remap_article_modified_time"]) . $data["remap_time_zone"]) ?>">
        <meta property="og:image" content="<?= $data["remap_article_image"] == "" ? "{$data["remap_code"]["public_url"]}/logo.png" : $data["remap_article_image"] ?>">
        <?php if ($data["remap_type"] == "article") { ?>
            <meta property="article:tag" content="<?= $data["remap_article_tag"] ?>">
            <meta property="article:section" content="<?= $data["remap_article_section"] ?>">
            <meta property="article:published_time" content="<?= $data["remap_article_published_time"] ?>">
            <meta property="article:modified_time" content="<?= $data["remap_article_modified_time"] ?>">
        <?php } ?>
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_title"] : $data["remap_title"] ?>">
        <meta name="twitter:description" content="<?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_content"] : $data["remap_content"] ?>">
        <meta name="twitter:image" content="<?= $data["remap_article_image"] == "" ? "{$data["remap_code"]["public_url"]}/logo.png" : $data["remap_article_image"] ?>">
        <!-- css -->
        <link rel="stylesheet"  href="https://cdn.jsdelivr.net/gh/moonspam/NanumSquare@1.0/nanumsquare.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/4.0.0/github-markdown.css">
        <link rel="stylesheet" href="<?= $data["remap_code"]["public_url"] ?>/css/ukp.css">
        <!-- /css -->
        <!-- js -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://kit.fontawesome.com/5752b84737.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://malsup.github.com/jquery.form.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
        <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
        <script src="<?= $data["remap_code"]["public_url"] ?>/js/ukp.js"></script>
        <!-- /js -->
        <style>
            /* datepicker css */
            .ui-datepicker select.ui-datepicker-year {
                width: 40%;
            }
            .ui-datepicker select.ui-datepicker-month {
                width: 35%;
            }
            /* bxslider */
            .bx-wrapper {
                border: 0;
                box-shadow: none;
            }
            .bx-wrapper .bx-pager.bx-default-pager a.active {
                background: #15aeff;
            }
            .bx-wrapper .bx-pager.bx-default-pager a {
                background: #aae2ff;
            }
            /* module start */
            .ukp__module_input {
                width: 100%;
            }
            .ukp__module_input > .ukp__content {
                border: 0.0625rem solid #dee2e6;
            }
            .ukp__module_select {
                width: 100%;
            }
            .ukp__module_select > .ukp__select {
                border: 0.0625rem solid #dee2e6;
            }
            .ukp__module_texteditor > .ukp__area {
                border: 0.0625rem solid #dee2e6;
            }
            .ukp__module_file > .ukp__active {
                border: 0.0625rem solid #dee2e6;
            }
            .ukp__module_markdown {
                border: 0.0625rem solid #dee2e6;
            }
            .ukp__module_textarea > .ukp__textarea {
                border: 0.0625rem solid #dee2e6;
            }
            /* module end */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            a {
                color: inherit;
                text-decoration: none;
            }
            html {
                font-family: 'NanumSquare', sans-serif;
                background-color: #f4f6f9;
            }
            .ukp__box_wrap {
                position: relative;
            }
            .ukp__box_wrap > .ukp__pc {
                display: flex;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu {
                flex: none;
                width: 15.625rem;
                background-color: #343a40;
                color: #c2c7d0;
                min-height: 100vh;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__top {
                padding: 0.625rem 0;
                text-align: center;
                border-bottom: 1px solid #4b545c;
                font-size: 0;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__top > .ukp__image {
                display: inline-block;
                vertical-align: middle;
                height: 2.5rem;
                margin-right: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__top > .ukp__content {
                display: inline-block;
                vertical-align: middle;
                font-size: 1.25rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__member {
                padding: 1.25rem;
                position: relative;
                border-bottom: 1px solid #4b545c;
                font-size: 0;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__member > .ukp__image {
                width: 2.5rem;
                height: 2.5rem;
                border-radius: 1.25rem;
                display: inline-block;
                vertical-align: middle;
                margin-right: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__member > .ukp__content {
                vertical-align: middle;
                font-size: 1rem;
                font-weight: bold;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__member > .ukp__href {
                font-size: 0.75rem;
                position: absolute;
                right: 0.625rem;
                bottom: 0.625rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__content {
                padding: 1.25rem 0.625rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__content > .ukp__title {
                font-size: 0.875rem;
                font-weight: bold;
                padding-top: 1.75rem;
                padding-bottom: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__content > .ukp__href {
                font-size: 1rem;
                display: block;
                padding: 0.875rem;
                border-radius: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__content > .ukp__href:hover {
                background-color: #c2c7d0;
                color: #343a40;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__menu > .ukp__content > .ukp__href.ukp__active {
                background-color: #c2c7d0;
                color: #343a40;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__content {
                flex: 1;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__content > .ukp__header {
                background-color: white;
                line-height: 3.75rem;
                font-size: 1rem;
                font-weight: bold;
                padding: 0 1.25rem;
                border-bottom: 1px solid #dee2e6;
            }
            .ukp__box_wrap > .ukp__mobile {
                display: none;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header {
                background-color: white;
                font-size: 1rem;
                font-weight: bold;
                padding: 0 1.25rem;
                border-bottom: 1px solid #dee2e6;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__left {
                line-height: 3.75rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__right {
                height: 2.5rem;
                margin-top: 0.625rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu {
                position: fixed;
                z-index: 9;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__background {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.5);
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu {
                flex: none;
                width: 15.625rem;
                background-color: #343a40;
                color: #c2c7d0;
                height: 100%;
                overflow-y: auto;
                position: absolute;
                top: 0;
                right: 0;
                z-index: 1;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__top {
                padding: 0.625rem 0;
                text-align: center;
                border-bottom: 1px solid #4b545c;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__top > .ukp__image {
                display: inline-block;
                vertical-align: middle;
                height: 2.5rem;
                margin-right: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__top > .ukp__content {
                display: inline-block;
                vertical-align: middle;
                font-size: 1.25rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__member {
                padding: 1.25rem;
                position: relative;
                border-bottom: 1px solid #4b545c;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__member > .ukp__image {
                width: 2.5rem;
                height: 2.5rem;
                border-radius: 1.25rem;
                display: inline-block;
                vertical-align: middle;
                margin-right: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__member > .ukp__content {
                vertical-align: middle;
                font-size: 1rem;
                font-weight: bold;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__member > .ukp__href {
                font-size: 0.75rem;
                position: absolute;
                right: 0.625rem;
                bottom: 0.625rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__content {
                padding: 1.25rem 0.625rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__content > .ukp__title {
                font-size: 0.875rem;
                font-weight: bold;
                padding-top: 1.75rem;
                padding-bottom: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__content > .ukp__href {
                font-size: 1rem;
                display: block;
                padding: 0.875rem;
                border-radius: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__content > .ukp__href:hover {
                background-color: #c2c7d0;
                color: #343a40;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__menu > .ukp__content > .ukp__href.ukp__active {
                background-color: #c2c7d0;
                color: #343a40;
            }
            @media screen and (max-width: 1024px) {
                .ukp__box_wrap > .ukp__pc {
                    display: none;
                }
                .ukp__box_wrap > .ukp__mobile {
                    display: block;
                }
            }
        </style>
    </head>
    <body>
        <div class="ukp__box_wrap">
            <div class="ukp__pc">
                <?php if ($data["remap_header_bool"]) { ?>
                    <div class="ukp__menu">
                        <div class="ukp__top">
                            <img src="<?= $data["remap_code"]["public_url"] ?>/logo.png" class="ukp__image">
                            <span class="ukp__content"><?= $data["remap_code"]["homepage_name"] ?></span>
                        </div>
                        <div class="ukp__member">
                            <img src="image/user.png" class="ukp__module_proportion ukp__image">
                            <span class="ukp__content"><?= $data["remap_admin_info"]["id"] ?></span>
                            <a href="#" class="ukp__href" onclick="return ukp__js_wrap.logout()">로그아웃</a>
                        </div>
                        <div class="ukp__content">
                            <!--<div class="ukp__title">메뉴</div>-->
                            <a href="main.php" class="ukp__href<?= $data["remap_base"] == "main.php" ? " ukp__active" : "" ?>">홈</a>
                            <a href="category_list.php" class="ukp__href">메뉴관리</a>
                            <a href="comment_list.php" class="ukp__href">댓글관리</a>
                            <a href="member_list.php" class="ukp__href">회원관리</a>
                            <a href="code_list.php" class="ukp__href">코드관리</a>
                            <a href="file_list.php" class="ukp__href">파일관리</a>
                            <a href="image_list.php" class="ukp__href">이미지관리</a>
                            <a href="stat.php" class="ukp__href">통계</a>
                            <a href="admin_log_list.php" class="ukp__href">변경이력</a>
                        </div>
                    </div>
                <?php } ?>
                <div class="ukp__content">
                    <?php if ($data["remap_header_bool"]) { ?>
                        <div class="ukp__header">
                            <?= $data["remap_header_text"] ?>
                        </div>
                    <?php } ?>
                    <?php require_once "{$data["remap_dir"]}/_view/{$data["remap_base"]}"; ?>
                    <?php if ($data["remap_footer_bool"]) { ?>
                        <div class="ukp__footer"></div>
                    <?php } ?>
                </div>
            </div>
            <div class="ukp__mobile">
                <?php if ($data["remap_header_bool"]) { ?>
                    <div class="ukp__header ukp__module_layout_float">
                        <div class="ukp__left"><?= $data["remap_header_text"] ?></div>
                        <img src="image/bars.svg" alt="" class="ukp__right" onclick="ukp__js_wrap.menu_toggle()">
                    </div>
                    <div class="ukp__menu ukp__js_wrap_menu" style="display: none;">
                        <div class="ukp__background" onclick="ukp__js_wrap.menu_toggle()"></div>
                        <div class="ukp__menu">
                            <div class="ukp__top">
                                <img src="<?= $data["remap_code"]["public_url"] ?>/logo.png" class="ukp__image">
                                <span class="ukp__content"><?= $data["remap_code"]["homepage_name"] ?></span>
                            </div>
                            <div class="ukp__member">
                                <img src="image/user.png" class="ukp__module_proportion ukp__image">
                                <span class="ukp__content"><?= $data["remap_admin_info"]["id"] ?></span>
                                <a href="#" class="ukp__href" onclick="return ukp__js_wrap.logout()">로그아웃</a>
                            </div>
                            <div class="ukp__content">
                                <!--<div class="ukp__title">메뉴</div>-->
                                <a href="main.php" class="ukp__href<?= $data["remap_base"] == "main.php" ? " ukp__active" : "" ?>">홈</a>
                                <a href="category_list.php" class="ukp__href">메뉴관리</a>
                                <a href="comment_list.php" class="ukp__href">댓글관리</a>
                                <a href="member_list.php" class="ukp__href">회원관리</a>
                                <a href="code_list.php" class="ukp__href">코드관리</a>
                                <a href="file_list.php" class="ukp__href">파일관리</a>
                                <a href="image_list.php" class="ukp__href">이미지관리</a>
                                <a href="stat.php" class="ukp__href">통계</a>
                                <a href="admin_log_list.php" class="ukp__href">변경이력</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="ukp__content">
                    <?php require_once "{$data["remap_dir"]}/_view/" . str_replace(".php", "__m.php", $data["remap_base"]); ?>
                </div>
                <?php if ($data["remap_footer_bool"]) { ?>
                    <div class="ukp__footer"></div>
                <?php } ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $(".ukp__js_wrap_datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeYear: true,
                    changeMonth: true,
                    showMonthAfterYear: true,
                    minDate: "-100Y",
                    maxDate: "0",
                    yearRange: "-100:+0",
                    yearSuffix: "년&nbsp;&nbsp;",
                    dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
                    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월']
                });
            });
            var ukp__js_wrap = {
                menu_toggle: function () {
                    $(".ukp__js_wrap_menu").toggle();
                },
                logout: function () {
                    if (!confirm("정말로 로그아웃 하시겠습니까?")) {
                        return false;
                    }
                    ukp__js_common.ajax("_logout.php", {

                    }, function (data) {
                        location.replace("index.php");
                    });
                    return false;
                }
            };
        </script>
    </body>
</html>