<style>
    .ukp__box_content {
        position: relative;
        padding-bottom: 1.875rem;
    }
    .ukp__box_content > .ukp__title {
        background-color: black;
        color: white;
        margin-bottom: 3.125rem;
    }
    .ukp__box_content > .ukp__title > .ukp__row {
        width: 62.5rem;
        margin: 0 auto;
        padding: 0.625rem 0;
        font-size: 0.75rem;
    }
    .ukp__box_content > .ukp__board {
        border: 1px solid #dee2e6;
        background-color: white;
        padding: 1.25rem;
        max-width: 62.5rem;
        width: calc(100% - 2.5rem);
        margin: 0 auto;
    }
    .ukp__box_content > .ukp__board > .ukp__title {
        font-size: 1rem;
        border-top: 0.125rem solid black;
        border-bottom: 0.125rem solid black;
        padding: 0.625rem 0;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__board > .ukp__info {
        border-bottom: 0.0625rem solid black;
        padding: 0.625rem 0;
        font-size: 0;
    }
    .ukp__box_content > .ukp__board > .ukp__info > .ukp__row {
        font-size: 0.875rem;
        display: inline-block;
        padding-right: 0.625rem;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__board > .ukp__content {
        padding: 0.625rem 0;
    }
    .ukp__box_content > .ukp__board > .ukp__content > .ukp__module_markdown {
        font-size: 0.875rem;
    }
    .ukp__box_content > .ukp__board > .ukp__btn_list {
        text-align: right;
        font-size: 0;
        padding: 0.625rem 0;
        border-top: 0.0625rem solid black;
    }
    .ukp__box_content > .ukp__board > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment {
        padding-top: 1.25rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_title {
        border-bottom: 0.125rem solid black;
        font-size: 0.875rem;
        padding: 0.625rem 0;
        font-weight: bold;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list {

    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row {
        border-bottom: 0.0625rem solid #dee2e6;
        padding: 0.625rem 0;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__child {
        padding-left: 1.25rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__title {
        font-size: 0;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__title > .ukp__name {
        display: inline-block;
        font-size: 0.875rem;
        font-weight: bold;
        padding-right: 0.625rem;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__title > .ukp__date {
        display: inline-block;
        font-size: 0.875rem;
        padding-right: 0.625rem;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__title > .ukp__href {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: bold;
        vertical-align: middle;
        text-decoration: underline;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__content {
        padding: 0.625rem 0;
        font-size: 0.875rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__option {
        font-size: 0;
        text-align: right;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__comment_list > .ukp__row > .ukp__option > .ukp__href {
        font-size: 0.75rem;
        font-weight: bold;
        text-decoration: underline;
        display: inline-block;
        margin-left: 0.625rem;
        vertical-align: middle;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__form {
        padding-top: 0.625rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__form > .ukp__module_textarea > .ukp__textarea {
        height: 3.125rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__form > .ukp__btn_list {
        padding: 0.625rem 0;
        text-align: right;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__form > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__btn_list {
        text-align: right;
        font-size: 0;
        padding: 0.625rem 0;
        border-top: 0.0625rem solid black;
    }
    .ukp__box_content > .ukp__board > .ukp__comment > .ukp__btn_list > .ukp__module_btn {
        display: inline-block;
        margin-left: 0.625rem;
    }
</style>
<div class="ukp__box_content">
    <div class="ukp__title">
        <div class="ukp__row">
            홈 &gt; <?= $data["board"]["category_title"] ?> &gt; <?= $data["board"]["title"] ?>
        </div>
    </div>
    <div class="ukp__board">
        <div class="ukp__title">
            <?= $data["board"]["title"] ?>
        </div>
        <div class="ukp__info">
            <div class="ukp__row"><?= $data["board"]["name"] ?></div>
            <div class="ukp__row">조회: <?= $data["board"]["view_cnt"] ?></div>
            <div class="ukp__row"><?= $data["board"]["insert_date"] ?> <?= $data["board"]["update_date"] == "" ? "" : " (수정일: {$data["board"]["update_date"]})" ?></div>
        </div>
        <div class="ukp__content">
            <div class="ukp__module_markdown markdown-body"><?= $data["board"]["content"] ?></div>
        </div>
        <div class="ukp__btn_list">
            <?php if ($data["member_idx"] != "" && $data["member_idx"] == $data["board"]["member_idx"]) { ?>
                <button class="ukp__module_btn" type="button" onclick="location.href = 'modify_board.php?board_idx=<?= $data["board"]["board_idx"] ?>'">수정</button>
                <button class="ukp__module_btn" type="button" onclick="ukp__js_content.delete_board('<?= $data["board"]["board_idx"] ?>')">삭제</button>
            <?php } ?>
            <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
        </div>
        <div class="ukp__comment">
            <div class="ukp__comment_title">
                댓글 <?= $data["comment_cnt"]["cnt"] ?>개
            </div>
            <div class="ukp__comment_list">
                <?php foreach ($data["comment"] as $temp) { ?>
                    <div class="ukp__row">
                        <div class="ukp__title">
                            <div class="ukp__name"><?= $temp["name"] ?></div>
                            <div class="ukp__date"><?= $temp["insert_date"] ?><?= $temp["update_date"] == "" ? "" : " (수정됨)" ?></div>
                            <a href="#" class="ukp__href" onclick="return ukp__js_content.comment_answer('<?= $temp["comment_idx"] ?>', '<?= $temp["name"] ?>')">답글</a>
                        </div>
                        <div class="ukp__content">
                            <?= nl2br($temp["content"]) ?>
                        </div>
                        <?php if ($temp["member_idx"] == $data["member_idx"]) { ?>
                            <div class="ukp__option">
                                <a href="#" class="ukp__href" onclick="return ukp__js_content.comment_modify('<?= $temp["comment_idx"] ?>', '<?= urlencode($temp["content"]) ?>', '<?= $temp["private_flag"] ?>')">수정</a>
                                <a href="#" class="ukp__href" onclick="return ukp__js_content.comment_delete('<?= $temp["comment_idx"] ?>')">삭제</a>
                            </div>
                        <?php } ?>
                    </div>
                    <?php foreach ($temp["child"] as $temp2) { ?>
                        <div class="ukp__row ukp__child">
                            <div class="ukp__title">
                                <div class="ukp__name"><?= $temp2["name"] ?></div>
                                <div class="ukp__date"><?= $temp2["insert_date"] ?><?= $temp2["update_date"] == "" ? "" : " (수정됨)" ?></div>
                            </div>
                            <div class="ukp__content">
                                <?= nl2br($temp2["content"]) ?>
                            </div>
                            <?php if ($temp2["member_idx"] == $data["member_idx"]) { ?>
                                <div class="ukp__option">
                                    <a href="#" class="ukp__href" onclick="return ukp__js_content.comment_modify('<?= $temp2["comment_idx"] ?>', '<?= urlencode($temp2["content"]) ?>', '<?= $temp2["private_flag"] ?>')">수정</a>
                                    <a href="#" class="ukp__href" onclick="return ukp__js_content.comment_delete('<?= $temp2["comment_idx"] ?>')">삭제</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php if ($data["member_idx"] != "") { ?>
                <form action="_insert_comment.php" method="post" class="ukp__form ukp__js_content_form">
                    <input type="hidden" name="board_idx" value="<?= $data["board"]["board_idx"] ?>">
                    <input type="hidden" name="parent_comment_idx" class="ukp__js_content_parent_comment_idx" value="">
                    <input type="hidden" name="comment_idx" class="ukp__js_content_comment_idx" value="">
                    <input type="hidden" class="ukp__js_content_confirm_text" value="작성하시겠습니까?">
                    <div class="ukp__module_textarea">
                        <div class="ukp__label ukp__js_content_label">댓글작성</div>
                        <textarea class="ukp__textarea ukp__js_content_content" name="content" required=""></textarea>
                    </div>
                    <div class="ukp__check_list">
                        <label class="ukp__module_checkbox">
                            <input type="checkbox" class="ukp__check ukp__js_content_private_flag" name="private_flag" value="y">
                            <div class="ukp__checkbox"></div>
                            <div class="ukp__text">비공개</div>
                        </label>
                    </div>
                    <div class="ukp__btn_list">
                        <button class="ukp__module_btn ukp__js_content_cancel_btn" type="button" onclick="ukp__js_content.comment_cancel()" style="display: none;">취소</button>
                        <button class="ukp__module_btn" type="submit">확인</button>
                    </div>
                </form>
            <?php } ?>
            <div class="ukp__btn_list">
                <button class="ukp__module_btn" type="button" onclick="history.back()">뒤로가기</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        ukp__js_common.ajax_form(".ukp__js_content_form", function ($form) {
            var text = $(".ukp__js_content_confirm_text").val();
            if (!confirm(text)) {
                return false;
            }
        }, function (data) {
            if (data == "1") {
                location.reload();
            } else if (data == "999") {
                location.reload();
            }
        });
    });
    var ukp__js_content = {
        delete_board: function (board_idx) {
            if (!confirm("정말로 삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_board.php", {
                board_idx, board_idx
            }, function (data) {
                if (data == "1") {
                    history.back();
                }
            });
        },
        comment_answer: function (comment_idx, name) {
            $(".ukp__js_content_form").attr("action", "_insert_comment.php");
            $(".ukp__js_content_parent_comment_idx").val(comment_idx);
            $(".ukp__js_content_comment_idx").val("");
            $(".ukp__js_content_confirm_text").val("작성하시겠습니까?");
            $(".ukp__js_content_label").html("답글작성 (" + name + ")");
            $(".ukp__js_content_cancel_btn").show();
            $(".ukp__js_content_private_flag").prop("checked", false);
            $(".ukp__js_content_content").val("");
            $("html").scrollTop($(".ukp__js_content_form").offset().top);
            return false;
        },
        comment_modify: function (comment_idx, content, private_flag) {
            $(".ukp__js_content_form").attr("action", "_update_comment.php");
            $(".ukp__js_content_parent_comment_idx").val("");
            $(".ukp__js_content_comment_idx").val(comment_idx);
            $(".ukp__js_content_confirm_text").val("수정하시겠습니까?");
            $(".ukp__js_content_label").html("답글수정");
            $(".ukp__js_content_cancel_btn").show();
            $(".ukp__js_content_private_flag").prop("checked", private_flag == "y" ? true : false);
            $(".ukp__js_content_content").val(decodeURI(content));
            $("html").scrollTop($(".ukp__js_content_form").offset().top);
            return false;
        },
        comment_cancel: function () {
            $(".ukp__js_content_form").attr("action", "_insert_comment.php");
            $(".ukp__js_content_parent_comment_idx").val("");
            $(".ukp__js_content_comment_idx").val("");
            $(".ukp__js_content_confirm_text").val("작성하시겠습니까?");
            $(".ukp__js_content_label").html("댓글작성");
            $(".ukp__js_content_cancel_btn").hide();
            $(".ukp__js_content_private_flag").prop("checked", false);
            $(".ukp__js_content_content").val("");
            return false;
        },
        comment_delete: function (comment_idx) {
            if (!confirm("삭제하시겠습니까?")) {
                return false;
            }
            ukp__js_common.ajax("_delete_comment.php", {
                comment_idx: comment_idx
            }, function (data) {
                if (data == "1") {
                    location.reload();
                } else if (data == "999") {
                    location.reload();
                }
            });
            return false;
        }
    }
</script>