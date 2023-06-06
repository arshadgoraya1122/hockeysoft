$(document).ready(function () {

    $('input').on("ifChanged", function () {
        if ($(this).prop("checked") == true) {
            $(this).parent().addClass("icheckbox_line-green c-checked");
            $(this).parent().removeClass("icheckbox_line-grey");
        } else {
            $(this).parent().addClass("icheckbox_line-red");
            $(this).parent().removeClass("icheckbox_line-green c-checked");
        }
    });

    setTimeout(function () {
        $(".i-check input[type='checkbox']").each(function () {
            if ($(this).prop("checked") == true) {
                var el = $(this).closest('.i-check').find(".checked");
                el.addClass(" icheckbox_line-green ");
                el.removeClass("icheckbox_line-grey");
            } else {
                var el = $(this).closest('.i-check').find(".icheckbox_line-grey");
                el.addClass(" icheckbox_line-red ");
                el.removeClass("icheckbox_line-grey");
            }
        });
    }, 200);

    var cloneSrvc = '<div class="new-s-srvc border row">' +
        '<span class="clear-data2">x</span>' +
        '<p class="mx-auto text-center"><b> Buy Button <span class="no"></span> </b></p>' +
        '<input type="hidden" name="num[]" value="">' +
        '<div class="col-lg-12">' +
        '<div class="form-group">' +
        '<label>Title Text :</label>' +
        '<textarea rows="3" name="btn_title[]" class="form-control oneditor" placeholder="Title Text" ></textarea>' +
        '<div class="text-danger"> </div>' +
        ' </div>' +
        '<div class="form-row">' +
        '<div class="form-group col-lg-4">' +
        '<label>Button Text :</label>' +
        '<input type="text" name="btn_text[]" placeholder="Like : Buy Now" class="form-control" value=""/>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '<div class="form-group col-lg-4">' +
        '<label>Url :</label>' +
        '<input type="text" name="btn_url[]" placeholder="Url" class="form-control" value=""/>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '<div class="form-group col-lg-4">' +
        '<label>Icon :</label>' +
        $("template.link").html();
    '</div>' +
    '</div>' +
    '</div>' +
    '</div>';
    $(".add-s-srvc").click(function (e) {
        e.preventDefault();
        var html_obj = cloneSrvc;
        $(".s-srvc .s-srvc-rows").append(html_obj);
        var n = $(".s-srvc .s-srvc-rows").find(".new-s-srvc").length;
        var el = $(".s-srvc .s-srvc-rows .new-s-srvc:nth-child(" + n + ")");
        el.find(".no").text(n);
        el.find('input[name="num[]"]').val(n);
        _full_Ed();
        return false;
    });

    var cloneg = '<div class="new-review border row">' +
        '<span class="clear-data2">x</span>' +
        '<p class="mx-auto text-center"><b> Green Text <span class="no"></span> </b></p>' +
        '<div class="col-lg-12">' +
        '<div class="form-group">' +
        '<label>Heading</label>' +
        '<input type="text" name="gr_heading[]" placeholder="Heading text..." class="form-control" value=""/>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '<div class="form-group">' +
        '<label>Body</label>' +
        '<textarea rows="3" name="gr_body[]" class="form-control oneditor" placeholder="Body text..." ></textarea>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '</div>' +
        '</div>'
    $(".add-green").click(function (e) {
        e.preventDefault();
        var html_obj = cloneg;
        var ln = $(".form-rows .row").length;
        $(html_obj).find("input").each(function () {
            $(this).attr("value", "");
        });
        $(html_obj).find("textarea").each(function () {
            $(this).text("");
        });
        $(html_obj).find("img").remove();
        $(".green .form-rows").append(html_obj);
        var n = $(".green .form-rows").find(".new-review").length;
        var el = $(".green .form-rows .new-review:nth-child(" + n + ")");
        el.find(".no").text(n);
        _full_Ed();
        return false;
    });

    var cloner = '<div class="new-review border row">' +
        '<span class="clear-data2">x</span>' +
        '<p class="mx-auto text-center"><b> Red Text <span class="no"></span> </b></p>' +
        '<div class="col-lg-12">' +
        '<div class="form-group">' +
        '<label>Heading</label>' +
        '<input type="text" name="red_heading[]" placeholder="Heading text...." class="form-control" value=""/>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '<div class="form-group">' +
        '<label>Body</label>' +
        '<textarea rows="3" name="red_body[]" class="form-control oneditor" placeholder="Body text..." ></textarea>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '</div>' +
        '</div>'
    $(".add-red").click(function (e) {
        e.preventDefault();
        var html_obj = cloner;
        var ln = $(".form-rows .row").length;
        $(html_obj).find("input").each(function () {
            $(this).attr("value", "");
        });
        $(html_obj).find("textarea").each(function () {
            $(this).text("");
        });
        $(html_obj).find("img").remove();
        $(".red .form-rows").append(html_obj);
        var n = $(".red .form-rows").find(".new-review").length;
        var el = $(".red .form-rows .new-review:nth-child(" + n + ")");
        el.find(".no").text(n);
        _full_Ed();
        return false;
    });
    var cloneb = '<div class="new-review border row">' +
        '<span class="clear-data2">x</span>' +
        '<p class="mx-auto text-center"><b> Black Text <span class="no"></span> </b></p>' +
        '<div class="col-lg-12">' +
        '<div class="form-group">' +
        '<label>Heading</label>' +
        '<input type="text" name="black_heading[]" placeholder="Heading text..." class="form-control" value=""/>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '<div class="form-group">' +
        '<label>Body</label>' +
        '<textarea rows="3" name="black_body[]" class="form-control oneditor" placeholder="body tex...t" ></textarea>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '</div>' +
        '</div>'
    $(".add-black").click(function (e) {
        e.preventDefault();
        var html_obj = cloneb;
        var ln = $(".form-rows .row").length;
        $(html_obj).find("input").each(function () {
            $(this).attr("value", "");
        });
        $(html_obj).find("textarea").each(function () {
            $(this).text("");
        });
        $(html_obj).find("img").remove();
        $(".black .form-rows").append(html_obj);
        var n = $(".black .form-rows").find(".new-review").length;
        var el = $(".black .form-rows .new-review:nth-child(" + n + ")");
        el.find(".no").text(n);
        _full_Ed();
        return false;
    });
    var clonefaqs = '<div class="new-faqs border row">' +
        '<span class="clear-data2">x</span>' +
        '<p class="mx-auto text-center"><b> FAQs <span class="no"></span> </b></p>' +
        '<input type="hidden" name="num[]" value="">' +
        '<div class="col-lg-12">' +
        '<div class="form-group">' +
        '<label>Question</label>' +
        '<input type="text" name="question[]" placeholder="Question" class="form-control" value=""/>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        ' <div class="form-group">' +
        '<label>Answer</label>' +
        '<textarea rows="3" name="answer[]" class="form-control oneditor" placeholder="Answer" ></textarea>' +
        '<div class="text-danger"> </div>' +
        ' </div>' +
        '</div>' +
        '</div>';
    $(".add-faqs").click(function (e) {
        e.preventDefault();
        var html_obj = clonefaqs;
        $(".faqs .faqs-rows").append(html_obj);
        var n = $(".faqs .faqs-rows").find(".new-faqs").length;
        var el = $(".faqs .faqs-rows .new-faqs:nth-child(" + n + ")");
        el.find(".no").text(n);
        el.find('input[name="num[]"]').val(n);
        _full_Ed();
        return false;
    });

    var clonequotes = '<div class="new-quotes border row">' +
        '<span class="clear-data2">x</span>' +
        '<p class="mx-auto text-center"><b> Quote <span class="no"></span></b></p>' +
        '<input type="hidden" name="num[]" value="">' +
        '<div class="col-lg-12">' +
        '<div class="form-group">' +
        '<label>Author</label>' +
        '<input type="text" name="q_name[]" placeholder="Author" class="form-control" value="" />' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '<div class="form-group">' +
        '<label>Quote</label>' +
        '<textarea rows="3" name="q_content[]" class="form-control" placeholder="Quote"></textarea>' +
        '<div class="text-danger"> </div>' +
        '</div>' +
        '</div>' +
        '</div>';
    $(".add-quotes").click(function (e) {
        e.preventDefault();
        var html_obj = clonequotes;
        $(".quotes .quotes-rows").append(html_obj);
        var n = $(".quotes .quotes-rows").find(".new-quotes").length;
        var el = $(".quotes .quotes-rows .new-quotes:nth-child(" + n + ")");
        el.find(".no").text(n);
        el.find('input[name="num[]"]').val(n);
        _full_Ed();
        return false;
    });
    $(".add-youtube-link").click(function () {
        var html_obj = $(".youLinks tr").first().clone();
        var ln = $(".youLinks tr").length;
        $(html_obj).find("input").each(function () {
            $(this).attr("value", "");
        });
        $(html_obj).find("textarea").each(function () {
            $(this).text("");
        });
        html_obj.find("td:first-child").text(parseInt(ln) + 1);
        $(".youtubeLink .youLinks").append("<tr>" + html_obj.html() + "</tr>");
        return false;
    });
    $(".add-facebook-link").click(function () {
        var html_obj = $(".fbLinks tr").first().clone();
        var ln = $(".fbLinks tr").length;
        $(html_obj).find("input").each(function () {
            $(this).attr("value", "");
        });
        $(html_obj).find("textarea").each(function () {
            $(this).text("");
        });
        html_obj.find("td:first-child").text(parseInt(ln) + 1);
        $(".facebookLink .fbLinks").append("<tr>" + html_obj.html() + "</tr>");
        return false;
    });
    $(document).on("click", ".clear-item", function () {
        var v = window.confirm("Do you want to delete data?");
        if (v) {
            $(this).closest("tr").remove();
        }
    });
});
