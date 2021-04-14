<style>
    .ukp__box_mobile {
        position: relative;
        padding-bottom: 1.875rem;
    }
    .ukp__box_mobile > .ukp__title {
        background-color: black;
        color: white;
        margin-bottom: 1.875rem;
    }
    .ukp__box_mobile > .ukp__title > .ukp__row {
        padding: 0.625rem 1.25rem;
        font-size: 0.75rem;
    }
    .ukp__box_mobile > .ukp__board {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__board > .ukp__title {
        font-size: 1rem;
        border-top: 0.125rem solid black;
        border-bottom: 0.125rem solid black;
        padding: 0.625rem 0;
        font-weight: bold;
    }
    .ukp__box_mobile > .ukp__board > .ukp__info {
        border-bottom: 0.0625rem solid black;
        padding: 0.625rem 0;
        font-size: 0;
    }
    .ukp__box_mobile > .ukp__board > .ukp__info > .ukp__row {
        font-size: 0.875rem;
        display: inline-block;
        padding-right: 0.625rem;
        vertical-align: middle;
    }
    .ukp__box_mobile > .ukp__board > .ukp__content {
        padding: 0.625rem 0;
    }
    .ukp__box_mobile > .ukp__board > .ukp__content > .ukp__image {
        width: 100%;
        display: block;
    }
    .ukp__box_mobile > .ukp__board > .ukp__btn_list {
        text-align: right;
        font-size: 0;
        padding: 0.625rem 0;
        border-top: 0.0625rem solid black;
    }
    .ukp__box_mobile > .ukp__board > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
</style>
<div class="ukp__box_mobile">
    <div class="ukp__title">
        <div class="ukp__row">
            홈 &gt; <?= $data["comic"]["category_title"] ?> &gt; <?= $data["comic"]["title"] ?>
        </div>
    </div>
    <div class="ukp__board">
        <div class="ukp__title">
            <?= $data["comic"]["title"] ?>
        </div>
        <div class="ukp__info">
            <div class="ukp__row">조회: <?= $data["comic"]["view_cnt"] ?></div>
            <div class="ukp__row"><?= $data["comic"]["insert_date"] ?></div>
        </div>
        <div class="ukp__content">
            <img src="<?= $data["comic_dir"] ?>/1.jpg" alt="" class="ukp__image">
            <img src="<?= $data["comic_dir"] ?>/2.jpg" alt="" class="ukp__image">
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="location.href = 'comic_view.php?comic_idx=<?= $data["comic"]["comic_idx"] ?>'">전체보기</button>
            <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
        </div>
    </div>
</div>
<script>

</script>