/**
 * 프로젝트에 맞게 파일명, 모듈내용 변경해서 사용<br>
 * css 모듈은 ukp__js_module 접두어 사용, 변수명 변경시 css에도 변경적용
 * 모듈 require는 ukp__js_common 멤버함수만 표시
 * 
 * require jquery.js, jquery.form.js, marked.js, highlight.js
 * @version 2021.01.05
 * @author ukp
 */


/**
 * ready
 */
$(document).ready(function () {
    //markdown 변경
    $(".ukp__module_texteditor").each(function () {
        var textarea = $(this).find(".ukp__js_module_textarea");
        var textarea_text = ukp__js_common.html_decode(textarea.val());
        textarea.val(textarea_text);
    });
    $(".ukp__module_markdown").each(function () {
        var markdown_text = $(this).html();
        markdown_text = markdown_text.replace(/\s*&gt;/gi, function (match) {
            return ukp__js_common.html_decode(match);
        });
        markdown_text = markdown_text.replace(/\n?```([^]*?)```\n?/gi, function (match) {
            return ukp__js_common.html_decode(match).replace(/\n/gi, "__ukp__nl__");
        });
        //nl2br
        markdown_text = markdown_text.replace(/\n/gi, "<br />\n").replace(/__ukp__nl__/gi, "\n");
        $(this).html(marked(markdown_text));
        this.querySelectorAll("pre code").forEach((block) => {
            hljs.highlightBlock(block);
        });
    });
});

/**
 * module
 */
var ukp__js_module = {
    /**
     * .ukp__module_file
     * 파일변경
     * 썸네일 css 여기에서 변경
     * 
     * require 2021.01.04
     * @version 2021.01.04
     * 
     * @param {object} my 자기자신
     * @returns {undefined}
     */
    change_file: function (my) {
        //셀렉터
        var thumbnail = $(my).closest(".ukp__module_file").find(".ukp__js_module_thumbnail");
        var name = $(my).closest(".ukp__module_file").find(".ukp__js_module_name");
        //파일 없는경우
        if (typeof ($(my)[0].files[0]) == "undefined") {
            //css 변경
            thumbnail.css("width", "0");
            thumbnail.css("height", "0");
            thumbnail.css("border", "0");
            //파일명 텍스트 삭제
            name.html("");
            return;
        }
        var file_obj = $(my)[0].files[0];
        //파일명 변경
        name.html(file_obj.name);
        var ext = file_obj.name.split(".").slice(-1)[0];
        if (ext.toLowerCase() == "jpg" || ext.toLowerCase() == "gif" || ext.toLowerCase() == "png" || ext.toLowerCase() == "jpeg") {
            var file_reader = new FileReader();
            file_reader.readAsDataURL(file_obj);
            file_reader.onload = function (e) {
                //css 변경
                thumbnail.css("width", "12.5rem");
                thumbnail.css("height", "12.5rem");
                thumbnail.css("border", "0.0625rem solid black");
                thumbnail.css("background-image", "url('" + e.target.result + "')");
            }
        } else {
            //css 변경
            thumbnail.css("width", "0");
            thumbnail.css("height", "0");
            thumbnail.css("border", "0");
        }
    },

    /**
     * .ukp__module_texteditor
     * 마크다운 토글
     * 
     * require 2021.01.05
     * @version 2021.01.05
     * 
     * @param {object} my 자기자신
     * @returns {undefined}
     */
    toggle_markdown: function (my) {
        var module_texteditor = $(my).closest(".ukp__module_texteditor");
        var div = module_texteditor.find(".ukp__js_module_markdown");
        var textarea = module_texteditor.find(".ukp__js_module_textarea");
        if ($(my).prop("checked")) {

            var markdown_text = textarea.val();
            markdown_text = markdown_text.replace(/\n?```([^]*?)```\n?/gi, function (match) {
                return match.replace(/\n/gi, "__ukp__nl__");
            });
            //nl2br
            markdown_text = markdown_text.replace(/\n/gi, "<br />\n").replace(/__ukp__nl__/gi, "\n");
            var markdown = marked(markdown_text);
            console.log(markdown);
            div.html(markdown);
            div[0].querySelectorAll('pre code').forEach((block) => {
                hljs.highlightBlock(block);
            });
            div.show();
        } else {
            div.hide();
        }
    },

    /**
     * .ukp__module_texteditor
     * 이미지 업로드 후 출력
     * 성공시 이미지경로, 실패시 공백 출력
     * 
     * require 2021.01.05
     * @version 2021.01.05
     * 
     * @param {object} my 자기자신
     * @returns {undefined}
     */
    add_markdown_image: function (my) {
        var module_texteditor = $(my).closest(".ukp__module_texteditor");
        var btn = module_texteditor.find(".ukp__js_module_btn");
        var btn_label = module_texteditor.find(".ukp__js_module_btn_label");
        var textarea = module_texteditor.find(".ukp__js_module_textarea");
        var markdown = module_texteditor.find(".ukp__js_module_markdown");
        var form = module_texteditor.find(".ukp__js_module_form");
        //썸네일 없는경우
        if (typeof ($(my)[0].files[0]) == "undefined") {
            return;
        }
        var file_obj = $(my)[0].files[0];
        var ext = file_obj.name.split(".").slice(-1)[0];
        if (ext.toLowerCase() == "jpg" || ext.toLowerCase() == "gif" || ext.toLowerCase() == "png" || ext.toLowerCase() == "jpeg") {
            form.ajaxForm({
                beforeSubmit: function (arr, $form, options) {
                    btn.text("...");
                    btn_label.attr("onclick", "return false");
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    btn.text("..." + percentComplete + "%");
                },
                success: function (data, flag, status, $form) {
                    data = data.trim();
                    if (data == "") {
                        alert("이미지 업로드에 실패했습니다.");
                    } else {
                        var textarea_text = textarea.val() + " ![image](" + data + ")";
                        textarea.val(textarea_text);
                        var markdown_text = marked(textarea_text);
                        markdown.html(markdown_text);
                        markdown[0].querySelectorAll('pre code').forEach((block) => {
                            hljs.highlightBlock(block);
                        });
                    }
                    $form[0].reset();
                    btn.text("이미지");
                    btn_label.removeAttr("onclick");
                },
                error: function (data, flag, status, $form) {
                    alert("이미지 업로드에 실패했습니다.");
                    $form[0].reset();
                    btn.text("이미지");
                    btn_label.removeAttr("onclick");
                }
            });
            form.submit();
        } else {
            alert("jpg, gif, png 파일만 업로드 가능합니다.");
        }
    }
};

/**
 * common
 */
var ukp__js_common = {
    go_home_history_flag: false,
    /**
     * ajax
     * 
     * require 2020.09.28 
     * @version 2020.09.28
     * 
     * @param {string} url 요청url
     * @param {object} data 요청data
     * @param {function} success 성공시 실행함수
     */
    ajax: function (url, data, success) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function (data) {
                data = data.trim();
                success(data);
            },
            complete: function (data) {
            },
            error: function (data, flag, status) {
                console.log(data.status + "\n" + status);
            }
        });
        return false;
    },

    /**
     * ajax form
     * 
     * require 2020.09.28 
     * @version 2020.09.28
     * 
     * @param {string} cla 클래스명
     * @param {function} serialize 실행전 함수(반환값 false인경우 실행중지)
     * @param {function} success 성공시 실행함수
     */
    ajax_form: function (cla, serialize, success) {
        $(cla).ajaxForm({
            beforeSerialize: function ($form, options) {
                this.submit_form = $form;
                this.submit_btn = this.submit_form.find("[type=submit]");
                this.submit_text = this.submit_btn.text();
                var result = serialize(this.submit_form);
                if (typeof (result) == "boolean") {
                    return result;
                }
            },
            beforeSubmit: function (arr, $form, options) {
                this.submit_form.find("[type=submit]").text(this.submit_text + "...");
                this.submit_form.find("[type=submit]").attr("onclick", "return false");
            },
            uploadProgress: function (event, position, total, percentComplete) {
                this.submit_form.find("[type=submit]").text(this.submit_text + "..." + percentComplete + "%");
            },
            success: function (data, flag, status, $form) {
                data = data.trim();
                success(data, this.submit_form);
                this.submit_form.find("[type=submit]").text(this.submit_text);
                this.submit_form.find("[type=submit]").removeAttr("onclick");
            },
            error: function (data, flag, status, $form) {
                console.log(data.status + "\n" + status);
                this.submit_form.find("[type=submit]").text(this.submit_text);
                this.submit_form.find("[type=submit]").removeAttr("onclick");
            }
        });
        return false;
    },

    /**
     * 리스트 추가<br>
     * 변경할 값 접두어: __php__, 접미어: __
     * 
     * require 2020.09.28 
     * @version 2020.09.28
     * 
     * @param {string} row_cla row 클래스
     * @param {string} list_cla list 클래스
     * @param {object} list 리스트
     * @param {boolean} clear_bool 추가전 초기화여부
     */
    add_list: function (row_cla, list_cla, list, clear_bool = true) {
        if (clear_bool) {
            $(list_cla).html("");
        }
        for (var i in list) {
            var temp = $(row_cla).html();
            for (var j in list[i]) {
                temp = temp.replace(new RegExp("__php__" + j + "__", "g"), list[i][j]);
            }
            $(list_cla).append(temp);
        }
        return false;
    },

    /**
     * 홈 히스토리 저장 및 체크
     * 
     * require 2020.11.12 
     * @version 2020.11.12
     * 
     */
    set_home_history: function () {
        //저장
        if (typeof (sessionStorage.getItem("up__start_history_length")) != "string") {
            sessionStorage.setItem("up__start_history_length", history.length);
        }
        //체크
        if (!this.go_home_history_flag && typeof (sessionStorage.getItem("up__go_home_history_url")) == "string") {
            var url = sessionStorage.getItem("up__go_home_history_url");
            sessionStorage.removeItem("up__go_home_history_url");
            location.replace(url);
        }
        return false;
    },

    /**
     * 홈 히스토리 이동
     * 
     * require 2020.11.12
     * @version 2020.11.12
     * 
     * @param {string} url 주소
     * 
     */
    go_home_history: function (url = "") {
        var history_len = parseInt(sessionStorage.getItem("up__start_history_length")) - history.length;
        if (url != "") {
            sessionStorage.setItem("up__go_home_history_url", url);
        }
        this.go_home_history_flag = true;
        history.go(history_len);
        return false;
    },

    /**
     * 숫자콤마
     * 
     * require 2020.10.06 
     * @version 2020.10.06
     * 
     * @param {string} num 숫자
     * @returns {string} 콤마숫자
     */
    number_format: function (num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },

    /**
     * 숫자앞에 0
     * 
     * require 2020.11.03 
     * @version 2020.11.03
     * 
     * @param {number} n 숫자
     * @param {number} width 길이
     * @returns {string} 0붙은숫자
     */
    number_pad: function (n, width) {
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
    },

    /**
     * 시간범위내 포함여부
     * 
     * require 2020.11.03
     * @version 2020.11.03
     *
     * @param {string} now_time 기준시간
     * @param {string} start_time 시작시간(공백가능)
     * @param {string} end_time 종료시간(공백가능)
     * @returns {boolean} true - 범위내 존재, false - 범위내 존재안함
     */
    time_range_bool: function (now_time, start_time, end_time) {
        //시간 확인
        if (start_time == "" && end_time == "") {
            //시간 없는경우
            return false;
        } else if (start_time == "" && now_time > end_time) {
            //시작시간 없는경우
            return false;
        } else if (end_time == "" && now_time < start_time) {
            //종료시간 없는경우
            return false;
        } else if (start_time < end_time) {
            //시작시간이 종료시간보다 작은경우
            if (now_time < start_time || now_time > end_time) {
                return false;
            }
        } else {
            //시작시간이 종료시간보다 큰경우
            if (now_time < start_time && now_time > end_time) {
                return false;
            }
        }
        return true;
    },

    /**
     * 뒤로가기 새로고침
     * 
     * require 2020.11.07
     * @version 2020.11.07
     *
     */
    history_reload: function () {
        if (typeof (e.persisted) != "undefined" && e.persisted) {
            location.reload();
        }
        return false;
    },

    /**
     * 이전페이지로 이동(replace)
     * 
     * require 2020.11.18
     * @version 2020.11.18
     *
     */
    history_back: function () {
        location.replace(document.referrer);
        return false;
    },

    /**
     * 파일 썸네일
     * 
     * require 2020.11.19
     * @version 2020.11.19
     * 
     * @param {string} cla 클래스명
     * @param {function} complete 완료함수, [0] - 성공여부, [1] - 썸네일
     *
     */
    file_thumbnail: function (cla, complete) {
        //썸네일 없는경우
        if (typeof ($(cla)[0].files[0]) == "undefined") {
            complete(false, "");
            return;
        }
        var file_obj = $(cla)[0].files[0];
        var ext = file_obj.name.split(".").slice(-1)[0];
        if (ext.toLowerCase() == "jpg" || ext.toLowerCase() == "gif" || ext.toLowerCase() == "png" || ext.toLowerCase() == "jpeg") {
            var file_reader = new FileReader();
            file_reader.readAsDataURL(file_obj);
            file_reader.onload = function (e) {
                complete(true, e.target.result);
            }
        } else {
            complete(false, "");
        }
        return false;
    },

    /**
     * html 정렬변경<br>
     * 정렬변경 onclick 요소에 고유클래스 대신 this 사용
     * 
     * require 2020.11.24
     * @version 2020.11.24
     * 
     * @param {string} my_cla 자신 class, 고유 class여야함
     * @param {string} other_cla 상대 class, 고유 class여야함
     * @param {array} static_cla 고정값 class
     *
     */
    change_html_order: function (my_cla, other_cla, static_cla = []) {
        //변경하려는 class 같은경우 실행안함
        if (my_cla == other_cla) {
            return false;
        }
        //static 추출
        var my_static = [];
        var other_static = [];
        for (var i in static_cla) {
            my_static.push($(my_cla).find(static_cla[i]).val());
            other_static.push($(other_cla).find(static_cla[i]).val());
        }
        //html 추출 및 변경
        var temp_html = $(my_cla).html();
        $(my_cla).html($(other_cla).html());
        $(other_cla).html(temp_html);
        //static 변경
        for (var i in static_cla) {
            $(my_cla).find(static_cla[i]).val(my_static[i]);
            $(other_cla).find(static_cla[i]).val(other_static[i]);
        }
        return false;
    },

    /**
     * 날짜차이
     * 
     * require 2020.12.15
     * @version 2020.12.15
     * 
     * @param {string} start_date 시작일
     * @param {string} end_date 종료일
     * @returns {int} 차이일수
     *
     */
    datediff: function (start_date, end_date) {
        var sdt = new Date(start_date);
        var edt = new Date(end_date);
        return Math.ceil((edt.getTime() - sdt.getTime()) / (1000 * 3600 * 24));
    },

    /**
     * html encode(&amp; &lt; &gt; &quot;)
     * 
     * require 2021.01.05
     * @version 2021.01.05
     * 
     * @param {string} html html코드
     * @param {boolean} double_encode_bool html코드
     * @returns {string} 인코딩 텍스트
     */
    html_encode: function (html, double_encode_bool = true) {
        if (!double_encode_bool) {
            html = html.replace(/&amp;/gi, "&");
        }
        return html
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&nbsp;");
    },

    /**
     * html decode(&amp; &lt; &gt; &quot;)
     * 
     * require 2021.01.05
     * @version 2021.01.05
     * 
     * @param {string} text 인코딩 텍스트
     * @returns {string} html코드
     */
    html_decode: function (text) {
        return text
                .replace(/&nbsp;/gi, "\"")
                .replace(/&gt;/gi, ">")
                .replace(/&lt;/gi, "<")
                .replace(/&amp;/gi, "&");
    },
    is_iphone: function () {
        return (navigator.userAgent.indexOf("iPhone") != -1) || (navigator.userAgent.indexOf("iPod") != -1) || (navigator.userAgent.indexOf("iPad") != -1) ? true : false;
    },
    is_android: function () {
        return navigator.userAgent.indexOf("Android") != -1 ? true : false;
    }
};