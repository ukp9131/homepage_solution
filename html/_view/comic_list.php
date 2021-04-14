<style>
    .ukp__box_content {
        position: relative;
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
        padding-top: 2.5rem;
        width: 62.5rem;
        margin: 0 auto;
        margin-bottom: 3.125rem;
    }
    .ukp__box_content > .ukp__content > .ukp__search {
        text-align: right;
        font-size: 0;
        padding-bottom: 0.25rem;
    }
    .ukp__box_content > .ukp__content > .ukp__search > .ukp__module_select {
        width: auto;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__content > .ukp__search > .ukp__module_select > .ukp__select {
        width: auto;
        font-size: 0.875rem;
    }
    .ukp__box_content > .ukp__content > .ukp__search > .ukp__module_input {
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__content > .ukp__search > .ukp__module_input > .ukp__content > .ukp__input {
        font-size: 0.875rem;
    }
    .ukp__box_content > .ukp__content > .ukp__search > .ukp__module_input > .ukp__content > .ukp__after > .ukp__btn {
        display: block;
        border: 0;
        background-color: transparent;
        padding: 0.25rem;
        cursor: pointer;
    }
    .ukp__box_content > .ukp__content > .ukp__search > .ukp__module_input > .ukp__content > .ukp__after > .ukp__btn > .ukp__image {
        width: 1.25rem;
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
        <form method="get" action="<?= $data["php_self"] ?>" class="ukp__search">
            <input type="hidden" name="category_idx" value="<?= $data["category"]["category_idx"] ?>">
            <div class="ukp__module_select">
                <select class="ukp__select" name="type">
                    <option value="title"<?= $data["type"] == "title" ? " selected" : "" ?>>제목</option>
                    <option value="author"<?= $data["type"] == "author" ? " selected" : "" ?>>작가</option>
                </select>
            </div>
            <div class="ukp__module_input">
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="search" value="<?= $data["search"] ?>">
                    <div class="ukp__after">
                        <button type="submit" class="ukp__btn">
                            <img src="image/search.svg" alt="" class="ukp__image">
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <table class="ukp__module_layout_table">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>조회수</th>
                    <th>작성일</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["list"] as $temp) { ?>
                    <tr>
                        <td class="ukp__center"><?= $temp["comic_idx"] ?></td>
                        <td class="ukp__left">
                            <a href="comic_content.php?comic_idx=<?= $temp["comic_idx"] ?>" class="ukp__href">
                                [<?= $temp["author"] ?>] <?= $temp["title"] ?>
                            </a>
                        </td>
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
</div>
<script>

</script>