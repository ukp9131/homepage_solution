<!DOCTYPE html>
<html lang="ko">
    <head>
        <title><?= $data["remap_type"] == "website" ? $data["remap_code"]["homepage_title"] : "{$data["remap_title"]} - {$data["remap_code"]["homepage_name"]}" ?></title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="<?= $data["remap_code"]["public_url"] ?>/favicon.ico">
        <meta charset="utf-8">
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
            }
            .ukp__box_wrap > .ukp__pc > .ukp__content {
                flex: 1;
            }
            .ukp__box_wrap > .ukp__mobile {
                display: none;
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
                <?php if ($data["remap_menu_bool"]) { ?>
                    <div class="ukp__menu">
                        <div class="ukp__top">
                            <img src="<?= $data["code"]["public_url"] ?>/logo.png" class="ukp__image">
                            <span class="ukp__content"><?= $data["code"]["homepage_name"] ?></span>
                        </div>
                        <div class="ukp__member">
                            <img src="<?= $data["code"]["public_url"] ?>/logo.png" class="ukp__image">
                            <span class="ukp__content"><?= $data["remap_admin_info"]["id"] ?></span>
                            <a href="#" class="ukp__href" onclick="return ukp__js_wrap.logout()">로그아웃</a>
                        </div>
                        <div class="ukp__content">
                            <a href="main.php" class="ukp__href">홈</a>
                            <a href="category_type_list.php" class="ukp__href">메뉴타입관리</a>
                            <a href="category_list.php" class="ukp__href">메뉴관리</a>
                            <a href="board_list.php" class="ukp__href">게시판관리</a>
                            <a href="comment_list.php" class="ukp__href">댓글관리</a>
                            <a href="member_list.php" class="ukp__href">회원관리</a>
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
                    <div class="ukp__header"></div>
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
            var ukp__js_wrap = {

            };
        </script>
    </body>
</html>