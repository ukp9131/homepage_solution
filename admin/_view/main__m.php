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
    .ukp__box_mobile > .ukp__form > .ukp__btn {
        text-align: right;
        font-size: 0;
    }
    .ukp__box_mobile > .ukp__form > .ukp__btn > .ukp__module_btn {
        display: inline-block;
    }
</style>
<div class="ukp__box_mobile">
    <form class="ukp__form ukp__js_mobile_form" method="post" action="_update_my_admin.php">
        <div class="ukp__title">관리자 정보 수정</div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">현재 아이디</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="id" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">현재 비밀번호</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="password" name="pw" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">변경할 아이디</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="update_id" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">변경할 비밀번호</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="password" name="update_pw" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">변경할 비밀번호 확인</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="password" name="update_pw_check" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__btn">
            <button class="ukp__module_btn" type="submit">확인</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        ukp__js_common.ajax_form(".ukp__js_mobile_form", function($form) {
            if($form.find("[name=update_pw]").val() != $form.find("[name=update_pw_check]").val()) {
                alert("변경하려는 비밀번호를 다시 확인해주세요.");
                return false;
            }
        }, function(data) {
            if(data == "1") {
                alert("변경완료");
                location.reload();
            } else if(data == "2") {
                alert("기존 계정정보가 일치하지 않습니다.");
            } else if(data == "999") {
                location.replace("index.php");
            }
        });
    });
</script>