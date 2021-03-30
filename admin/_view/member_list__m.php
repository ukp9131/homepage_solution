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
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > div > .ukp__image {
        height: 0.625rem;
        vertical-align: middle;
        display: inline-block;
    }
    .ukp__box_mobile > .ukp__content > .ukp__module_layout_table_m > .ukp__row > .ukp__content > .ukp__right > .ukp__href {
        display: inline-block;
        vertical-align: middle;
        margin-left: 0.625rem;
        font-weight: bold;
        text-decoration: underline;
    }
</style>
<div class="ukp__box_mobile">
    <div class="ukp__content">
        <div class="ukp__title" onclick="history.back()">
            댓글리스트
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="location.href = 'write_member.php'">작성</button>
        </div>
        <div class="ukp__module_layout_table_m">
            <?php foreach ($data["list"] as $temp) { ?>
                <div class="ukp__row">
                    <div class="ukp__num">
                        번호<br>
                        <?= $temp["member_idx"] ?>
                    </div>
                    <div class="ukp__content">
                        <div class="ukp__left">
                            <?= $temp["id"] ?> (<?= $temp["nickname"] ?>)
                        </div>
                        <div class="ukp__left">
                            접속: <?= $temp["last_login_date"] ?> |
                            가입: <?= $temp["insert_date"] ?>
                        </div>
                        <div class="ukp__right">
                            <a href="#" class="ukp__href" onclick="location.href='modify_member.php?member_idx=<?= $temp["member_idx"] ?>'">수정</a>
                            <a href="#" class="ukp__href" onclick="return ukp__js_mobile.delete_member('<?= $temp["member_idx"] ?>')">삭제</a>
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
        delete_member: function (member_idx) {
            if (!confirm("정말로 삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_member.php", {
                member_idx: member_idx
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