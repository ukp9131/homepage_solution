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
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            html {
                font-family: 'NanumSquare', sans-serif;
                background-color: #f4f6f9;
            }
            a {
                color: inherit;
                text-decoration: none;
            }
            .ukp__box_wrap {
                position: relative;
            }
            .ukp__box_wrap > .ukp__pc {
                display: block;
                min-height: 100vh;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header {
                position: relative;
                text-align: center;
                background-color: white;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__logo {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
                font-size: 0;
                padding: 1.25rem;
                cursor: pointer;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__logo > .ukp__image {
                height: 2.5rem;
                display: inline-block;
                vertical-align: middle;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__logo > .ukp__text {
                font-size: 1.5rem;
                font-weight: bold;
                vertical-align: middle;
                display: inline-block;
                padding-left: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu {
                position: relative;
                font-size: 0;
                padding: 1.25rem 0;
                height: 5rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row {
                display: inline-block;
                cursor: pointer;
                position: relative;
                overflow: hidden;
                height: 2.5rem;
                vertical-align: top;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row:hover {
                height: auto;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row > .ukp__title {
                font-size: 1rem;
                font-weight: bold;
                line-height: 2.5rem;
                padding: 0 1rem;
                display: block;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row > .ukp__title > .ukp__image {
                display: inline-block;
                height: 1.25rem;
                vertical-align: middle;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row > .ukp__list {
                border: 0.0625rem solid #dee2e6;
                background-color: white;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row > .ukp__list > .ukp__row {
                font-size: 0.875rem;
                font-weight: bold;
                line-height: 2.5rem;
                padding: 0 1rem;
                display: block;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__menu > .ukp__row > .ukp__list > .ukp__row:hover {
                background-color: black;
                color: white;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__right {
                position: absolute;
                top: 0;
                right: 0;
                z-index: 1;
                font-size: 0;
                color: #343a40;
                padding: 1.25rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__header > .ukp__right > .ukp__href {
                font-size: 0.75rem;
                font-weight: bold;
                text-decoration: underline;
                line-height: 2.5rem;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__footer {
                background-color: white;
                text-align: center;
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 1.25rem;
            }.ukp__box_wrap > .ukp__pc > .ukp__footer.ukp__background {
                position: relative;
                visibility: hidden;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__footer > .ukp__logo {
                font-size: 0;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__footer > .ukp__logo > .ukp__image {
                height: 1.875rem;
                display: inline-block;
                vertical-align: middle;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__footer > .ukp__logo > .ukp__text {
                font-size: 1.5rem;
                display: inline-block;
                vertical-align: middle;
                padding-left: 0.3125rem;
                font-weight: bold;
            }
            .ukp__box_wrap > .ukp__pc > .ukp__footer > .ukp__row {
                font-size: 0.875rem;
                padding-top: 0.25rem;
            }
            .ukp__box_wrap > .ukp__mobile {
                display: none;
                min-height: 100vh;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header {
                padding: 0.625rem;
                font-size: 0;
                background-color: white;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header::after {
                content: "";
                display: block;
                clear: both;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__logo {
                float: left;
                cursor: pointer;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__logo > .ukp__image {
                height: 1.875rem;
                display: inline-block;
                vertical-align: middle;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__logo > .ukp__text {
                vertical-align: middle;
                font-size: 1.25rem;
                display: inline-block;
                padding-left: 0.375rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__href_list {
                float: right;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__href_list > .ukp__href {
                line-height: 1.875rem;
                font-size: 0.75rem;
                font-weight: bold;
                text-decoration: underline;
                color: #343a40;
                display: inline-block;
                vertical-align: middle;
                margin-left: 0.375rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__header > .ukp__menu {
                float: right;
                height: 1.875rem;
                margin-left: 0.375rem;
                display: block;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__background {
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.5);
                z-index: 0;
                position: relative;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__list {
                background-color: white;
                z-index: 1;
                position: absolute;
                top: 0;
                right: 0;
                width: 15.625rem;
                height: 100%;
                overflow: auto;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__list > .ukp__title {
                font-size: 1.125rem;
                font-weight: bold;
                padding: 0.625rem;
                line-height: 1.875rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__list > .ukp__module_layout_float {
                display: block;
                padding: 0.625rem 1.25rem;
                font-size: 0.875rem;
                line-height: 1.875rem;
                font-weight: bold;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__list > .ukp__module_layout_float > .ukp__right {
                padding-top: 0.3125rem;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__list > .ukp__module_layout_float > .ukp__right > .ukp__image {
                height: 1.25rem;
                display: block;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__menu > .ukp__list > .ukp__child {
                background-color: #c2c7d0;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__footer {
                background-color: white;
                padding: 0.625rem 0;
                font-size: 0;
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                text-align: center;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__footer.ukp__background {
                position: relative;
                visibility: hidden;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__footer > .ukp__logo {
                font-size: 0;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__footer > .ukp__logo > .ukp__image {
                display: inline-block;
                height: 1.875rem;
                vertical-align: middle;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__footer > .ukp__logo > .ukp__text {
                padding-left: 0.25rem;
                font-size: 1.125rem;
                display: inline-block;
                vertical-align: middle;
                font-weight: bold;
            }
            .ukp__box_wrap > .ukp__mobile > .ukp__footer > .ukp__row {
                font-size: 0.75rem;
                padding-top: 0.25rem;
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
                    <div class="ukp__header">
                        <div class="ukp__logo" onclick="location.href = 'index.php'">
                            <img src="<?= "{$data["remap_code"]["public_url"]}/logo.png" ?>" alt="" class="ukp__image">
                            <span class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?></span>
                        </div>
                        <div class="ukp__menu">
                            <?php foreach ($data["remap_category"] as $temp) { ?>
                                <dlv class="ukp__row">
                                    <a href="<?= "{$temp["file_name"]}?category_idx={$temp["category_idx"]}" ?>" class="ukp__title"<?= count($temp["child"]) > 0 ? ' onclick="return false;"' : "" ?>>
                                        <?= $temp["title"] ?>
                                        <?php if (count($temp["child"]) > 0) { ?>
                                            <img src="image/angle-down.svg" alt="" class="ukp__image">
                                        <?php } ?>
                                    </a>
                                    <?php if (count($temp["child"]) > 0) { ?>
                                        <div class="ukp__list">
                                            <?php foreach ($temp["child"] as $temp2) { ?>
                                                <a href="<?= "{$temp2["file_name"]}?category_idx={$temp2["category_idx"]}" ?>" class="ukp__row"><?= $temp2["title"] ?></a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </dlv>
                            <?php } ?>
                        </div>
                        <div class="ukp__right">
                            <a href="login.php" class="ukp__href">로그인</a>
                        </div>
                    </div>
                <?php } ?>
                <div class="ukp__content">
                    <?php require_once "{$data["remap_dir"]}/_view/{$data["remap_base"]}"; ?>
                </div>
                <?php if ($data["remap_footer_bool"]) { ?>
                    <div class="ukp__footer">
                        <div class="ukp__logo">
                            <img src="<?= "{$data["remap_code"]["public_url"]}/logo.png" ?>" alt="" class="ukp__image">
                            <div class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?></div>
                        </div>
                        <div class="ukp__row">
                            <?= $data["remap_code"]["address"] ?> | tel: <?= $data["remap_code"]["tel"] ?> | 대표자: <?= $data["remap_code"]["owner"] ?>
                        </div>
                        <div class="ukp__row">
                            Copyright &copy; <?= $data["remap_code"]["homepage_name"] ?>. All rights reserved. | <?= $data["remap_code"]["email"] ?>
                        </div>
                    </div>
                    <div class="ukp__footer ukp__background">
                        <div class="ukp__logo">
                            <img src="<?= "{$data["remap_code"]["public_url"]}/logo.png" ?>" alt="" class="ukp__image">
                            <div class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?></div>
                        </div>
                        <div class="ukp__row">
                            <?= $data["remap_code"]["address"] ?> | tel: <?= $data["remap_code"]["tel"] ?> | 대표자: <?= $data["remap_code"]["owner"] ?>
                        </div>
                        <div class="ukp__row">
                            Copyright &copy; <?= $data["remap_code"]["homepage_name"] ?>. All rights reserved. | <?= $data["remap_code"]["email"] ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="ukp__mobile">
                <?php if ($data["remap_header_bool"]) { ?>
                    <div class="ukp__header">
                        <div class="ukp__logo" onclick="location.href='index.php';">
                            <img src="<?= "{$data["remap_code"]["public_url"]}/logo.png" ?>" alt="" class="ukp__image">
                            <div class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?></div>
                        </div>
                        <img src="image/bars.svg" alt="" class="ukp__menu">
                        <div class="ukp__href_list">
                            <a href="login.php" class="ukp__href">로그인</a>
                        </div>
                    </div>
                    <div class="ukp__menu ukp__js_wrap_menu">
                        <div class="ukp__background" onclick="ukp__js_wrap.mobile_menu_toggle()"></div>
                        <div class="ukp__list">
                            <div class="ukp__title">
                                메뉴
                            </div>
                            <?php foreach ($data["remap_category"] as $temp) { ?>
                                <a href="<?= "{$temp["file_name"]}?category_idx={$temp["category_idx"]}" ?>" class="ukp__module_layout_float"<?= count($temp["child"]) > 0 ? ' onclick="return false;"' : "" ?>>
                                    <div class="ukp__left"><?= $temp["title"] ?></div>
                                    <?php if (count($temp["child"]) > 0) { ?>
                                        <div class="ukp__right">
                                            <img src="image/angle-down.svg" alt="" class="ukp__image">
                                        </div>
                                    <?php } ?>
                                </a>
                                <?php foreach ($temp["child"] as $temp2) { ?>
                                    <a href="<?= "{$temp2["file_name"]}?category_idx={$temp2["category_idx"]}" ?>" class="ukp__module_layout_float ukp__child">
                                        <div class="ukp__left"><?= $temp2["title"] ?></div>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="ukp__content">
                    <?php require_once "{$data["remap_dir"]}/_view/" . str_replace(".php", "__m.php", $data["remap_base"]); ?>
                </div>
                <?php if ($data["remap_footer_bool"]) { ?>
                    <div class="ukp__footer">
                        <div class="ukp__logo">
                            <img src="<?= "{$data["remap_code"]["public_url"]}/logo.png" ?>" alt="" class="ukp__image">
                            <div class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?></div>
                        </div>
                        <div class="ukp__row">
                            <?= $data["remap_code"]["address"] ?>
                        </div>
                        <div class="ukp__row">
                            tel: <?= $data["remap_code"]["tel"] ?> | 대표자: <?= $data["remap_code"]["owner"] ?>
                        </div>
                        <div class="ukp__row">
                            <?= $data["remap_code"]["email"] ?>
                        </div>
                        <div class="ukp__row">
                            Copyright &copy; <?= $data["remap_code"]["homepage_name"] ?>. All rights reserved.
                        </div>
                    </div>
                    <div class="ukp__footer ukp__background">
                        <div class="ukp__logo">
                            <img src="<?= "{$data["remap_code"]["public_url"]}/logo.png" ?>" alt="" class="ukp__image">
                            <div class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?></div>
                        </div>
                        <div class="ukp__row">
                            <?= $data["remap_code"]["address"] ?>
                        </div>
                        <div class="ukp__row">
                            tel: <?= $data["remap_code"]["tel"] ?> | 대표자: <?= $data["remap_code"]["owner"] ?>
                        </div>
                        <div class="ukp__row">
                            <?= $data["remap_code"]["email"] ?>
                        </div>
                        <div class="ukp__row">
                            Copyright &copy; <?= $data["remap_code"]["homepage_name"] ?>. All rights reserved.
                        </div>
                    </div>
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
                mobile_menu_toggle: function () {
                    $(".ukp__js_wrap_menu").toggle();
                }
            };
        </script>
    </body>
</html>