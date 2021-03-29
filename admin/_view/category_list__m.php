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
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__child {
        background-color: #dee2e6;
    }
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > div > .ukp__href {
        font-weight: bold;
        text-decoration: underline;
    }
</style>
<div class="ukp__box_mobile">
    <div class="ukp__content">
        <div class="ukp__title">
            메뉴리스트
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="location.href = 'write_category.php'">작성</button>
        </div>
        <div class="ukp__module_layout_table_m">
            <?php foreach ($data["category"] as $temp) { ?>
                <div class="ukp__row ukp__parent">
                    <div class="ukp__num">
                        정렬<br><?= $temp["sort"] ?>
                    </div>
                    <div class="ukp__content">
                        <div class="ukp__left">
                            <?php if ($temp["manager_file_name"] == "") { ?>
                                <?= $temp["title"] ?>
                            <?php } else { ?>
                                <a href="<?= $temp["manager_file_name"] ?>?category_idx=<?= $temp["category_idx"] ?>" class="ukp__href">
                                    <?= $temp["title"] ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="ukp__left">
                            게시글: <?= $temp["board_flag"] ?> |
                            댓글: <?= $temp["comment_flag"] ?> |
                            에디터: <?= $temp["editor_flag"] ?> |
                            파일첨부: <?= $temp["file_flag"] ?>
                        </div>
                        <div class="ukp__right">
                            <a href="modify_category.php?category_idx=<?= $temp["category_idx"] ?>" class="ukp__href">수정</a> | 
                            <a href="#" class="ukp__href" onclick="return ukp__js_mobile.delete_category('<?= $temp["category_idx"] ?>')">삭제</a>
                        </div>
                    </div>
                </div>
                <?php foreach ($temp["child"] as $temp2) { ?>
                    <div class="ukp__row ukp__child">
                        <div class="ukp__num">
                            정렬<br><?= $temp2["sort"] ?>
                        </div>
                        <div class="ukp__content">
                            <div class="ukp__left">
                                <?php if ($temp2["manager_file_name"] == "") { ?>
                                    <?= $temp2["title"] ?>
                                <?php } else { ?>
                                    <a href="<?= $temp2["manager_file_name"] ?>?category_idx=<?= $temp2["category_idx"] ?>" class="ukp__href">
                                        <?= $temp2["title"] ?>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="ukp__left">
                                게시글: <?= $temp2["board_flag"] ?> |
                                댓글: <?= $temp2["comment_flag"] ?> |
                                에디터: <?= $temp2["editor_flag"] ?> |
                                파일첨부: <?= $temp2["file_flag"] ?>
                            </div>
                            <div class="ukp__right">
                                <a href="modify_category.php?category_idx=<?= $temp2["category_idx"] ?>" class="ukp__href">수정</a> | 
                                <a href="#" class="ukp__href" onclick="return ukp__js_mobile.delete_category('<?= $temp2["category_idx"] ?>')">삭제</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    var ukp__js_mobile = {
        delete_category: function (category_idx) {
            if (!confirm("정말로 삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_category.php", {
                category_idx: category_idx
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