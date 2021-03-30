<style>
    .ukp__box_content {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_content > .ukp__content {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
    }
    .ukp__box_content > .ukp__content > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__content > .ukp__module_layout_table > tbody > tr > td > .ukp__image {
        height: 0.625rem;
        vertical-align: middle;
        display: inline-block;
    }
</style>
<div class="ukp__box_content">
    <div class="ukp__content">
        <div class="ukp__title">
            댓글리스트
        </div>
        <table class="ukp__module_layout_table">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>게시글번호</th>
                    <th>댓글</th>
                    <th>작성자</th>
                    <th>작성일</th>
                    <th>옵션</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["list"] as $temp) { ?>
                    <tr>
                        <td class="ukp__center"><?= $temp["board_idx"] ?></td>
                        <td class="ukp__left">
                            <?= nl2br($temp["content"]) ?>
                            <?php if ($temp["private_flag"] == "y") { ?>
                                <img src="image/lock.svg" alt="" class="ukp__image">
                            <?php } ?>
                        </td>
                        <td class="ukp__left"><?= $temp["name"] ?></td>
                        <td class="ukp__left">
                            <?= $temp["insert_date"] ?>
                            <?php if ($temp["update_date"] != "") { ?>
                                (수정일: <?= $temp["update_date"] ?>)
                            <?php } ?>
                        </td>
                        <td class="ukp__center">
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="ukp__js_content.delete_comment('<?= $temp["comment_idx"] ?>')">삭제</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
    var ukp__js_content = {
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