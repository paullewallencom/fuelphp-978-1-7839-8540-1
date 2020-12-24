/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */
define('jquery-nos-virtualname',
    ['jquery-nos'],
    function($) {
        "use strict";

        $.fn.extend({
            nosVirtualName : function(options) {
                var replace_url = function(str) {
                        if (!str) {
                            return str;
                        }
                        var i = 0, regexps;

                        for (i; i < options.length; i++) {
                            regexps = options[i];
                            $.each(regexps, function(regexp, replacement) {
                                if (!isNaN(regexp) && replacement === 'lowercase') {
                                    str = str.toLowerCase();
                                } else if ($.isPlainObject(replacement)) {
                                    var flags = (replacement['flags'] || '').replace('g', '') + 'g';
                                    var replacement = replacement['replacement'] || '';
                                    var re = new RegExp(regexp, flags);
                                    str = str.replace(re, replacement);
                                } else {
                                    var re = new RegExp(regexp, 'g');
                                    str = str.replace(re, replacement);
                                }
                            });
                        }

                        return str;
                    };

                return this.each(function() {
                    var $virtual_name = $(this).bind('context_common_field', function() {
                            var $div,
                                $el = $(this),
                                click = $el.data('click_context_common_field');

                            $el.data('click_context_common_field', function() {
                                click();
                                $use_title_checkbox.prop('disabled', false);
                            });
                            $use_title_checkbox.prop('disabled', true);
                            $div = $('<div class="js_context_common_field"></div>')
                                .insertAfter($use_title_checkbox)
                                .click(function() {
                                    var dialog = $el.data('dialog_context_common_field');
                                    if ($el.is(':disabled')) {
                                        dialog.call($el, function() {
                                            click();
                                            $use_title_checkbox.prop('disabled', false);
                                            $div.detach();
                                        });
                                    }
                                });
                            $use_title_checkbox.parent().on('mousemove', function() {
                                $div.css({
                                    position: 'absolute',
                                    width: $use_title_checkbox.outerWidth() + 'px',
                                    height: $use_title_checkbox.outerHeight() + 'px'
                                }).position({
                                        my: 'top left',
                                        at: 'top left',
                                        collision: 'none',
                                        of: $use_title_checkbox
                                });
                            }).trigger('mousemove');
                        }),
                        id = $virtual_name.attr('id'),
                        $use_title_checkbox = $('#' + id + '__use_title_checkbox'),
                        $title = $virtual_name.closest('form').find('input.ui-priority-primary');

                    var useTitle = $virtual_name.data('usetitle');

                    if (typeof useTitle !== 'undefined' && useTitle == 1) {
                        $use_title_checkbox.prop('checked', true);
                    }

                    $use_title_checkbox.change(function() {
                        if ($(this).is(':checked')) {
                            $virtual_name.attr('readonly', true).addClass('ui-state-disabled');
                            $title.triggerHandler('change');
                        } else {
                            $virtual_name.removeAttr('readonly').removeClass('ui-state-disabled');
                        }
                    }).triggerHandler('change');

                    $title.bind('change keyup', function() {
                        if ($use_title_checkbox.is(':checked')) {
                            $virtual_name.val(replace_url($title.val()));
                        }
                    });
                });
            }
        });

        return $;
    });
