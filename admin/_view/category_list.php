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
    .ukp__box_content > .ukp__content > .ukp__module_layout_table > tbody > .ukp__child {
        background-color: #dee2e6;
    }
    .ukp__box_content > .ukp__content > .ukp__module_layout_table > tbody > tr > td > .ukp__href {
        font-weight: bold;
        text-decoration: underline;
    }
</style>
<div class="ukp__box_content">
    <div class="ukp__content">
        <div class="ukp__title">
            메뉴리스트
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="location.href = 'write_category.php'">작성</button>
        </div>
        <table class="ukp__module_layout_table">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>순서</th>
                    <th>카테고리명</th>
                    <th>파일명</th>
                    <th>옵션</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["category"] as $temp) { ?>
                    <tr class="ukp__parent">
                        <td class="ukp__center"><?= $temp["sort"] ?></td>
                        <td class="ukp__left">
                            <?php if ($temp["manager_file_name"] == "") { ?>
                                <?= $temp["title"] ?>
                            <?php } else { ?>
                                <a href="<?= $temp["manager_file_name"] ?>?category_idx=<?= $temp["category_idx"] ?>" class="ukp__href">
                                    <?= $temp["title"] ?>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="ukp__left"><?= $temp["file_name"] ?></td>
                        <td class="ukp__center">
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="location.href = 'modify_category.php?category_idx=<?= $temp["category_idx"] ?>'">수정</button>
                            <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="ukp__js_content.delete_category('<?= $temp["category_idx"] ?>')">삭제</button>
                        </td>
                    </tr>
                    <?php foreach ($temp["child"] as $temp2) { ?>
                        <tr class="ukp__child">
                            <td class="ukp__center"><?= $temp2["sort"] ?></td>
                            <td class="ukp__left">
                                <?php if ($temp2["manager_file_name"] == "") { ?>
                                    <?= $temp2["title"] ?>
                                <?php } else { ?>
                                    <a href="<?= $temp2["manager_file_name"] ?>?category_idx=<?= $temp2["category_idx"] ?>" class="ukp__href">
                                        <?= $temp2["title"] ?>
                                    </a>
                                <?php } ?>
                            </td>
                            <td class="ukp__left"><?= $temp2["file_name"] ?></td>
                            <td class="ukp__center">
                                <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="location.href = 'modify_category.php?category_idx=<?= $temp2["category_idx"] ?>'">수정</button>
                                <button class="ukp__module_btn ukp__module_style_small" type="button" onclick="ukp__js_content.delete_category('<?= $temp2["category_idx"] ?>')">삭제</button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    var ukp__js_content = {
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