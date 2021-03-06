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
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > div > .ukp__image {
        height: 0.625rem;
        vertical-align: middle;
        display: inline-block;
    }
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > .ukp__right > .ukp__href {
        font-weight: bold;
        text-decoration: underline;
    }
</style>
<div class="ukp__box_mobile">
    <div class="ukp__content">
        <div class="ukp__title" onclick="history.back()">
            댓글리스트
        </div>
        <div class="ukp__module_layout_table_m">
            <?php foreach ($data["list"] as $temp) { ?>
                <div class="ukp__row">
                    <div class="ukp__num">
                        게시글<br>
                        <?= $temp["board_idx"] ?>
                    </div>
                    <div class="ukp__content">
                        <div class="ukp__left">
                            <?= nl2br($temp["content"]) ?>
                            <?php if ($temp["private_flag"] == "y") { ?>
                                <img src="image/lock.svg" alt="" class="ukp__image">
                            <?php } ?>
                        </div>
                        <div class="ukp__left">
                            <?= $temp["name"] ?> |
                            <?= $temp["insert_date"] ?>
                            <?php if ($temp["update_date"] != "") { ?>
                                (수정일: <?= $temp["update_date"] ?>)
                            <?php } ?>
                        </div>
                        <div class="ukp__right">
                            <a href="#" class="ukp__href" onclick="return ukp__js_mobile.delete_comment('<?= $temp["comment_idx"] ?>')">삭제</a>
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
        delete_comment: function (comment_idx) {
            if (!confirm("정말로 삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_comment.php", {
                comment_idx: comment_idx
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