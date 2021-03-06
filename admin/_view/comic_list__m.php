<style>
    .ukp__box_mobile {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__content {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__content > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
    }
    .ukp__box_mobile > .ukp__content > .ukp__btn_list {
        font-size: 0;
        text-align: right;
        padding-bottom: 0.625rem;
    }
    .ukp__box_mobile > .ukp__content > .ukp__btn_list > .ukp__btn {
        display: inline-block;
    }
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > div > .ukp__href {
        font-weight: bold;
        text-decoration: underline;
    }
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > div > .ukp__href > .ukp__image {
        height: 0.625rem;
        vertical-align: middle;
        display: inline-block;
    }
</style>
<div class="ukp__box_mobile">
    <div class="ukp__content">
        <div class="ukp__title">
            <a href="#" class="ukp__href" onclick="history.back(); return false;">&lt; 만화리스트</a>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="location.href = 'write_comic.php?category_idx=<?= $data["category"]["category_idx"] ?>'">작성</button>
        </div>
        <div class="ukp__module_layout_table_m">
            <?php foreach ($data["list"] as $temp) { ?>
                <div class="ukp__row">
                    <div class="ukp__num">
                        번호<br>
                        <?= $temp["comic_idx"] ?>
                    </div>
                    <div class="ukp__content">
                        <div class="ukp__left">
                            [<?= $temp["author"] ?>] <?= $temp["title"] ?>
                        </div>
                        <div class="ukp__left">
                            페이지: <?= $temp["page"] ?> |
                            조회: <?= $temp["view_cnt"] ?> |
                            <?= $temp["insert_date"] ?>
                        </div>
                        <div class="ukp__right">
                            <a href="modify_comic.php?comic_idx=<?= $temp["comic_idx"] ?>" class="ukp__href">수정</a>
                            <!-- | <a href="#" class="ukp__href" onclick="return ukp__js_mobile.delete_comic('<?= $temp["comic_idx"] ?>')">삭제</a>-->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="ukp__module_pagination">
            <a href="#" class="ukp__side" onclick="location.replace('<?= $data["pagination"]["first_link"] ?>'); return false;">&lt;</a>
            <?php foreach ($data["pagination"]["list"] as $temp) { ?>
                <?php if ($temp["active_bool"]) { ?>
                    <strong class="ukp__strong"><?= $temp["num"] ?></strong>
                <?php } else { ?>
                    <a href="#" class="ukp__href" onclick="location.replace('<?= $temp["link"] ?>'); return false;"><?= $temp["num"] ?></a>
                <?php } ?>
            <?php } ?>
            <a href="#" class="ukp__side" onclick="location.replace('<?= $data["pagination"]["last_link"] ?>'); return false;">&gt;</a>
        </div>
    </div>
</div>
<script>
    var ukp__js_mobile = {
        delete_comic: function (comic_idx) {
            if (!confirm("정말로 삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_comic.php", {
                comic_idx: comic_idx
            }, function (data) {
                if (data == "1") {
                    location.reload();
                } else if (data == "999") {
                    location.reload();
                }
            });
            return false;
        }
    };
</script>