<style>
    .ukp__box_content {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_content > .ukp__form {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
        max-width: 31.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__form > .ukp__row {
        padding-bottom: 1.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__btn_list {
        text-align: right;
        font-size: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
</style>
<div class="ukp__box_content">
    <form class="ukp__form ukp__js_content_form" method="post" action="_update_category.php">
        <input type="hidden" name="category_idx" value="<?= $data["category"]["category_idx"] ?>">
        <div class="ukp__title">
            메뉴 수정
        </div>
        <div class="ukp__row">
            <div class="ukp__module_select">
                <div class="ukp__title">상위카테고리</div>
                <select class="ukp__select" name="parent_category_idx">
                    <option value="0">없음</option>
                    <?php foreach ($data["parent_category"] as $temp) { ?>
                        <option value="<?= $temp["category_idx"] ?>"<?= $temp["category_idx"] == $data["category"]["parent_category_idx"] ? " selected" : "" ?>><?= $temp["title"] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">파일명</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="file_name" value="<?= $data["category"]["file_name"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">관리자파일명(없는경우 공백)</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="manager_file_name" value="<?= $data["category"]["manager_file_name"] ?>">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">메뉴명</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="title" value="<?= $data["category"]["title"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">정렬순서</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="number" name="sort" value="<?= $data["category"]["sort"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
            <button class="ukp__module_btn" type="submit">확인</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        ukp__js_common.ajax_form(".ukp__js_content_form", function($form) {
            if(!confirm("수정하시겠습니까?")) {
                return false;
            }
        }, function(data) {
            if(data == "1") {
                history.back();
            } else if(data == "999") {
                location.reload();
            }
        });
    });
</script>