<style>
    .ukp__box_content {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_content > .ukp__content {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
        width: 62.5rem;
        margin: 0 auto;
    }
    .ukp__box_content > .ukp__content > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
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
            만화리스트
        </div>
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