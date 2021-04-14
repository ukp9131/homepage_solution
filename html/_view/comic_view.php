<style>
    .ukp__box_content {
        position: relative;
        padding-bottom: 2.5rem;
    }
    .ukp__box_content > .ukp__content {
        position: relative;
    }
    .ukp__box_content > .ukp__content > .ukp__image {
        display: block;
        width: 100%;
        position: relative;
        cursor: pointer;
    }
    .ukp__box_content > .ukp__content > .ukp__left {
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        z-index: 1;
        cursor: pointer;
    }
    .ukp__box_content > .ukp__content > .ukp__right {
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        z-index: 1;
        cursor: pointer;
    }
    .ukp__box_content > .ukp__list {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        font-size: 0;
        text-align: center;
        background-color: white;
    }
    .ukp__box_content > .ukp__list > .ukp__btn {
        width: 20%;
        line-height: 2.375rem;
        display: inline-block;
        font-size: 0.875rem;
        border: 0.0625rem solid black;
        vertical-align: top;
        cursor: pointer;
    }
    .ukp__box_content > .ukp__list > .ukp__btn > .ukp__image {
        display: block;
        height: 1.25rem;
        margin: 0.5625rem auto;
    }
    .ukp__box_content > .ukp__list > .ukp__input {
        width: 20%;
        height: 2.5rem;
        display: inline-block;
        font-size: 0.875rem;
        border: 0.0625rem solid black;
        border-radius: 0;
        vertical-align: top;
        text-align: center;
    }
    .ukp__box_content > .ukp__list > .ukp__text {
        width: 20%;
        line-height: 2.5rem;
        font-size: 0.875rem;
        display: inline-block;
        vertical-align: top;
    }
</style>
<div class="ukp__box_content">
    <input type="hidden" class="ukp__js_content_comic_dir" value="<?= $data["comic_dir"] ?>">
    <input type="hidden" class="ukp__js_content_page" value="<?= $data["comic"]["page"] ?>">
    <div class="ukp__content">
        <img src="<?= $data["comic_dir"] ?>/1.jpg" alt="" class="ukp__image ukp__js_content_image">
        <div class="ukp__left" onclick="ukp__js_content.page_change(-1)"></div>
        <div class="ukp__right" onclick="ukp__js_content.page_change(1)"></div>
    </div>
    <div class="ukp__list">
        <div class="ukp__btn" onclick="ukp__js_content.page_change(-1)">
            <img src="image/angle-left.svg" alt="" class="ukp__image">
        </div>
        <div class="ukp__btn" onclick="ukp__js_content.page_change(1)">
            <img src="image/angle-right.svg" alt="" class="ukp__image">
        </div>
        <div class="ukp__btn" onclick="history.back()">
            <img src="image/door-open.svg" alt="" class="ukp__image">
        </div>
        <input type="tel" class="ukp__input ukp__js_content_cur_page" value="1" onkeyup="ukp__js_content.page_change(0)">
        <div class="ukp__text"><?= $data["comic"]["page"] ?></div>
    </div>
</div>
<script>
    var ukp__js_content = {
        page_change: function (num) {
            var page = $(".ukp__js_content_page").val();
            var comic_dir = $(".ukp__js_content_comic_dir").val();
            var cur_page = parseInt($(".ukp__js_content_cur_page").val());
            if (isNaN(cur_page)) {
                cur_page = 1;
            }
            cur_page += num;
            if (cur_page < 1) {
                $(".ukp__js_content_image").attr("src", comic_dir + "/1.jpg");
                $(".ukp__js_content_cur_page").val("1");
                alert("첫번째 페이지 입니다.");
                return false;
            }
            if (cur_page > page) {
                $(".ukp__js_content_image").attr("src", comic_dir + "/" + page + ".jpg");
                $(".ukp__js_content_cur_page").val(page);
                alert("마지막 페이지 입니다.");
                return false;
            }
            $(".ukp__js_content_image").attr("src", comic_dir + "/" + cur_page + ".jpg");
            $(".ukp__js_content_cur_page").val(cur_page);
        }
    }
</script>