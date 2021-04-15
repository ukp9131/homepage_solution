<style>
    .ukp__box_mobile {
        position: relative;
        padding: 3.125rem 1.25rem;
    }
    .ukp__box_mobile > .ukp__form {
        background-color: white;
        border: 0.0625rem solid #dee2e6;
        padding: 1.25rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__title {
        font-size: 1.125rem;
        padding-bottom: 3.75rem;
        font-weight: bold;
    }
    .ukp__box_mobile > .ukp__form > .ukp__module_input {
        padding-top: 1.25rem;
        width: 100%;
        display: block;
    }
    .ukp__box_mobile > .ukp__form > .ukp__check_list {
        font-size: 0;
        padding-top: 0.25rem;
        padding-bottom: 3.125rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__module_btn {
        margin-bottom: 1.25rem;
        display: block;
        width: 100%;
    }
    .ukp__box_mobile > .ukp__form > .ukp__href_list {
        text-align: center;
        font-size: 0;
        padding-bottom: 3.75rem;
    }
    .ukp__box_mobile > .ukp__form > .ukp__href_list > .ukp__href {
        font-size: 0.875rem;
        text-decoration: underline;
    }
</style>
<div class="ukp__box_mobile">
    <form action="_login.php" method="post" class="ukp__form ukp__js_mobile_form">
        <div class="ukp__title">로그인</div>
        <div class="ukp__module_input">
            <div class="ukp__label">이메일</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="email" placeholder="example@example.com" name="id" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">비밀번호</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="password" name="pw" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__check_list">
            <label class="ukp__module_checkbox">
                <input type="checkbox" class="ukp__check ukp__js_mobile_auto_login_flag" value="y">
                <div class="ukp__checkbox"></div>
                <div class="ukp__text">자동 로그인</div>
            </label>
        </div>
        <button class="ukp__module_btn" type="submit">로그인</button>
        <button class="ukp__module_btn" type="button" onclick="location.href = 'write_member.php'">회원가입</button>
        <div class="ukp__href_list">
            <a href="find_password.php" class="ukp__href">비밀번호가 기억나지 않으세요?</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_mobile_form", function ($form) {

        }, function (data, $form) {
            if (data == "1") {
                if ($(".ukp__js_mobile_auto_login_flag").prop("checked")) {
                    localStorage.setItem("ukp__member_id", $form.find("[name=id]").val());
                    localStorage.setItem("ukp__member_pw", $form.find("[name=pw]").val());
                }
                location.href = "index.php";
            } else if (data == "2") {
                alert("아이디 또는 비밀번호가 일치하지 않습니다.");
            }
        });
    });
</script>