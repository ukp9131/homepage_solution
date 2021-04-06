<style>
    .ukp__box_mobile {
        position: relative;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__title {
        padding-bottom: 3.125rem;
        font-size: 0.875rem;
        font-weight: bold;
    }
    .ukp__box_mobile > .ukp__form > .ukp__row {
        padding-bottom: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__row > .ukp__module_input > .ukp__content > .ukp__readonly {
        background-color: wheat;
    }
    .ukp__box_mobile > .ukp__form > .ukp__btn_list {
        text-align: right;
        font-size: 0;
    }
    .ukp__box_mobile > .ukp__form > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
</style>
<div class="ukp__box_mobile">
    <form class="ukp__form ukp__js_mobile_form" method="post" action="_update_code.php">
        <input type="hidden" name="code_idx" value="<?= $data["code"]["code_idx"] ?>">
        <div class="ukp__title">
            코드 수정
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">키</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input<?= $data["code"]["core_flag"] == "y" ? " ukp__readonly" : "" ?>" type="text" name="title" value="<?= $data["code"]["title"] ?>"  <?= $data["code"]["core_flag"] == "y" ? 'readonly=""' : 'required=""' ?>>
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">값</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="content" value="<?= $data["code"]["content"] ?>"  <?= $data["code"]["core_flag"] == "y" ? 'readonly=""' : 'required=""' ?>>
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">설명</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input<?= $data["code"]["core_flag"] == "y" ? " ukp__readonly" : "" ?>" type="text" name="description" value="<?= $data["code"]["description"] ?>" required="">
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
        ukp__js_common.ajax_form(".ukp__js_mobile_form", function($form) {
            if(!confirm("수정하시겠습니까?")) {
                return false;
            }
        }, function(data) {
            if(data == "1") {
                history.back();
            } else if(data == "2") {
                alert("이미 존재하는 코드입니다.");
            } else if(data == "999") {
                location.reload();
            }
        });
    });
</script>