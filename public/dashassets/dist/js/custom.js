var ajaxReq = baseURL + "ajaxrequest";

function sendData(url, obj) {
    return $.ajax({
        "async": true,
        "type": "POST",
        "global": false,
        "dataType": "html",
        "url": url,
        "data": obj,
        "success": function (data) {
            smVaribale = data;
        }
    });
}

function _mask() {
    $('input[name="phone"]').mask('0000-0000000');
}

function deeptest(target, s) {
    s = s.split('.');
    s.shift();
    var key = s.shift();
    var obj = target[key];
    while (obj && s.length) {
        obj = obj[s.shift()];
    }
    return obj;
}

function get_inputs(c, obj) {
    var ht = ``;

    function _g_(_el) {
        if (_el.find("input").is(":checked")) {
            var a = _el.find("input").attr("data-id");
            var name = _el.find("input").attr('data-fname');
            var typee = _el.find("input").attr('data-fytpe');
            var sel = _el.find("input").attr('data-fselect');
            var number_selected, slider_selected, radio_selected, checkbox_selected, dropdown_selected;
            number_selected = slider_selected = radio_selected = checkbox_selected = dropdown_selected = '';
            switch (sel) {
                case 'number':
                    number_selected = 'selected';
                    break;
                case 'slider':
                    slider_selected = 'selected';
                    break;
                case 'radio':
                    radio_selected = 'selected';
                    break;
                case 'checkbox':
                    checkbox_selected = 'selected';
                    break;
                case 'dropdown':
                    dropdown_selected = 'selected';
                    break;
            }

            ht += `<li title="${name}"><input type='hidden' name='order[]' value="${a}" class='form-control'/>${name}</a>
          <select  name='filter[]' class='form-control'>
           <option value = ''>Select one</option>
           <option value='dropdown' ${dropdown_selected}>Dropdown</option>
           <option value='number' ${number_selected}>Number</option>
           <option value='slider' ${slider_selected}>Slider</option>
           <option value='radio' ${radio_selected}>Radio Button</option>
           <option value='checkbox' ${checkbox_selected}>Checkbox</option>
          </select></li>`;
        }
        return ht;
    }
    if (c == "s") {
        var savedIds = $("input[name='idsf']").val();
        savedIds = (savedIds == "") ? [] : savedIds.split(",");
        var html = "";
        $.each(savedIds, function (n, i) {
            html = _g_($(".add_input").find("[data-id='" + i + "']").closest("a"));
        });
        $('.m-t').html(html);
    } else if (c == "n") {
        if (obj !== null) {
            $('.m-t').append(_g_(obj));
        }
    } else if (c == "-n") {
        if (obj !== null) {
            var i = obj.find("input").attr("data-id");
            $(".m-t input[value='" + i + "']").closest("li").remove();
        }
    }
}

$(document).ready(function () {

    _mask();

    $(".resolveBtn").click(function () {
        $("input[name='user_id']").val($(this).attr("data-id"));
    });

    $(".resolveBtnAd").click(function () {
        $("input[name='ad_id']").val($(this).attr("data-id"));
    });

    $('.search_test').SumoSelect({
        search: true,
        searchText: 'Enter here.'
    });

    // Side Bar list item delete
    $(document).on("click", ".list-del", function () {
        var s = window.confirm("Do you want to continue?");
        if (s) {
            $(this).closest("li").remove();
        }
    });

    //Get Filter Category
    $(document).on('change', '#main_filter', function () {
        var id = $(this).val();
        $('#strv').html("");
        $(".m-t").html("");
        var data = {
            id: id,
            _token: _token,
        };
        var loaderHtml = '<div class="text-center"><div class="spinner-border m-5 " role="status"><span class="sr-only">Loading...</span></div></div>';
        $('.category_data').html(loaderHtml);
        sendData(baseURL + "filters/get_sub_filtercat", data).done(function (response) {
            $('.category_data').html(response);
        });
    });
    $(document).on('change', '#ctg_dis', function () {
        var name = $(this).val();
        $('.m-t').html("");
        var id = parseInt($(this).find('option:selected').attr('data-cid'));
        $('#filter_id').val(id);
        var data = {
            id: id,
            name: name,
            _token: _token,
        };
        var loaderHtml = '<div class="text-center"><div class="spinner-border m-5 " role="status"><span class="sr-only">Loading...</span></div></div>';
        $('#strv').html(loaderHtml);
        sendData(baseURL + "filters/filters_generate", data).done(function (response) {
            response = JSON.parse(response);
            var ids = "<input type='hidden' name='idsf' value='" + response.ids + "'>";
            $('#strv').html(ids + response.html);
            get_inputs("s", null);

        });
    });

    $(document).on('click', '.add_input', function () {
        if ($(this).find("input").is(":checked")) {
            get_inputs("n", $(this));
        } else {
            get_inputs("-n", $(this));
        }

    });

    // Get Subcategory
    $(document).on('change', '#main_ctg', function () {
        var id = $(this).val();
        $('.m-tbc').html("");
        var data = {
            id: id,
            _token: _token,
        };
        var loaderHtml = '<div class="text-center"><div class="spinner-border m-5 " role="status"><span class="sr-only">Loading...</span></div></div>';
        $('.category_data').html(loaderHtml);
        sendData(baseURL + "inputfields/get_sub_categroy", data).done(function (response) {
            $('.category_data').html(response);
        });
    });

    $(document).on('change', '#ctg_div', function () {
        var name = $(this).val();
        var id = parseInt($(this).find('option:selected').attr('data-cid'));
        var data = {
            id: id,
            name: name,
            _token: _token,
        };
        var loaderHtml = '<div class="text-center"><div class="spinner-border m-5 " role="status"><span class="sr-only">Loading...</span></div></div>';
        $('#sortable').html(loaderHtml);
        sendData(baseURL + "form/sortoder", data).done(function (response) {
            $('#sortable').html(response);
        });
    });

    //inputFields Form Generation
    $(document).on('change', '.input_type', function () {
        var itype = $(this).find('option:selected').val();
        var iname = $('.input_name').val();
        place = 'Placeholder';
        if (itype == 'radio' || itype == 'checkbox' || itype == 'date') {
            place = iname;
        }
        if (itype == 'dropdown') {
            place = 'Insert Options';
        } else if (itype == 'dependent') {
            place = "";
        } else if (itype == "range") {
            place = "";
        }
        $(".showf").addClass("text-center");
        $('.showf').html('<div class="spinner-border m-5" role="status"><span class="sr-only">Loading...</span></div>');

        var data = {
            _token: _token,
            itype: itype,
            iname: iname,
            placeholder: place
        };
        sendData(baseURL + "inputfields/getInputHtml", data).done(function (response) {
            var htmlResp = JSON.parse(response);
            $(".showf").removeClass("text-center");
            $('.showf').html(htmlResp.html);
        });

    });

    //remove input
    $(document).on('click', '.rembtn', function () {
        var iid = parseInt($(this).attr('data-id'));
        $('.r' + iid).remove();
    });

    //add_input
    $(document).on('click', '.add_input', function () {
        var main_ctg = $("#main_ctg").val();
        var sub_ctg = $("#ctg_div").val();
        if (main_ctg == "" || sub_ctg == "") {
            $.alert({
                icon: 'fa fa-warning',
                type: "red",
                title: "Error!",
                content: "Please select main and sub category",
            });
        } else {
            var id = parseInt($(this).attr('data-fid'));
            var name = $(this).attr('data-fname');
            var ht = "<li title='" + name + "' class='r" + id + " d-flex justify-content-between'><input type='hidden' name='order[]' value='" + id + "' class='form-control'/>" + name + "<a data-id='" + id + "' class='rembtn sconfirm fa fa-minus pull-right'></a></li>";
            var al = false;
            $(".m-tbc li").each(function () {
                if ($(this).attr("title") === name) {
                    al = true;
                }
            });
            if (al === false) {
                $('.m-tbc').append(ht);
            } else {
                $.alert({
                    icon: 'fa fa-warning',
                    type: "red",
                    title: "Error!",
                    content: "Input field already exists",
                });
            }
        }
    });

    $(document).on("click", ".__inputCnt", function () {
        if ($(this).is(":checked")) {
            $(".__inputCnt_o").show();
        } else {
            $(".__inputCnt_o").hide();
            $(".counterMin").val("");
            $(".counterMax").val("");
        }
    });

    //add_btn
    $(document).on('click', '.add_btn', function (e) {
        e.preventDefault();
        $(".in").append($("template").html());
    });

    // remove button
    $(document).on('click', '.minus_btn', function () {
        $(this).parent().parent().parent('.input-group').remove();
    });

    //Save Form Fields
    $("#create-form-fields").click(function () {
        var type = $(".input_type").val();
        var icon = $(".input_icon").val();
        var label = $(".input_name").val();
        var old_label = $(".old_label").val();
        var id = $(".form_id").val();
        var data = {};
        data.type = type;
        if (label.trim() === "") {
            $(".inp-err").html("<div class='alert alert-danger'>Input name is necessary.</div>");
            $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert").slideUp(500);
            });
            return false;
        } else if (icon.trim() === "") {
            $(".inp-err").html("<div class='alert alert-danger'>Input icon is necessary.</div>");
            $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert").slideUp(500);
            });
            return false;
        } else if (type.trim() === "") {
            $(".inp-err").html("<div class='alert alert-danger'>Please Select input type.</div>");
            $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert").slideUp(500);
            });
            return false;
        } else if ($(".mainlabel").length > 0) {
            if ($(".mainlabel").val().trim() === "") {
                $(".inp-err").html("");
                $("<div class='alert alert-danger inp-err-after'>Label is necessary.</div>").insertAfter(".mainlabel");
                $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                    $(".alert").slideUp(500);
                });
                return false;
            }
        } else if ($(".mainlabel").length == 0) {
            $(".inp-err").html("");
            $("<div class='alert alert-danger inp-err-after'>Label is necessary.</div>").insertAfter(".mainlabel");
            $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert").slideUp(500);
            });
            return false;
        }
        if (type == "text" || type == "number" || type == "date" || type == "email" || type == "password" || type == "phone" || type == "url" || type == "textarea" || type == "texteditor" || type == "dropdown") {

            mdata = {};
            mdata.label = label;
            mdata.icon = icon;
            mdata.placeholder = $(".placeholder").val();
            mdata.mainlabel = $(".mainlabel").val();
            mdata.maintooltip = $(".maintooltip").val();
            //data.type["placeholder"] = placeholder;
            mdata.required = $("input[name='required']").is(":checked");
            if (type == "text" || type == "textarea") {
                mdata.counter = $("input[name='counter']").is(":checked");
                if ($("input[name='counter']").is(":checked")) {
                    mdata.counterMin = $(".counterMin").val();
                    mdata.counterMax = $(".counterMax").val();
                }
            }
            if (type == "url") {
                mdata.relation = $(".select").val();
            }
            if (type == "number") {
                mdata.use = $("input[name='use']:checked").val();
                mdata.display_in = $("textarea[name='display_in']").val();
            }
            if (type == "date") {
                mdata.use = $("input[name='use']:checked").val();
            }
            if (type == "dropdown") {
                if ($(".dp-ord input").is(":checked")) {
                    var ord = $(".dp-ord input:checked").closest("label").attr("data-o");
                    mdata.order = ord;
                }
            }
            data.data = mdata;
        } else if (type == "range") {
            mdata = {};
            mdata.icon = icon;
            mdata.label = label;
            mdata.mainlabel = $(".mainlabel").val();
            mdata.maintooltip = $(".maintooltip").val();
            mdata.required = $("input[name='required']").is(":checked");
            mdata.from = $("input[name='from']").val();
            mdata.from_label = $("input[name='from_label']").val();
            mdata.to = $("input[name='to']").val();
            mdata.to_label = $("input[name='to_label']").val();
            data.data = mdata;
        }
        if (type == "dependent") {
            mdata = {};
            mdata.icon = icon;
            mdata.label = label;
            mdata.listName = $(".placeholder").val();
            mdata.maintooltip = $("input[name='maintooltip']").val();
            data.data = mdata;

        } else if (type == "checkbox" || type == "radio" || type == "image") {
            mdata = {};
            mdata.icon = icon;
            mdata.label = label;
            mdata.mainlabel = $(".mainlabel").val();
            mdata.maintooltip = $(".maintooltip").val();
            var v = [];
            mdata.required = $("input[name='required']").is(":checked");
            $(".showf .placeholder").each(function (index, item) {
                v.push($(this).val());
            });
            mdata.values = v;

            data.data = mdata;
        }
        // for save
        sendData(baseURL + "inputfields", {
            _token: _token,
            d: data,
            id: id,
            old: old_label
        }).done(function (r) {
            if (r == "") {
                //window.location.href = "/"+admin_slug+"/inputfields/generate";
            } else {
                r = JSON.parse(r);
                if (r.resp === "error") {
                    $("#exampleModalCenter .modal-body .inp-err").html("<div class='alert alert-danger'>" + r.msg + "</div>");
                } else {
                    window.location.href = baseURL + "inputfields";
                }
            }

        });
        return false;
    });

    $(".runmodel").click(function () {
        var j = $(this).closest("td").find("template").html();
        var v = JSON.parse(j);
        $("#exampleModalCenter .modal-body .inp-err").html("");
        $("#exampleModalCenter .modal-body .inp-err-after").remove();
        $("#exampleModalCenter .modal-body input[name='input_name']").val(v.input_name);
        $("#exampleModalCenter .modal-body input[name='input_icon']").val(v.input_icon);
        $("#exampleModalCenter .modal-body input[name='old_label']").val(v.input_name);
        $("#exampleModalCenter .modal-body option").prop("selected", false);
        $("#exampleModalCenter .modal-body option[value = '" + v.input_type + "']").prop("selected", true);
        v._token = _token;
        var d = v;
        d.itype = v.input_type;
        d.iname = v.input_name;
        d._token = v._token;
        $.ajax({
            url: baseURL + "form/ajax-cat-form",
            type: "post",
            data: d,
            dataType: "html",
            success: function (res) {}
        }).done(function (response) {

            var htmlResp = JSON.parse(response);
            $('.showf').html(htmlResp.html);

            $("#exampleModalCenter").modal("show");

            var el = $("#exampleModalCenter .showf");
            el.find("input[name='mainlabel']").val(d.label);
            el.find("textarea[name='maintooltip']").html(d.tooltip);
            if (d.hasOwnProperty("required") && d.required == "1") {
                el.find("input[name='required']").prop("checked", true);
            }
            if (d.hasOwnProperty("counter") && d.counter == "1") {
                el.find("input[name='counter']").prop("checked", true);
            }
            if (d.input_type == "dropdown") {
                el.find("textarea[name='" + d.input_name + "']").html(d.input_value);
                if (d.hasOwnProperty("extra")) {
                    if (deeptest(d, "d.extra.sort") != "undefined") {
                        $(".dp-ord[data-o='" + d.extra.sort + "']").find("input").prop("checked", true);
                    }
                }
                el.find("");
            } else if (
                d.input_type == "text" ||
                d.input_type == "number" ||
                d.input_type == "textarea" ||
                d.input_type == "email" ||
                d.input_type == "password" ||
                d.input_type == "date" ||
                d.input_type == "phone" ||
                d.input_type == "url" ||
                d.input_type == "texteditor" ||
                d.input_type == "date" ||
                d.input_type == "image") {
                el.find("input[name='" + d.input_name + "']").val(d.input_value);
                if (d.input_type == "date") {
                    if (d.hasOwnProperty("extra")) {
                        if (deeptest(d, "d.extra.use") != "undefined") {
                            $.each(el.find("input[name='use']"), function () {
                                if ($(this).val() == d.extra.use) {
                                    $(this).prop("checked", true);
                                }
                            });
                        }
                    }
                } else if (d.input_type == "number") {
                    if (d.hasOwnProperty("extra")) {
                        if (deeptest(d, "d.extra.use") != "undefined") {
                            $.each(el.find("input[name='use']"), function () {
                                if ($(this).val() == d.extra.use) {
                                    $(this).prop("checked", true);
                                }
                            });
                        }
                        if (deeptest(d, "d.extra.display_in") != "undefined") {
                            var vl = d.extra.display_in;
                            if (vl instanceof Array) {
                                el.find("textarea[name='display_in']").val(vl.join("\n"));
                            }
                        }
                    }
                } else if (d.input_type == "text" || d.input_type == "textarea") {
                    if (d.hasOwnProperty("extra")) {
                        if (d.counter == 1) {
                            el.find(".__inputCnt_o").show();
                            el.find(".counterMin").val(d["extra"].min);
                            el.find(".counterMax").val(d["extra"].max);
                        }
                    }
                }
            } else if (d.input_type == "radio" || d.input_type == "checkbox") {
                var sp = d.input_value.split(",");
                var html = $("#exampleModalCenter .showf .in").html();
                $("#exampleModalCenter .showf .in").addClass("mcl");
                $("#exampleModalCenter .showf .in").removeClass("in");
                var mcl = $("#exampleModalCenter .showf .mcl");
                mcl.html("");
                $.each(sp, function (i, v) {
                    mcl.append("<div class='in'>" + html + "</div>");
                });
                mcl.find(".in").each(function (i, el) {
                    $(this).find("input[type='text']").val(sp[i]);
                });
            }
            $("#exampleModalCenter input[name='id']").val(d.id);
        });
        return false;
    });



    // Save Fields
    $(document).on('click', '#fieldordergenerate', function () {
        event.preventDefault();
        var main_ctg = $("#main_ctg").val();
        var sub_ctg = $("#ctg_div").val();
        if (main_ctg == "" || sub_ctg == "") {
            $.alert({
                icon: 'fa fa-warning',
                type: "red",
                title: "Error!",
                content: "Please select main and sub category",
            });
            return false;
        }
        var data = $(this).closest("form").serializeArray();
        sendData(baseURL + "inputfields/saveformOrder", {
            _token: _token,
            data: data
        }).done(function (response) {
            $(".message").html(response);
            $("#myModal6").modal('show');
        });
        return false;
    });

    //User Detail Information
    $(document).on("click", ".profile-detail-popup", function () {
        var user_id = $(this).attr("data-id");
        var data = {
            user_id: user_id,
            _token: _token,
        };
        var loaderHtml = '<div class="spinner-border m-5 text-end" role="status"><span class="sr-only">Loading...</span></div>';
        $(".user-ajax-response").html(loaderHtml);
        sendData(baseURL + "users/popup-modal", data).done(function (response) {
            var resp = JSON.parse(response);
            $(".user-ajax-response").html(resp.view);
        });

    });

    //Assign Coupan to affiliate Members
    $(".u-assign-u").click(function () {
        var i = $(this).attr("data-i");
        var tr = $(this).closest("tr");
        $.confirm({
            title: "Assing Coupon",
            type: "green",
            content: function () {
                var self = this;
                var data = {
                    i: i,
                    v: "get",
                    _token: _token
                };
                return sendData(baseURL + "affiliate-members", data).done(function (d) {
                    self.setContent(d);
                });
            },
            buttons: {
                yes: {
                    text: "Yes",
                    btnClass: "btn btn-primary",
                    action: function () {
                        var c = this.$content.find('select').val();
                        if (c == "") {
                            $.alert({
                                title: "Error!",
                                content: "Select Coupon",
                            });
                            return false;
                        } else {
                            $.alert({
                                title: "Waiting -- ",
                                content: function () {
                                    var self = this;
                                    var data = {
                                        i: i,
                                        c: c,
                                        "_token": _token
                                    };
                                    self.setContent("Data is being processod.");
                                    return sendData(baseURL + "affiliate-members", data).done(function (d) {
                                        self.setContent(d);
                                        self.setTitle("Success!");
                                        self.setContent("Data has saved successfully.");
                                    });
                                },
                                buttons: {
                                    ok: {
                                        text: "OK",
                                        action: function () {
                                            tr.addClass("success");
                                        }
                                    }
                                }
                            });
                        }
                    }
                },
                no: {
                    text: "No"
                }

            }
        });
    });

    function urlTitle(txt_src) {
        var output = txt_src.replace(/[^a-zA-Z0-9]/g, ' ').replace(/\s+/g, "-").toLowerCase();
        /* remove first dash */
        if (output.charAt(0) == '-') output = output.substring(1);
        /* remove last dash */
        var last = output.length - 1;
        if (output.charAt(last) == '-') output = output.substring(0, last);

        return output;
    }

    function remove_special_char(txt_src) {
        var output = txt_src.replace(/[^a-zA-Z0-9]/g, ' ').replace(/\s+/g, " ");
        /* remove first dash */
        if (output.charAt(0) == '-') output = output.substring(1);
        /* remove last dash */
        var last = output.length - 1;
        if (output.charAt(last) == '-') output = output.substring(0, last);

        return output;
    }

    $(".cslug").keyup(function () {
        var v = $(this).val();
        var input = $(this).attr("data-link");
        $("input[name='" + input + "']").val(urlTitle(v));
    });

    $(".tcount").on("keyup change input paste", function (e) {
        var v = $(this).val();
        var t = $(this).attr("data-count");
        if (t == "text") {
            $(this).closest(".input-group").find(".countshow").text(v.length);
        } else {
            var words = v.split(",").filter(item => item);
            var ln = words.length;
            $(this).closest(".input-group").find(".countshow").text(ln);
        }
    });

    $(".toggle-password").click(function () {
        if ($(this).hasClass("fa-eye-slash")) {
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
            $(this).closest("div").find("input").attr("type", "text");
        } else {
            $(this).addClass("fa-eye-slash");
            $(this).removeClass("fa-eye");
            $(this).closest("div").find("input").attr("type", "password");
        }
    });

    $(document).on("click", ".sconfirm", function () {
        var c = window.confirm("Do you want to continue?");
        if (c) {
            return true;
        } else {
            return false;
        }
    });

    $(document).on("submit", ".fconfirm", function(){
        var c = window.confirm("Do you want to continue?");
		if (c){
			return true;
		}else{
			return false;
		}
    });

    $(".add-more-images a").click(function () {
        var m = $(".uc-image2").length;
        $(".uc-image2").each(function (index, value) {
            var indx = index + 1;
            $(this).find("input[type='hidden']").attr("name", "image" + indx);
            $(this).find(".image_display").attr("id", "image" + indx);
            $(this).find(".insert-media").attr("data-return", "#image" + indx);
            $(this).find(".insert-media").attr("data-link", "image" + indx);
        });
        var mc = parseInt(m) + 1;
        var d = '<div class="uc-image2" style="width:150px;height:150px;"><span class="close-image-x2">x</span>' +
            '<input type="hidden" name="image' + mc + '" value=""/>' +
            '<div id="image' + mc + '" class="image_display"></div>' +
            '<div style="margin-top:10px;">' +
            '<a class="insert-media btn btn-danger btn-sm" data-type="image" data-for="display" ' +
            'data-return="#image' + mc + '" data-link="image' + mc + '">Add Image</a>' +
            '</div>' +
            '</div>';
        $(".ext-image").before(d);
        $("input[name='total_images']").val(mc);
        return false;
    });

    $(document).on("click", ".close-image-x2", function () {
        var r = window.confirm("Do you wnat to delete image");
        if (r) {
            $(this).parent().remove();
            var mc = 1;
            $(".uc-image2").each(function () {
                $(this).find("input").attr("name", "image" + mc);
                $(this).find(".image_display").removeClass("image" + (mc + 1));
                $(this).find(".image_display").addClass("image" + mc);
                $(this).find(".insert-media").attr("data-return", "image" + mc);
                $(this).find(".insert-media").attr("data-link", "image" + mc);
                mc++;
            });
        }
        $("input[name='total_images']").val(mc);
    });

    $(document).on("click", ".close-image-x", function () {
        var r = window.confirm("Do you wnat to delete image");
        if (r) {
            $(this).parent().remove();
            var mc = 1;
            $(".uc-image").each(function () {
                $(this).find("input").attr("name", "image" + mc);
                $(this).find(".image_display").removeClass("image" + (mc + 1));
                $(this).find(".image_display").addClass("image" + mc);
                $(this).find(".insert-media").attr("data-return", "image" + mc);
                $(this).find(".insert-media").attr("data-link", "image" + mc);
                mc++;
            });
        }
        $("input[name='total_images']").val(mc);
    });

    $(document).on("click", ".clear-image-x", function () {
        var r = window.confirm("Do you wnat to delete image");
        if (r) {
            $(this).parent().find("input").val("");
            $(this).parent().find(".image_display").html("");
        }
    });

    $(".fetch_data").click(function () {
        var _this = $(this);
        var f = $(this).attr("data-get");
        var u = $(this).attr("data-input");
        u = $("input[name='" + u + "']").val();
        var data = "action=_fetch_data&u=" + u + "&f=" + f;
        var sm;
        $.ajax({
            "async": false,
            "type": "POST",
            "global": false,
            "dataType": "html",
            "url": ajaxReq,
            "data": data,
            "beforeSend": function () {
                _this.next(".fetch-preloder").remove();
                _this.after("<div class='fetch-preloder'><img src='" + baseURL + "images/icons/loader.gif'></div>");
            },
            "success": function (data) {
                sm = data;
                $(".fetch-preloder").html("<div class='suc'>Data has been fetched successfully.</div>");
            }
        });

        //$(".is_m_check").html(sm);
        var result = JSON.parse(sm);
        for (x in result) {
            var rs = 'input[name=' + x + ']'; // Get the input element of form
            var tr = "textarea[name='" + x + "']"; // Get the textarea of form

            if ($(tr).length > 0) {
                var text_id = $("textarea[name='" + x + "']").attr("id");
                $("textarea[name='" + x + "']").val(result[x]);
                if (text_id != undefined) {
                    tinymce.get(text_id).setContent(result[x]);
                    //tinyMCE.get(text_id).execCommand("mceInsertContent",true,result[x]);
                }
            } else if ($(rs).length > 0) {
                if ($(rs).attr('type') != "radio") {
                    $(rs).val(result[x]);
                } else if ($(rs).attr("type") == "radio") {
                    $('input[type=radio]').each(function (index, element) {
                        name = $(element).attr('name');
                        db_rod = result[name];
                        if ($(element).val() == db_rod) {
                            $(element).attr('checked', true);
                        }
                    });
                }
            }
        }

        $("input[name='" + u + "']").focus();
    });

    $(".add-row").click(function () {
        $("tbody").append($("template").html());
        $("tbody .lnk").each(function (i, e) {
            $(this).find("input").attr("id", "image" + i);
            $(this).find("a").attr("data-return", "#image" + i);
        });
    });



    // Save Form on press CTRL + S

    $(window).bind('keydown', function (event) {
        if (event.ctrlKey || event.metaKey) {
            switch (String.fromCharCode(event.which).toLowerCase()) {
                case 's':
                    event.preventDefault();
                    $(".product-add-form-q").click();
                    break;
            }
        }
    });

    $("span.adm-prev a").html('<i class="fa fa-chevron-left"></i>');
    $("span.adm-next a").html('<i class="fa fa-chevron-right"></i>');

    // creating slug
    $("#title").keypress(function (e) {
        var replaceSpace = $("#title").val();
        var result = replaceSpace.replace(/\s/g, "-");
        $("#slug").val(result);
    });

    // sending request to add new product hardware
    $("#brand_btn_submit").click(function (e) {
        var brnad_name = $("#brand_name").val();
        var data = "action=";
        e.preventDefault();
    });

    $(".rptBtnPnd").click(function () {
        var c = window.confirm("Do you want to continue?");
        var _el = $(this);
        if (c) {
            var id = $(this).attr("data-id");
            var type = $(this).attr("data-type");
            var status = $(this).attr("data-status");
            var data = {
                id: id,
                status: status,
                type: type,
                _token: $(".tokenId").val(),
            };
            sendData(baseURL + "changeReportStatus", data).done(function () {
                _el.hide();
            });
        }
        return false;
    });

});
if (seg2 == "blogs" && seg3 == "") {
    $('form').bind("keypress", function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
    $(document).ready(function () {
        _token = $('meta[name="csrf-token"]').attr('content');
        var pageURL = $(location).attr("href");
        var url = new URL(pageURL);
        var id = url.searchParams.get("id");
        var data = {};
        var data1 = {};
        data.id = id;
        data._token = _token;
        sendData(baseURL + "get-internal-links", data).done(function (resp) {
            var string = resp;
            var data1 = string.split(',');
            const data2 = [];
            data1.forEach(element => {
                data2.push(element.toLowerCase());
            });
            $(".tags_input").tagComplete({
                keylimit: 5,
                hide: false,
                freeInput: true,
                freeEdit: false,
                autocomplete: {
                    data: data2
                }
            });
        });

    });
}
$(".schma_type .fa-edit").click(function () {
    var _this = $(this).closest("span");
    _this.css('display', 'none');
    _this.closest("div").find("input[type=text]").css('display', 'block');

});
$(".___vw_dsb").click(function () {
    $(".___vw_dsb").removeClass("active");
    $(this).addClass("active");
    var m = $(this).attr("data-m");
    var d = {};
    if (m === "current_month") {
        d = JSON.parse($(".vw-cr-mn").html());
    } else if (m === "monthly") {
        d = JSON.parse($(".vw-cr-yr").html());
    } else {
        d = JSON.parse($(".vw-cr-an").html());
    }
    _____vchart(d["labels"], d["data1"]);
});

$(document).ready(function () {
    var cloneSchema =
        '<div class="new-schema border row">' +
        '<span class="clear-data2">x</span>' +
        '<div class="col-lg-12">' +
        '<div class="form-row">' +
        '<div class="form-group col-lg-12">' +
        '<div class="flex-center"><b>  <span class="no"> </span> &nbsp; - &nbsp;</b> <input type="text" name="type[]" placeholder="schema name here" value=""  > </div> <br>' +
        '<textarea rows="6" name="schema[]" class="form-control" placeholder="type Your Schema here..."  >  </textarea>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    $(".add-more-schema").click(function () {
        var html_obj = cloneSchema;
        $(".schema .schema-rows").append(html_obj);
        var n = $(".schema .schema-rows").find(".new-schema").length;
        var el = $(".schema .schema-rows .new-schema:nth-child(" + n + ")");
        el.find(".no").text(n);
        return false;
    });

    $(document).on("click", ".clear-data2", function () {
        var v = window.confirm("Do you want to delete data?");
        if (v) {
            $(this).closest(".row").remove();
        }
    });
});

$(document).ready(function () {
    checkWidth();
});
$(window).on("resize", function () {
    checkWidth();
});


function checkWidth() {
    $vWidth = $(window).width();
    $('#test').html($vWidth);

    //Check condition for screen width
    if ($("#getOffet").length) {
        var fixmeTop = $('#getOffet').offset().top; // get initial position of the element
        var outerWidthTop = $('#outer').innerWidth() - 18 + 'px'; // get initial position of the element

        $(window).scroll(function () { // assign scroll event listener

            var currentScroll = $(window).scrollTop() + 71; // get current position
            if (currentScroll >= fixmeTop) { // apply position: fixed if you
                $('.fixme').css({ // scroll to that element or below it
                    position: 'fixed',
                    top: '75px',
                    width: outerWidthTop
                });
            } else { // apply position: static
                $('.fixme').css({ // if you scroll above it
                    position: 'static'
                });
            }
        });
    }
}

$('.copyboard').on('click', function (e) {
    e.preventDefault();

    var copyText = $(this).attr('data-text');

    var textarea = document.createElement("textarea");
    textarea.textContent = copyText;
    textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");

    document.body.removeChild(textarea);

    var $el = $(this),
        x = 2000,
        originalColor = $el.css("color");

    $el.css("color", "#17a2b8");
    setTimeout(function () {
        $el.css("color", originalColor);
    }, x);
})

$(document).ready(function () {
    function _full_Ed() {
        tinymce.init({
            setup: function (editor) {
                editor.on("init", function () {
                    editor.shortcuts.remove('ctrl+s');
                });
            },
            mode: "specific_textareas",
            editor_selector: "oneditor",
            valid_children: '-p[img],+div[img],span[img]',
            plugins: [
                "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template paste textcolor"
            ],
            rel_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'No Referrer',
                    value: 'noreferrer'
                },
                {
                    title: 'No Opener',
                    value: 'noopener'
                },
                {
                    title: 'No Follow',
                    value: 'nofollow'
                }
            ],
            target_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Same Window',
                    value: '_self'
                },
                {
                    title: 'New Window',
                    value: '_blank'
                },
                {
                    title: 'Parent frame',
                    value: '_parent'
                }
            ],
            style_formats: [{
                title: 'Custom Bullet',
                selector: 'li',
                classes: 'cum_list',
                styles: {
                    "list-style-image": "https://svgsilh.com/svg/304167.svg"
                }
            }],
            style_formats_merger: true,
            toolbar: "insertfile undo redo | removeformat | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor emoticons ",
            theme_advanced_path: false,
            relative_urls: false,
            remove_script_host: false,
            theme_advanced_resizing: true,
            forced_root_block: 'p',

            style_formats: [{
                    title: 'Bold text',
                    inline: 'b'
                },
                {
                    title: 'Header 1',
                    block: 'h1'
                },
                {
                    title: 'Header 2',
                    block: 'h2'
                },
                {
                    title: 'Header 3',
                    block: 'h3'
                },
                {
                    title: 'Header 4',
                    block: 'h4'
                },
                {
                    title: 'Header 5',
                    block: 'h5'
                },
                {
                    title: 'Header 6',
                    block: 'h6'
                },
            ]
        });
    }
    _full_Ed();

});
