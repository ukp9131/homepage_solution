<style>
    .ukp__box_content {
        position: relative;
        padding: 6.25rem 0;
    }
    .ukp__box_content > .ukp__form {
        background-color: white;
        border: 0.0625rem solid #dee2e6;
        width: 25rem;
        margin: 0 auto;
        padding: 2.5rem;
    }
    .ukp__box_content > .ukp__form > .ukp__title {
        font-size: 1.125rem;
        padding-bottom: 4.25rem;
        font-weight: bold;
    }
</style>
<div class="ukp__box_content">
    <form action="_insert_member.php" method="post" class="ukp__form ukp__js_content_form">
        <div class="ukp__title">회원가입</div>
        <div class="ukp__input_list">
            <div class="ukp__module_input">
                <div class="ukp__label">이메일</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="email" name="id" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
            <button class="ukp__module_btn" type="button">인증</button>
        </div>
        <div class="ukp__module_input">
            <div class="ukp__label">인증번호</div>
            <div class="ukp__content">
                <div class="ukp__before"></div>
                <input class="ukp__input" type="text" name="auth_code" required="">
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
            <select class="ukp__select">
                <option value="m">남</option>
                <option value="w">여</option>
            </select>
        </div>
        <div class="ukp__btn_list">
            <button class="ukp__module_btn" type="submit">로그인</button>
        </div>
    </form>
</div>