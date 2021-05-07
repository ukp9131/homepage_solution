<style>
    .ukp__box_content {
        position: relative;
        padding: 6.25rem 0;
    }
    .ukp__box_content > .ukp__form {
        background-color: white;
        border: 0.0625rem solid #dee2e6;
        width: 30rem;
        margin: 0 auto;
        padding: 2.5rem;
    }
    .ukp__box_content > .ukp__form > .ukp__title {
        font-size: 1.125rem;
        padding-bottom: 4.25rem;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__form > .ukp__input_list {
        display: block;
        width: 100%;
        display: flex;
        align-items: flex-end;
        padding-bottom: 1rem;
    }
    .ukp__box_content > .ukp__form > .ukp__input_list > .ukp__module_input {
        flex: 1;
    }
    .ukp__box_content > .ukp__form > .ukp__module_input {
        width: 100%;
        display: block;
        padding-bottom: 1rem;
    }
    .ukp__box_content > .ukp__form > .ukp__module_select {
        width: 100%;
        display: block;
        padding-bottom: 1rem;
    }
    .ukp__box_content > .ukp__form > .ukp__module_textarea {
        padding-bottom: 0.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__check_list {
        font-size: 0;
        text-align: right;
        padding-bottom: 1rem;
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
    <form action="_insert_member.php" method="post" class="ukp__form ukp__js_content_form" autocomplete="off">
        <div class="ukp__title">회원가입</div>
        <div class="ukp__input_list">
            <div class="ukp__module_input">
                <div class="ukp__label">이메일</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input ukp__js_content_id" type="email" name="id" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
            <button class="ukp__module_btn" type="button" onclick="ukp__js_content.email_check(this)">인증</button>
        </div>
        <div class="ukp__input_list">
            <div class="ukp__module_input">
                <div class="ukp__label">인증번호</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input ukp__js_content_auth_code" type="text" name="auth_code" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
            <button class="ukp__module_btn" type="button" onclick="ukp__js_content.email_auth(this)">확인</button>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">비밀번호</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="password" name="pw" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">비밀번호 확인</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="password" name="pw_check" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">닉네임</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="text" name="nickname" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">이름</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="text" name="name" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">생년월일</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input ukp__js_wrap_datepicker" type="text" name="birthday" required="">
                <div class="ukp__after"></div>
            </div>
        </div>
        <div class="ukp__module_select">
            <div class="ukp__title">성별</div>
            <select class="ukp__select" name="gender">
                <option value="m">남</option>
                <option value="w">여</option>
            </select>
        </div>
        <div class="ukp__module_textarea">
            <div class="ukp__label">개인정보 처리방침</div>
            <textarea class="ukp__textarea"><?= $data["privacy_policy"] ?></textarea>
        </div>
        <div class="ukp__check_list">
            <label class="ukp__module_checkbox">
                <input type="checkbox" class="ukp__check ukp__js_content_privacy_policy" value="y">
                <div class="ukp__checkbox"></div>
                <div class="ukp__text">동의합니다.</div>
            </label>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
            <button class="ukp__module_btn" type="submit">회원가입</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_content_form", function ($form) {
            if ($form.find("[name=pw]").val() != $form.find("[name=pw_check]").val()) {
                alert("비밀번호가 일치하지 않습니다.");
                return false;
            } else if(!$(".ukp__js_content_privacy_policy").prop("checked")) {
                alert("개인정보 처리방침에 동이해야합니다.");
                return false;
            }
        }, function (data) {
            if (data == "1") {
                alert("회원가입을 완료하였습니다. 로그인해주세요.");
                history.back();
            } else if (data == "2") {
                alert("중복된 이메일입니다.");
            } else if (data == "3") {
                alert("중복된 닉네임입니다.");
            } else if (data == "4") {
                alert("이메일인증이 필요합니다.");
            }
        });
    });
    var ukp__js_content = {
        email_check: function (my) {
            var id = $(".ukp__js_content_id").val().trim();
            if (id == "") {
                alert("이메일을 입력해주세요.");
                return false;
            }
            var html = $(my).html();
            var onclick = $(my).attr("onclick");
            $(my).attr("onclick", "return false");
            $(my).html(html + "...");
            ukp__js_common.ajax("_email_check.php", {
                id: id
            }, function (data) {
                if (data == "1") {
                    alert("인증번호를 발송했습니다.");
                } else if (data == "2") {
                    alert("중복된 이메일입니다.");
                }
                $(my).attr("onclick", onclick);
                $(my).html(html);
            });
        },
        email_auth: function (my) {
            var auth_code = $(".ukp__js_content_auth_code").val().trim();
            if (auth_code == "") {
                alert("인증번호 입력해주세요.");
                return false;
            }
            var html = $(my).html();
            var onclick = $(my).attr("onclick");
            $(my).attr("onclick", "return false");
            $(my).html(html + "...");
            ukp__js_common.ajax("_email_auth.php", {
                auth_code: auth_code
            }, function (data) {
                if (data == "1") {
                    alert("인증에 성공하였습니다.");
                } else if (data == "2") {
                    alert("인증에 실패하였습니다. 인증번호를 확인해주세요.");
                } else if (data == "3") {
                    alert("인증이 만료되었습니다. 인증번호를 다시 발송해주세요.");
                }
                $(my).attr("onclick", onclick);
                $(my).html(html);
            });
        }
    };
</script>