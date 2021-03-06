<style>
    .ukp__box_content {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_content > .ukp__form {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
        max-width: 31.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__form > .ukp__row {
        padding-bottom: 1.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__content {
        font-size: 0.75rem;
        font-weight: bold;
        padding: 1.25rem;
        text-align: center;
    }
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__search > .ukp__row {
        font-size: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__search > .ukp__row > .ukp__text {
        padding: 0.3125rem;
        font-size: 0.875rem;
        display: inline-block;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__form > .ukp__author > .ukp__module_input > .ukp__content > .ukp__after {
        padding: 0 0.625rem;
    }
    .ukp__box_content > .ukp__form > .ukp__author > .ukp__module_input > .ukp__content > .ukp__after > .ukp__image {
        width: 1.25rem;
        display: block;
        cursor: pointer;
    }
    .ukp__box_content > .ukp__form > .ukp__check_list {
        padding-bottom: 1.25rem;
        font-size: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__check_list > .ukp__module_checkbox {
        margin-right: 0.625rem;
    }
    .ukp__box_content > .ukp__form > .ukp__btn_list {
        text-align: right;
        font-size: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
</style>
<div class="ukp__box_content">
    <form class="ukp__form ukp__js_content_form" method="post" action="_insert_comic.php">
        <input type="hidden" name="category_idx" value="<?= $data["category"]["category_idx"] ?>">
        <div class="ukp__title">
            ?????? ??????
        </div>
        <div class="ukp__row ukp__author">
            <div class="ukp__module_input">
                <div class="ukp__label">??????</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input ukp__js_content_author" type="text" name="author" required="">
                    <div class="ukp__after">
                        <img src="image/search.svg" alt="" class="ukp__image" onclick="ukp__js_content.search()">
                    </div>
                </div>
            </div>
            <div class="ukp__search ukp__js_content_search_content"></div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">??????</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="title" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">?????????</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="tel" name="page" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">????????????url</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="download_url">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="history.back()">????????????</button>
            <button class="ukp__module_btn" type="submit">??????</button>
        </div>
    </form>
    <div class="ukp__js_content_search_row" style="display: none;">
        <div class="ukp__row">
            <div class="ukp__text">__php__comic_idx__</div>
            <div class="ukp__text">__php__title__</div>
            <div class="ukp__text">__php__page__</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_content_form", function ($form) {
            if (!confirm("?????????????????????????")) {
                return false;
            }
        }, function (data) {
            if (data == "1") {
                alert("????????????");
            } else if(data == "2") {
                alert("?????? ????????? ???????????????.");
            } else if (data == "999") {
                location.reload();
            }
        });
    });
    var ukp__js_content = {
        search: function () {
            $(".ukp__js_content_search_content").html("");
            var author = $(".ukp__js_content_author").val();
            ukp__js_common.ajax("_comic_list.php", {
                author: author
            }, function (data) {
                var json = JSON.parse(data);
                if (json.list.length == 0) {
                    $(".ukp__js_content_search_content").addClass("ukp__content");
                    $(".ukp__js_content_search_content").html("??????????????? ????????????.");
                    return;
                }
                $(".ukp__js_content_search_content").removeClass("ukp__content");
                ukp__js_common.add_list(".ukp__js_content_search_row", ".ukp__js_content_search_content", json.list);
            });
        }
    };
</script>