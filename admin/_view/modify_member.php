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
    <form class="ukp__form ukp__js_content_form" method="post" action="_update_member.php" autocomplete="off">
        <input type="hidden" name="member_idx" value="<?= $data["member"]["member_idx"] ?>">
        <div class="ukp__title">
            회원 수정
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">아이디</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="id" value="<?= $data["member"]["id"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">비밀번호</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="password" name="pw">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">비밀번호 확인</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="password" name="pw_check">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">닉네임</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="nickname" value="<?= $data["member"]["nickname"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">이름</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="name" value="<?= $data["member"]["name"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">생년월일</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input ukp__js_wrap_datepicker" type="text" name="birthday" value="<?= $data["member"]["birthday"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_select">
                <div class="ukp__title">성별</div>
                <select class="ukp__select" name="gender">
                    <option value="n">선택</option>
                    <option value="m"<?= $data["member"]["gender"] == "m" ? " selected" : "" ?>>남</option>
                    <option value="w"<?= $data["member"]["gender"] == "w" ? " selected" : "" ?>>여</option>
                </select>
            </div>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
            <button class="ukp__module_btn" type="submit">확인</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_content_form", function ($form) {
            if ($form.find("[name=pw]").val() != $form.find("[name=pw_check]").val()) {
                alert("비밀번호가 일치하지 않습니다.");
                return false;
            }
            if (!confirm("수정하시겠습니까?")) {
                return false;
            }
        }, function (data) {
            if (data == "1") {
                history.back();
            } else if (data == "2") {
                alert("중복된 아이디 입니다.");
            } else if (data == "3") {
                alert("중복된 닉네임 입니다.");
            } else if (data == "999") {
                location.reload();
            }
        });
    });
</script>