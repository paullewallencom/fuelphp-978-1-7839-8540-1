/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */
(function ($) {

    $.templateBootstrap = function (params) {
        params = $.extend({
            dom_id: '',
            texts: {
                newPanel: 'New Panel',
                ok : 'OK'
            }
        }, params);

        $(function () {
            var lock_click = false;
            var $parentWindowDom = parent.$(params.dom_id);
            var parentWindow$ = parent.$;
            var $dialogsContent = $parentWindowDom.find('.template-e-block');

            // Add Button for customisation
            $('.customisable').each(function () {
                var animate = '';
                var $this = this.id;

                if ($this.search('side') != -1) {
                    animate = 'style="position: relative; top: -30px; float: right; z-index: 40; ';
                } else if ($this == 'header') {
                    animate = 'style="position: relative; top: 10px; z-index: 40; display: inline-block; vertical-align: top;';
                } else if ($this == 'principal') {
                    if ($('#header').parent().hasClass('header-fixed')) {
                        animate = 'style="position: fixed; top: 10px; left: 50%; z-index: 50;';
                    } else {
                        animate = 'style="position: absolute; top: 10px; left: 50%; z-index: 40;';
                    }
                } else {
                    animate = 'style="position: relative; top: 0px; float: left; z-index: 40;';
                }

                animate += '"'
                $(this).prepend('<button type="button" data-block = "' + $this + '" class = "btn_custom" ' + animate + '>' +
                    '<i class="glyphicon glyphicon-cog"></i></button>');
            });

            $(document).on('mouseenter', '.customisable#header >', function (e) {
                var $selector = $('.customisable , .main_wysiwyg');
                $selector.clearQueue();
                $('.btn_custom').clearQueue();
                $selector.not('#principal').not('.side_bar').not($(this).parent()).animate({opacity: '0.2'}, 300);
            });

            $(document).on('mouseleave', '.customisable#header >', function (e) {
                var $selector = $('.customisable , .main_wysiwyg');
                $selector.clearQueue();
                $('.btn_custom').clearQueue();
                if (lock_click == false) {
                    if (this.id != 'principal')
                        $selector.animate({opacity: '1'}, 300);
                }
            });

            $(document).on('mouseenter', '.customisable', function (e) {
                $('.customisable , .main_wysiwyg').clearQueue();
                $('.btn_custom').clearQueue();

                if (this.id != 'header' && this.id != 'principal') {
                    var $selector = $('.customisable , .main_wysiwyg').not('#principal').not('.side_bar').not($(this));

                    if ($(this).hasClass('side_bar')) {
                        $selector.not($(this).find('.customisable')).animate({opacity: '0.2'}, 300);
                    } else if ($(this).parent().hasClass('side_bar')) {
                        $selector.not($(this).parent()).animate({opacity: '0.2'}, 300);
                    } else {
                        $selector.animate({opacity: '0.2'}, 300);
                    }
                }
            });

            $(document).on('mouseleave', '.customisable', function (e) {
                var $selector = $('.customisable , .main_wysiwyg');
                var id = this.id;

                $selector.clearQueue();
                $('.btn_custom').clearQueue();

                if (lock_click == false) {
                    if (id != 'header' && id != 'principal') {
                        if (id != 'principal') {
                            $selector.animate({opacity: '1'}, 300);
                        }
                    }
                }
            });

            $(document).on('click', 'a', function () {
                return false;
            })

            var wysiwyg_enhancer = function () {
                var $enhancer = $(this);
                var enhancer_id = $enhancer.data('enhancer');
                var data = $.extend(true, {enhancer: enhancer_id}, $enhancer.data('config'));
                $.ajax({
                    url: 'admin/noviusos_template_bootstrap/ajax/enhancer',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (json) {
                        $enhancer.html($.trim(json.preview));
                    },
                    error: function () {
                        $enhancer.html('Error');
                    }
                });
            };

            // Click on button to open dialog
            $(document).on('click', '.btn_custom', function (e) {
                var $button = $(this);
                var dataForm = $button.data('block');
                var $div = $parentWindowDom.find('.template-e-' + dataForm);
                var $parent = $div.parent();
                var twitter_account = '';
                var title = $div.data('title-popup');
                var width = $div.data('width');
                var height = $div.data('height');

                if (dataForm.search('blocks-twitter') != -1) {
                    twitter_account = $('#' + dataForm).attr('data-twitter-account');
                }

                if (!isNaN(height)) {
                    height = parseInt(height);
                }

                lock_click = true;
                e.preventDefault();

                $div.nosDialog({
                    title: title,
                    content: $div.show(),
                    width: width,
                    minHeight: height,
                    buttons: [
                        { text: params.texts.ok,
                            click: function () {
                                $div.nosDialog('close');
                            }
                        }
                    ],
                    open: function () {
                        $div.nosOnShow();
                    },
                    close: function () {
                        var $textareas = $div.find('textarea').not($div.find('[name="css_style"]')).each(function () {
                            var $textarea = parentWindow$(this);
                            var ed = $textarea.tinymce();
                            var inputName = $textarea.attr('name');
                            var $target = $($textarea.data('target'));
                            var $field;
                            if (ed) {
                                ed.save();
                                ed.remove();
                            }
                            $target.html($textarea.val())
                                .find('.nosEnhancer, .nosEnhancerInline').each(wysiwyg_enhancer);

                        });
                        $div.hide().appendTo($parent);
                        $textareas.each(function () {
                            var $textarea = parentWindow$(this);
                            $textarea.wysiwyg($textarea.data('wysiwyg-options'));
                        });
                        lock_click = false;
                        $(".customisable").animate({opacity: "1"}, 300);
                        $(".btn_custom").animate({opacity: "1"}, 300);

                        var account_name = $div.find(':text[name*="account_name"]').val();
                        if ($div.attr("class").search("blocks-twitter") != -1 && twitter_account != account_name) {
                            $("#" + dataForm + " iframe").replaceWith(' <a class="twitter-timeline"  href="https://twitter.com" ' +
                                'data-widget-id="448388405479501824"' +
                                'data-screen-name="' + account_name + '"' +
                                'height="500" data-tweet-limit="">' +
                                'Bad account name</a>');
                            $('#' + dataForm).attr('data-twitter-account', account_name);
                            twitter(document, 'script', 'twitter-wjs');
                        }

                        if ($div.hasClass("template-e-principal")) {
                            $('head style').html($div.find('[name="css_style"]').val());
                        }

                        if ($div.hasClass("template-e-block-grid")) {
                            var val_tab = $div.find('[name="wysiwyg_layout"]').attr("value");

                            $.ajax({
                                url: "admin/noviusos_template_bootstrap/ajax/grid",
                                type: "POST",
                                dataType: "html",
                                data: "grid=" + val_tab,
                                error: function () {
                                    log('Error in template creation');
                                },
                                success: function (msg) {
                                    $("#grid_content_layout").html(msg);
                                }
                            });
                        }
                    }
                });
            });

            $(document).find('.nosEnhancer, .nosEnhancerInline').each(wysiwyg_enhancer);

            var $divSideBars = $parentWindowDom.find('[class*="template-e-side-"]').nosOnShow('one', function () {
                var $div = parentWindow$(this);
                var side = ($div.hasClass('template-e-side-left') ? 'left' : 'right');

                var saveInputOrder = function ($div, side) {
                    var temp_string = '';
                    var name = '';
                    var $checkbox = '';
                    var $select = $div.find('select');
                    var count_panel = 0;
                    var panel_title = '';

                    $div.find(':checkbox[name^="' + side + '"]').each(function () {
                        if (parentWindow$(this).parent('li').hasClass('active')) {
                            temp_string += parentWindow$(this).attr('name') + '||';
                        }
                    });
                    temp_string = temp_string.substring(0, temp_string.length - 2);
                    $div.find('input[name="_input_hidden_' + side + '"]').val(temp_string);

                    if ($div.find('input[name="_input_hidden_' + side + '"]').val() != '') {
                        var temp_tab = $div.find('input[name="_input_hidden_' + side + '"]').val().split('||');

                        $select.find('option').show();
                        for (var i = 0; i < (temp_tab.length); i++) {
                            $checkbox = $div.find(':checkbox[name="' + temp_tab[i] + '"]');
                            name = $checkbox.data('target');
                            $(name).appendTo($("#side-" + side));
                            if (name.search("blocks-twitter") != -1) {
                                $(name + " iframe").replaceWith(' <a class="twitter-timeline"  href="https://twitter.com" ' +
                                    'data-widget-id="448388405479501824"' +
                                    'data-screen-name="' + $(name).attr("data-twitter-account") + '"' +
                                    'height="500" data-tweet-limit="">' +
                                    'Bad account name</a>');
                                twitter(document, "script", "twitter-wjs");
                            }
                            if ($checkbox.is(":checked")) {
                                $(name).show();
                            }

                            // Display of Select options
                            if (name.search("panel") != -1) {
                                count_panel++
                                if (count_panel == 5) {
                                    $select.find('[value = "panel"]').hide();
                                }
                                panel_title = $(name).find(".panel-heading .panel-title").html();
                                $checkbox.next().html(panel_title);
                                $input = $dialogsContent.find($checkbox.data("admin-target"));
                                if ($input.val() == params.texts.newPanel) {
                                    $dialogsContent.find($input.data("admin-target")).text(params.texts.newPanel);
                                }
                            }
                            else {
                                $select.find('[value = "' + $checkbox.attr("name") + '"]').hide();
                            }
                        }
                    }
                };

                // Init sortable
                $div.find('.template-e-ul_sort').sortable({
                    stop: function (e, ui) {
                        saveInputOrder($div, side);
                    }
                });

                // load input order
                $div.find('.template-e-ul_sort').disableSelection();

                var temp_tab = $div.find("input[name='_input_hidden_" + side + "']").val().split("||");

                $div.find(":checkbox").each(function () {
                    var $checkbox = parentWindow$(this);
                    $checkbox.closest("li").hide();
                    checkboxController($checkbox, $($checkbox.data('target')));
                });

                for (var i = 0; i < temp_tab.length; i++) {
                    if (temp_tab[i] != "") {
                        var closest = $div.find("input[name='" + temp_tab[i] + "']").closest("li");
                        var $checkbox = $div.find("input[name='" + temp_tab[i] + "']");
                        closest.addClass("active").show().insertAfter(closest.nextAll("li.active:last"));
                    }
                }

                saveInputOrder($div, side);

                $div.find('.btn_suppr_panel').on('click', function () {
                    var $button = parentWindow$(this);
                    var $component = $div.find("input[name='" + $button.data("input") + "']");
                    if ($component.prop("checked") == true) {
                        $component.trigger("click");
                    }
                    $component.closest("li").hide().removeClass("active");
                    saveInputOrder($div, side);
                });

                $div.find("select[name^='_select_']").on("change", function () {
                    var $select = parentWindow$(this);
                    var side = $select.attr("name").split("_")[2];
                    var $option = $div.find("[name='" + $select.attr("name") + "'] :selected");
                    var $option_name = $option.attr("value");

                    var temp_option_name = $option_name;

                    if ($option_name == "panel") {
                        for (var i = 1; i < 6; i++) {
                            if (!$div.find("[name='" + side + "-blocks-panel_" + i + "-display']").parent("li").hasClass("active")) {
                                $option_name = side + "-blocks-panel_" + i + "-display";
                                break;
                            }
                        }
                    }

                    var $checkbox = $div.find("[name='" + $option_name + "']");

                    if (temp_option_name == 'panel') {
                        var $input = $dialogsContent.find($checkbox.data("admin-target"));
                        $input.val(params.texts.newPanel);
                        var $block = $($checkbox.data("target"));
                        $block.find(".panel-title").html(params.texts.newPanel);
                    }

                    $checkbox.closest("li").show().addClass("active").appendTo($checkbox.closest("ul"));
                    $div.find("select[name^='_select'] option[value='']").prop("selected", true);

                    var $bloc = $($checkbox.data("target"));
                    $bloc.appendTo($bloc.parent());

                    if ($checkbox.prop("checked") == false) {
                        $checkbox.trigger("click");
                    }
                    saveInputOrder($div, side);
                });

                $div.find(".btn_config_panel").on('click', function (e) {
                    var $button = parentWindow$(this);
                    $($button.data("block")).find('.btn_custom').click();
                });

                $div.find(".btn_write_panel").on('click', function (e) {
                    var $button = parentWindow$(this);
                    var $label = $div.find('#label_' + $button.data("input"));
                    var $checkbox = $div.find('#' + $label.attr("for"));
                    var $input = $("<input type='text'>");
                    $label.parent().parent().enableSelection();
                    $label.replaceWith($('<input/>').attr('type', 'text')
                        .val($label.text())
                        .attr("value", $label.text())
                        .attr("name", "ipt_temp")
                        .blur(function () {
                            $(this).replaceWith($label.html($(this).val()));
                            $($checkbox.data("target") + " .panel-title").html($(this).val());
                            $dialogsContent.find($checkbox.data("admin-target")).val($(this).val());
                            $label.parent().parent().disableSelection();
                        })
                    );
                    $div.find(":text").focus();
                });
            });
            
            $parentWindowDom.find('.template-e-header').nosOnShow('one', function () {
                var $div = parentWindow$(this);
                var $select_title = $div.find('select[name="header-type"]');
                var HeaderSelect = function ($div) {
                    if ($select_title.val() == "title") {
                        $div.find('input[name="medias->logo->medil_media_id"]').closest("tr").hide();
                        $div.find('input[name="header-title"]').closest("tr").show();
                        $div.find('input[name="header-baseline"]').closest("tr").show();
                    } else if ($select_title.val() == "image") {
                        $div.find('input[name="header-title"]').closest("tr").hide();
                        $div.find('input[name="header-baseline"]').closest("tr").hide();
                        $div.find('input[name="medias->logo->medil_media_id"]').closest("tr").show();
                    } else {
                        $div.find('input[name="medias->logo->medil_media_id"]').closest("tr").show();
                        $div.find('input[name="header-title"]').closest("tr").show();
                        $div.find('input[name="header-baseline"]').closest("tr").show();
                    }
                };
                HeaderSelect($div);
                $select_title.change(function () {
                    HeaderSelect($div);

                    if ($select_title.val() == "title") {
                        $("#header-title").show("slow")
                            .parent().attr("class", "titleonly");
                        $("#header-baseline").show("slow");
                        $("#header-logo , #header-logo-small").hide("slow");
                    } else if ($select_title.val() == "image") {
                        $("#header-title").hide("slow");
                        $("#header-baseline").hide("slow");
                        $("#header-logo").show("slow");
                    } else {
                        $("#header-title").show("slow")
                            .parent().attr("class", "title");
                        $("#header-baseline").show("slow");
                        $("#header-logo").show("slow");
                    }
                });

                $div.find(":checkbox[name='header-fixed']").click(function () {
                    var $header = $("#header").parent();
                    var $middle_content = $("#middle_content").parent();
                    var $footer = $("#footer");
                    var $button = $("#principal > button");

                    if ($(this).prop("checked") == true) {
                        $header.addClass("header-fixed");
                        $middle_content.addClass("middle-header-fixed");
                        $footer.addClass("middle-header-fixed");
                        $button.css("position", "fixed").css("z-index", "50");
                    }
                    else {

                        $header.removeClass("header-fixed");
                        $middle_content.attr("class", "row");
                        $footer.removeClass("middle-header-fixed");
                        $button.css("position", "absolute").css("z-index", "40");
                    }

                });
            });

            $parentWindowDom.find('.template-e-principal').nosOnShow('one', function () {
                var $div = parentWindow$(this);

                // Change select value of side bar
                $div.find("[name='_sidebar-display']").change(function () {
                    var $select = parentWindow$(this);
                    var writeClasses = function (oldC, newC) {
                        var tab_old = oldC.split(" ");
                        var tab_new = newC.split(" ");
                        var string_old = "";
                        var string_new = "";
                        var lock = false;

                        for (var i = 0; i < tab_old.length; i++) {
                            lock = false;
                            for (var j = 0; j < tab_new.length; j++) {
                                if (tab_old[i] == tab_new[j]) {
                                    lock = true;
                                    break;
                                }
                            }
                            if (lock == false) {
                                string_old += tab_old[i] + " ";
                            }
                        }

                        for (var i = 0; i < tab_new.length; i++) {
                            lock = false;
                            for (var j = 0; j < tab_old.length; j++) {
                                if (tab_new[i] == tab_old[j]) {
                                    lock = true;
                                    break;
                                }
                            }
                            if (lock == false) {
                                string_new += tab_new[i] + " ";
                            }
                        }

                        var tab_return = new Array(2);
                        tab_return[0] = string_old;
                        tab_return[1] = string_new;

                        return tab_return;
                    };
                    var $middle_content = $("#middle_content");
                    var tab;

                    var $left = $("#side-left");
                    var $right = $("#side-right");
                    switch ($select.val()) {
                        case "left":
                            $left.show("slow");
                            $right.hide("slow");

                            tab = writeClasses($middle_content.attr("class"), " col-md-8 col-sm-9 col-xs-12")
                            $middle_content.switchClass(tab[0], tab[1]);
                            break;

                        case "right":
                            $right.show("slow");
                            $left.hide("slow");

                            tab = writeClasses($middle_content.attr("class"), "col-md-offset-1 col-sm-offset-1 col-md-8 col-sm-9 col-xs-12");
                            $middle_content.switchClass(tab[0], tab[1]);
                            break;

                        case "none":
                            $right.hide("slow");
                            $left.hide("slow");

                            tab = writeClasses($middle_content.attr("class"), "col-md-12 col-sm-12 col-xs-12");
                            $middle_content.switchClass(tab[0], tab[1]);
                            break;

                        case "both":
                            $right.show("slow");
                            $left.show("slow");
                            tab = writeClasses($middle_content.attr("class"), "col-md-6 col-sm-9 col-xs-12");
                            $middle_content.switchClass(tab[0], tab[1]);
                            break;
                    }
                });

                //Change skin
                $div.find("[name='principal-skin']").change(function () {
                    setStyleSheet($div.find("#" + this.id + " :selected").attr("value"));
                });

                // Checkbox jumbotron
                $jumbotron = $div.find(":checkbox[name='jumbotron-display']");
                checkboxController($jumbotron, $("#jumbotron"));

                // Checkbox  Fixed background
                $fixed_background = $div.find(":checkbox[name='principal-background_fixed_display']");

                $fixed_background.click(function () {
                    var $body = $("body");
                    if ($(this).prop("checked")) {
                        $body.css("background-attachment", "fixed");
                    }
                    else {
                        $body.css("background-attachment", "inerit");
                    }
                });
            });

            $parentWindowDom.find('.template-e-block').nosOnShow('one', function () {
                var $div = parentWindow$(this);

                $div.find("select[name^='_select'] option[value='']").prop('selected', true);

                //Change on a input text
                $div.find(":text").not(".template-e-select-media, [name*='twitter-account_name'], .template-e-select-menu").on('keydown change focusout', function () {
                    var $input = parentWindow$(this);
                    var inputTarget = $input.data("target");
                    var inputAdminTarget = $input.data("admin-target");
                    var $field = $(inputTarget);
                    var $divfield = $dialogsContent.find(inputAdminTarget);


                    if (inputTarget == "body") {
                        var temp = $input.val().split(";");
                        var tab_temp = "";

                        $("body").css({
                            backgroundRepeat: "initial",
                            backgroundPosition: "initial"
                        }).css("background-size", "initial");

                        if ($div.find(":checkbox[name='principal-background_fixed_display']").prop("checked")) {
                            $("body").css("background-attachement", "fixed");
                        }

                        for (var i = 0; i < temp.length; i++) {
                            tab_temp = temp[i].split(":");
                            $("body").css($.trim(tab_temp[0]), $.trim(tab_temp[1]));
                        }
                    } else if (inputTarget.search(" link") != -1) {
                        $field = $(inputTarget.split(' link')[0]);
                        if ($input.val() == "") {
                            $field.attr("href", "");
                        } else {
                            $field.attr("href", $input.val());
                        }

                        $(".social > li > a ").each(function () {
                            var $this = $(this);
                            if ($this.attr("href") != "") {
                                $this.parent().show();
                            } else {
                                $this.parent().hide();
                            }
                        });
                    } else {
                        $field.html($input.val())
                        $divfield.html($input.val());
                    }
                });

                $div.find('.template-e-select-menu').change(function () {
                    var $input = parentWindow$(this);
                    var name = $input.attr("name").split("->")[1];
                    if ($input.val() || name == 'principal') {
                        $.ajax({
                            type: 'GET',
                            dataType: 'html',
                            url: 'admin/noviusos_template_bootstrap/ajax/menu',
                            data: {
                                menu_id: $input.val(),
                                menu_type: name,
                                framework: 'bootstrap',
                                context: $parentWindowDom.closest('.nos-dispatcher, body').data('nosContext')
                            },
                            success: function (data) {
                                var selector = '';
                                switch (name) {
                                    case 'principal':
                                        selector = 'list-menu';
                                        break;
                                    case 'left':
                                        selector = 'list-left-menu';
                                        break;
                                    case 'right':
                                        selector = 'list-right-menu';
                                        break;
                                    case 'footer':
                                        selector = 'list-footer-menu';
                                        break;
                                }
                                if (data != "") {
                                    $('#' + selector).replaceWith(data);
                                }
                                else {
                                    $('#' + selector).html("");
                                }
                            }
                        });
                    } else {
                        var selector = '';
                        switch (name) {
                            case 'left':
                                selector = 'list-left-menu';
                                break;
                            case 'right':
                                selector = 'list-right-menu';
                                break;
                            case 'footer':
                                selector = 'list-footer-menu';
                                break;
                        }
                        $('#' + selector).hide();
                    }
                });

                $div.find(".ui-inputfilethumb-fileaction").click(function () {
                    $div.find(":text[name*='medias->']").val("").trigger("change");
                });

                $div.find('.template-e-select-media').change(function () {
                    var $input = parentWindow$(this);
                    var $field = $($input.data("target"));
                    var media_change = function (item) {
                        if ($field.get(0).nodeName == "BODY") {
                            if (!item) {
                                $field.removeClass("background");
                                $field.attr("style", "");
                            } else {
                                $field.addClass("background");
                                $field.attr("style", "background : url('" + item.url + "') no-repeat center center fixed");
                            }
                        } else if ($field.find('img').length) {
                            if (!item) {
                                $field.find('img').attr('src', '');
                            } else {
                                $field.find('img').attr({
                                    src: item.url,
                                    width: item.width,
                                    height: item.height
                                });
                            }
                        }
                    };

                    if ($input.val()) {
                        $.ajax({
                            method: 'GET',
                            url: 'admin/noviusos_template_bootstrap/ajax/media/' + $input.val(),
                            dataType: 'json',
                            success: function (item) {
                                media_change(item);
                            }
                        });
                    } else {
                        media_change();
                    }
                });
            });
        });

        function checkboxController($checkbox, $component) {
            showComponent($checkbox, $component);
            $checkbox.click(function () {
                showComponent($checkbox, $component);
            });
        }

        function showComponent($checkbox, $component) {
            if ($checkbox.is(":checked")) {
                $component.show("slow");
            }
            else {
                $component.hide("slow");
            }
        }
    };
})(jQuery);
