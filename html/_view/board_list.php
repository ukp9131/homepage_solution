<style>
    .ukp__box_content {
        position: relative;
        padding-bottom: 1.875rem;
    }
    .ukp__box_content > .ukp__title {
        background-color: black;
        color: white;
        margin-bottom: 3.125rem;
    }
    .ukp__box_content > .ukp__title > .ukp__row {
        width: 62.5rem;
        margin: 0 auto;
        padding: 0.625rem 0;
        font-size: 0.75rem;
    }
    .ukp__box_content > .ukp__content {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
        width: 62.5rem;
        margin: 0 auto;
    }
    .ukp__box_content > .ukp__content > .ukp__btn_list {
        font-size: 0;
        text-align: right;
        padding-bottom: 0.625rem;
    }
    .ukp__box_content > .ukp__content > .ukp__btn_list > .ukp__btn {
        display: inline-block;
    }
    .ukp__box_content > .ukp__content > .ukp__module_layout_table > tbody > .ukp__parent {
        background-color: #dee2e6;
    }
    .ukp__box_content > .ukp__content > .ukp__module_layout_table > tbody > tr > td > .ukp__href {
        font-weight: bold;
        text-decoration: underline;
    }
    .ukp__box_content > .ukp__content > .ukp__module_layout_table > tbody > tr > td > .ukp__href > .ukp__image {
        height: 0.625rem;
        vertical-align: middle;
        display: inline-block;
    }
</style>
<div class="ukp__box_content">
    <div class="ukp__title">
        <div class="ukp__row">
            홈 &gt; <?= $data["category"]["title"] ?>
        </div>
    </div>
    <div class="ukp__content">
        <div class="ukp__btn_list">
            <?php if ($data["member_idx"] != "") { ?>
                <button class="ukp__module_btn" type="button" onclick="location.href = 'write_board.php?category_idx=<?= $data["category"]["category_idx"] ?>'">작성</button>
            <?php } ?>
        </div>
        <table class="ukp__module_layout_table">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>조회수</th>
                    <th>작성일</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["list"] as $temp) { ?>
                    <tr>
                        <td class="ukp__center"><?= $temp["board_idx"] ?></td>
                        <td class="ukp__left">
                            <a href="board_content.php?board_idx=<?= $temp["board_idx"] ?>" class="ukp__href" onclick="return ukp__js_content.private_check('<?= $temp["private_flag"] ?>', '<?= $temp["admin_flag"] ?>', '<?= $temp["member_idx"] ?>')">
                                <?= $temp["title"] ?>
                                <?php if ($temp["private_flag"] == "y") { ?>
                                    <img src="image/lock.svg" alt="" class="ukp__image">
                                <?php } ?>
                            </a>
                        </td>
                        <td class="ukp__left"><?= $temp["name"] ?></td>
                        <td class="ukp__center"><?= $temp["view_cnt"] ?></td>
                        <td class="ukp__center"><?= $temp["insert_date"] ?></td>
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
    <input type="hidden" class="ukp__js_content_member_idx" value="<?= $data["member_idx"] ?>">
</div>
<script>
    var ukp__js_content = {
        private_check: function (private_flag, admin_flag, member_idx) {
            var session_member_idx = $(".ukp__js_content_member_idx").val();
            if (private_flag == "n") {
                return true;
            } else if (admin_flag == "y") {
                alert("비공개 게시글입니다.");
                return false;
            } else if (member_idx == "") {
                return true;
            } else if (member_idx != session_member_idx) {
                alert("비공개 게시글입니다.");
                return false;
            }
        }
    };
</script>