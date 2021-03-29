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
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__title {
        font-size: 0.75rem;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__content > .ukp__row {
        padding-top: 0.625rem;
        font-size: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__content > .ukp__row > .ukp__name {
        display: inline-block;
        vertical-align: middle;
        font-size: 1rem;
    }
    .ukp__box_content > .ukp__form > .ukp__row > .ukp__content > .ukp__row > .ukp__image {
        display: inline-block;
        height: 1.25rem;
        vertical-align: middle;
        cursor: pointer;
        margin-left: 0.25rem;
    }
    .ukp__box_content > .ukp__form > .ukp__check_list {
        padding-bottom: 1.25rem;
        font-size: 0;
    }
    .ukp__box_content > .ukp__form > .ukp__check_list > .ukp__module_checkbox {
        margin-right: 0.625rem;
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
    <form class="ukp__form ukp__js_content_form" method="post" action="_update_board.php">
        <input type="hidden" name="board_idx" value="<?= $data["board"]["board_idx"] ?>">
        <div class="ukp__title">
            게시글 수정
        </div>
        <div class="ukp__row">
            <div class="ukp__module_input">
                <div class="ukp__label">제목</div>
                <div class="ukp__content">
                    <div class="ukp__before"></div>
                    <input class="ukp__input" type="text" name="title" value="<?= $data["board"]["title"] ?>" required="">
                    <div class="ukp__after"></div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_texteditor">
                <div class="ukp__title">내용</div>
                <div class="ukp__area">
                    <div class="ukp__markdown ukp__js_module_markdown markdown-body" style="display: none;"></div>
                    <textarea class="ukp__textarea ukp__js_module_textarea" name="content"><?= $data["board"]["content"] ?></textarea>
                </div>
                <div class="ukp__content">
                    <div class="ukp__left ukp__js_module_form">
                        <label class="ukp__label ukp__js_module_btn_label">
                            <input type="file" class="ukp__file" onchange="ukp__js_module.add_markdown_image(this, 'file', '_upload_image.php')">
                            <div class="ukp__btn ukp__js_module_btn">이미지</div>
                        </label>
                    </div>
                    <div class="ukp__right">
                        <label class="ukp__markdown">
                            <input type="checkbox" class="ukp__check" onchange="ukp__js_module.toggle_markdown(this)">
                            <div class="ukp__checkbox"></div>
                            <div class="ukp__text">markdown</div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__title">첨부파일</div>
            <div class="ukp__content">
                <?php foreach($data["file"] as $temp) { ?>
                    <div class="ukp__row ukp__js_content_file">
                        <div class="ukp__name"><?= $temp["origin_name"] ?></div>
                        <img src="image/times.svg" alt="" class="ukp__image" onclick="ukp__js_content.delete_file(this, '<?= $temp["file_idx"] ?>')">
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="ukp__row">
            <div class="ukp__module_file">
                <div class="ukp__title">파일첨부</div>
                <div class="ukp__thumbnail ukp__js_module_thumbnail"></div>
                <div class="ukp__list">
                    <label class="ukp__label">
                        <input type="file" name="file" class="ukp__file" onchange="ukp__js_module.change_file(this)">
                        <div class="ukp__btn">파일선택</div>
                    </label>
                    <div class="ukp__name ukp__js_module_name"></div>
                </div>
            </div>
        </div>
        <div class="ukp__check_list">
            <label class="ukp__module_checkbox">
                <input type="checkbox" class="ukp__check" name="private_flag" value="y"<?= $data["board"]["private_flag"] == "y" ? " checked" : "" ?>>
                <div class="ukp__checkbox"></div>
                <div class="ukp__text">비공개</div>
            </label>
            <label class="ukp__module_checkbox">
                <input type="checkbox" class="ukp__check" name="top_flag" value="y"<?= $data["board"]["top_flag"] == "y" ? " checked" : "" ?>>
                <div class="ukp__checkbox"></div>
                <div class="ukp__text">상위노출</div>
            </label>
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
            if (!confirm("수정하시겠습니까?")) {
                return false;
            }
        }, function (data) {
            if (data == "1") {
                history.back();
            } else if (data == "999") {
                location.reload();
            }
        });
    });
    var ukp__js_content = {
        delete_file: function(my, file_idx) {
            if(!confirm("삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_file.php", {
                file_idx: file_idx
            }, function(data) {
                if(data == "1") {
                    $(my).closest(".ukp__js_content_file").remove();
                } else if(data == "999") {
                    location.reload();
                }
            });
        }
    };
</script>