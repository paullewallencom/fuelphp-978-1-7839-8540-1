/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

define(
    [
        'jquery-nos'
    ],
    function ($) {
        "use strict";
        return function (data) {

            data = $.extend({
                form_id: '',
                tpvar_id: '',
                texts: {
                    deletePanel: 'Delete',
                    managePanel: 'Manage',
                    editPanelName: 'Edit name'
                }
            }, data);

            var $container = $('#' + data.form_id + ' .nos-fixed-content');
            var $dispatcher = $container.closest('.nos-dispatcher, body');
            var $config_div = $container.find('> div:last');

            $container.nosOnShow('one', function () {
                var $container_iframe = $('<div class="template-e-iframe"></div>').appendTo($container)
                    .css('top', $config_div.position().top + 'px');
                var $template = $dispatcher.find('select[name=tpvar_template]');

                $('<iframe src="admin/noviusos_template_bootstrap/visualise?context=' + $dispatcher.data('nosContext') +
                    '&template=' + $template.val() +
                    '&tpvar_id=' + (data.tpvar_id ? data.tpvar_id : '') +
                    '&dom_id=' + data.form_id + '"></iframe>')
                    .appendTo($container_iframe);
            });

            $container.find('[class*="template-e-side-"]').nosOnShow('one', function () {
                var $div = $(this);
                var $str;
                var $str_select = '';

                // Transform TR in LI
                var $ul = $('<ul class="template-e-ul_sort"></ul>');
                $div.find("tr").each(function () {
                    var $tr = $(this);
                    if ($tr.has("td :checkbox").length) {
                        var $li = $('<li></li>').html($tr.find('td').html() + $tr.find('th').html())
                            .appendTo($ul);
                        $('<button data-icon="trash"></button>').addClass('btn_suppr_panel')
                            .attr('type', 'button')
                            .attr('data-input', $tr.find("td input").attr("name"))
                            .attr('data-icon', 'trash')
                            .attr('data-text', 'false')
                            .text(data.texts.deletePanel)
                            .appendTo($li);

                        $('<button></button>').addClass('btn_config_panel')
                            .attr('type', 'button')
                            .attr('data-block', $tr.find("td input").data("target"))
                            .attr('data-icon', 'gear')
                            .attr('data-text', 'false')
                            .text(data.texts.managePanel)
                            .appendTo($li);

                        if ($tr.has("td :checkbox[name*='panel']").length) {
                            $('<button></button>').addClass('btn_write_panel')
                                .attr('type', 'button')
                                .attr('data-input', $tr.find("td input").attr("name"))
                                .attr('data-icon', 'pencil')
                                .attr('data-text', 'false')
                                .text(data.texts.editPanelName)
                                .appendTo($li);
                        }
                    } else {
                        $str_select = $tr.find("td").html() + $tr.find("th").html();
                    }
                });
                $str = $div.find('input[type=hidden]').get(0).outerHTML;
                $div.empty()
                    .append($ul)
                    .append($str_select)
                    .append($str)
                    .nosFormUI();

                $div.find('li').addClass('ui-widget-content ui-helper-clearfix')
                    .hover(function () {
                        $(this).addClass('ui-state-hover');
                    }, function () {
                        $(this).removeClass('ui-state-hover');
                    });
            });
        }
    });