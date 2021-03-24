<style>
    .ukp__box_content {
        position: relative;
        display: flex;
        min-height: 100vh;
    }
    .ukp__box_content > .ukp__form {
        margin: auto auto;
        max-width: 31.25rem;
        padding: 0 1.25rem;
        width: 100%;
    }
    .ukp__box_content > .ukp__form > .ukp__title {
        font-size: 0;
        text-align: center;
        padding-bottom: 1.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__title > .ukp__image {
        height: 2.5rem;
        display: inline-block;
        vertical-align: middle;
        margin-right: 0.625rem;
    }
    .ukp__box_content > .ukp__form > .ukp__title > .ukp__text {
        font-size: 1.25rem;
        display: inline-block;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__form > .ukp__content {
        border: 0.0625rem solid #dee2e6;
        background-color: white;
    }
    .ukp__box_content > .ukp__form > .ukp__content > .ukp__title {
        font-size: 1rem;
        padding: 1.25rem;
        border-bottom: 0.0625rem solid #dee2e6;
    }
    .ukp__box_content > .ukp__form > .ukp__content > .ukp__row {
        padding: 1.25rem;
        padding-bottom: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__content > .ukp__btn {
        padding: 1.25rem;
        margin-top: 1.25rem;
        border-top: 0.0625rem solid #dee2e6;
    }
</style>
<div class="ukp__box_content">
    <form action="_login.php" method="post" class="ukp__form ukp__js_content_form">
        <div class="ukp__title">
            <img src="<?= $data["remap_code"]["public_url"] ?>/logo.png" alt="" class="ukp__image">
            <div class="ukp__text"><?= $data["remap_code"]["homepage_name"] ?> 관리자</div>
        </div>
        <div class="ukp__content">
            <div class="ukp__title">관리자 로그인</div>
            <div class="ukp__row">
                <div class="ukp__module_input">
                    <div class="ukp__label">아이디</div>
                    <div class="ukp__content">
                        <div class="ukp__before"></div>
                        <input class="ukp__input ukp__js_content_id" type="text" name="id" required="">
                        <div class="ukp__after"></div>
                    </div>
                </div>
            </div>
            <div class="ukp__row">
                <div class="ukp__module_input">
                    <div class="ukp__label">비밀번호</div>
                    <div class="ukp__content">
                        <div class="ukp__before"></div>
                        <input class="ukp__input" type="password" name="pw" required="">
                        <div class="ukp__after"></div>
                    </div>
                </div>
            </div>
            <div class="ukp__row">
                <label class="ukp__module_checkbox">
                    <input type="checkbox" class="ukp__check ukp__js_content_save_id">
                    <div class="ukp__checkbox"></div>
                    <div class="ukp__text">아이디 저장</div>
                </label>
            </div>
            <div class="ukp__btn">
                <button class="ukp__module_btn" type="submit">로그인</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_content_form", function () {
        }, function (data) {
            if(data == "1") {
                if($(".ukp__js_content_save_id").prop("checked")) {
                    var id = $(".ukp__js_content_id").val();
                    localStorage.setItem("ukp_admin_id", id);
                } else {
                    localStorage.removeItem("ukp_admin_id");
                }
                location.replace("main.php");
            } else if(data == "2") {
                alert("아이디 또는 비밀번호가 일치하지 않습니다.");
            } else {
                alert(data);
            }
        });
        if(localStorage.getItem("ukp_admin_id") != null) {
            var id = localStorage.getItem("ukp_admin_id");
            $(".ukp__js_content_id").val(id);
            $(".ukp__js_content_save_id").prop("checked", true);
        }
    });
</script>