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
    <div class="ukp__content">
        <div class="ukp__title">
            <a href="#" class="ukp__href" onclick="history.back(); return false;">&lt; 게시판리스트</a>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="location.href = 'write_board.php?category_idx=<?= $data["category"]["category_idx"] ?>'">작성</button>
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
                    <th>옵션</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["top_list"] as $temp) { ?>
                    <tr class="ukp__parent">
                        <td class="ukp__center"><?= $temp["board_idx"] ?></td>
                        <td class="ukp__left">
                            <a href="board_content.php?board_idx=<?= $temp["board_idx"] ?>" class="ukp__href">
                                <?= $temp["title"] ?>
                                <?php if ($temp["private_flag"] == "y") { ?>
                                    <img src="image/lock.svg" alt="" class="ukp__image">
                                <?php } ?>
                            </a>
                        </td>
                        <td class="ukp__left"><?= $temp["name"] ?></td>
                        <td class="ukp__center"><?= $temp["view_cnt"] ?></td>
                        <td class="ukp__center"><?= $temp["insert_date"] ?></td>
                        <td class="ukp__center">
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="location.href = 'modify_board.php?board_idx=<?= $temp["board_idx"] ?>'">수정</button>
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="ukp__js_content.delete_board('<?= $temp["board_idx"] ?>')">삭제</button>
                        </td>
                    </tr>
                <?php } ?>
                <?php foreach ($data["list"] as $temp) { ?>
                    <tr>
                        <td class="ukp__center"><?= $temp["board_idx"] ?></td>
                        <td class="ukp__left">
                            <a href="board_content.php?board_idx=<?= $temp["board_idx"] ?>" class="ukp__href">
                                <?= $temp["title"] ?>
                                <?php if ($temp["private_flag"] == "y") { ?>
                                    <img src="image/lock.svg" alt="" class="ukp__image">
                                <?php } ?>
                            </a>
                        </td>
                        <td class="ukp__left"><?= $temp["name"] ?></td>
                        <td class="ukp__center"><?= $temp["view_cnt"] ?></td>
                        <td class="ukp__center"><?= $temp["insert_date"] ?></td>
                        <td class="ukp__center">
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="location.href = 'modify_board.php?board_idx=<?= $temp["board_idx"] ?>'">수정</button>
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="ukp__js_content.delete_board('<?= $temp["board_idx"] ?>')">삭제</button>
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
        delete_board: function (board_idx) {
            if (!confirm("정말로 삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_board.php", {
                board_idx: board_idx
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