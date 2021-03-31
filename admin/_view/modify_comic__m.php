<style>
    .ukp__box_mobile {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
    }
    .ukp__box_mobile > .ukp__form > .ukp__row {
        padding-bottom: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__row > .ukp__content {
        font-size: 0.75rem;
        font-weight: bold;
        padding: 1.25rem;
        text-align: center;
    }
    .ukp__box_mobile > .ukp__form > .ukp__row > .ukp__search > .ukp__row {
        font-size: 0;
    }
    .ukp__box_mobile > .ukp__form > .ukp__row > .ukp__search > .ukp__row > .ukp__text {
        padding: 0.3125rem;
        font-size: 0.875rem;
        display: inline-block;
        vertical-align: middle;
    }
    .ukp__box_mobile > .ukp__form > .ukp__author > .ukp__module_input > .ukp__content > .ukp__after {
        padding: 0 0.625rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__author > .ukp__module_input > .ukp__content > .ukp__after > .ukp__image {
        width: 1.25rem;
        display: block;
        cursor: pointer;
    }
    .ukp__box_mobile > .ukp__form > .ukp__check_list {
        padding-bottom: 1.25rem;
        font-size: 0;
    }
    .ukp__box_mobile > .ukp__form > .ukp__check_list > .ukp__module_checkbox {
        margin-right: 0.625rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__btn_list {
        text-align: right;
        font-size: 0;
    }
    .ukp__box_mobile > .ukp__form > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
</style>
<div class="ukp__box_mobile">
    <form class="ukp__form ukp__js_mobile_form" method="post" action="_update_comic.php">
        <input type="hidden" name="comic_idx" value="<?= $data["comic"]["comic_idx"] ?>">
        <div class="ukp__title">
            만화 작성
        </div>
        <div class="ukp__row ukp__author">
            <div class="ukp__module_input">
                <div class="ukp__label">작가</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input ukp__js_mobile_author" type="text" name="author" value="<?= $data["comic"]["author"] ?>" required="">
                    <div class="ukp__after">
                        <img src="image/search.svg" alt="" class="ukp__image" onclick="ukp__js_mobile.search()">
                    </div>
                </div>
            </div>
            <div class="ukp__search ukp__js_mobile_search_content"></div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">제목</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="title" value="<?= $data["comic"]["title"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">페이지</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="page" value="<?= $data["comic"]["page"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
            <button class="ukp__module_btn" type="submit">확인</button>
        </div>
    </form>
    <div class="ukp__js_mobile_search_row" style="display: none;">
        <div class="ukp__row">
            <div class="ukp__text">__php__comic_idx__</div>
            <div class="ukp__text">__php__title__</div>
            <div class="ukp__text">__php__page__</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_mobile_form", function ($form) {
            if (!confirm("수정하시겠습니까?")) {
                return false;
            }
        }, function (data) {
            if (data == "1") {
                history.back();
            } else if(data == "2") {
                alert("이미 등록된 만화입니다.");
            } else if (data == "999") {
                location.reload();
            }
        });
    });
    var ukp__js_mobile = {
        search: function () {
            $(".ukp__js_mobile_search_content").html("");
            var author = $(".ukp__js_mobile_author").val();
            ukp__js_common.ajax("_comic_list.php", {
                author: author
            }, function (data) {
                var json = JSON.parse(data);
                if (json.list.length == 0) {
                    $(".ukp__js_mobile_search_content").addClass("ukp__content");
                    $(".ukp__js_mobile_search_content").html("검색결과가 없습니다.");
                    return;
                }
                $(".ukp__js_mobile_search_content").removeClass("ukp__content");
                ukp__js_common.add_list(".ukp__js_mobile_search_row", ".ukp__js_mobile_search_content", json.list);
            });
        }
    };
</script>