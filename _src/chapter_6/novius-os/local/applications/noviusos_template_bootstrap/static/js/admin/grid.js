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
                tpvar_id: ''
            }, data);

            var int_nb_lines;
            var int_nb_rows;
            var tab_grid;
            var int_id_new_cell = 1;
            var tab_css;

            // initial : at drag/resize start
            // final : at drag/resize stop

            var x_init_px; // initial X coordonate in px
            var y_init_px; // initial y coordonate in px
            var x_init_grid; // initial X coordonate in grid frame
            var y_init_grid; // initial Y coordonate in grid frame
            var x_final_grid; // final X coordonate in grid frame
            var y_final_grid; // final X coordonate in grid frame
            var h_init_px; // initial height in px
            var w_init_px; // initial width in px
            var h_final_px; // final height in px
            var w_final_px; // final width in px
            var h_init_grid;  // initial height in grid frame
            var w_init_grid;  // initial width in grid frame
            var h_final_grid; // final height in grid frame
            var w_final_grid; // final width in grid frame

            int_nb_lines = 12;
            int_nb_rows = 12;
            tab_grid = new Array(int_nb_lines);
            int_id_new_cell = 1;
            tab_css = new Array(1);

            var $wysiwyg_layout = $('[name="wysiwyg_layout"]');
            var $block_grid = $(".template-e-block-grid");
            var $div_grid = $("#div_grid");

            function display_tab() {
                var tmp_string = "";
                for (var i = 0; i < int_nb_lines; i++) {
                    for (var j = 0; j < int_nb_rows; j++) {
                        tmp_string += tab_grid [i][j] + " ";
                    }
                    tmp_string = tmp_string.substr(0, tmp_string.length - 1);
                    tmp_string += "|";
                }
                tmp_string = tmp_string.substr(0, tmp_string.length - 1)
                $wysiwyg_layout.attr("value", tmp_string);
            }

            //--------------------------------------
            // Init JS table
            //--------------------------------------

            for (var i = 0; i < int_nb_lines; i++) {
                tab_grid[i] = new Array(int_nb_rows);
            }

            for (var i = 0; i < int_nb_lines; i++) {
                for (var j = 0; j < int_nb_rows; j++) {
                    tab_grid [i][j] = 0;
                }
            }

            //--------------------------------------
            // Init Html Grid
            //--------------------------------------

            for (var i = 0; i <int_nb_lines; i++) {
                $div_grid.prepend("<div id='div_l" + i + "' class='row'></div>");
                for (var j = 0; j < int_nb_rows; j++) {
                    $("#div_l" + i).append("<div id='div_l" + i + "_c" + j + "' class='cell'></div>");
                }
            }

            var string_tab = $wysiwyg_layout.val();
            load_grid(string_tab);

            $(".grid_pattern").click(function () {
                load_grid($(this).find('input[type="hidden"]').val());
            });

            //--------------------------------------
            // Keybord control
            //--------------------------------------

            //Delete Key
            $(document).keypress(function (e) {
                if (e.keyCode == 46) {
                    $("button[id='btn_suppr']").trigger("click");
                }
            });

            //--------------------------------------
            // Grid control Buttons
            //--------------------------------------

            // Clear the grid
            $("button[id='btn_vider']").click(function () {

                for (var t = 0; t < int_nb_lines; t++) {
                    for (var s = 0; s < int_nb_rows; s++) {
                        tab_grid[t][s] = 0;
                    }
                }
                $(".cell_new").remove();
            });

            // Delete an element
            $("button[id='btn_suppr']").click(function () {
                var cell = $(".selected");

                x_init_px = cell.css("top");
                y_init_px = cell.css("left");

                x_init_grid = (parseInt(x_init_px) - 4) / 48;
                y_init_grid = (parseInt(y_init_px) - 4) / 48;

                h_init_grid = ((parseInt(cell.css("height")) - 40) / 48 ) + 1;
                w_init_grid = ((parseInt(cell.css("width")) - 40) / 48) + 1;

                for (var t = x_init_grid; t < h_init_grid + x_init_grid; t++) {
                    for (var s = y_init_grid; s < w_init_grid + y_init_grid; s++) {
                        tab_grid[t][s] = 0;
                    }
                }
                $(".selected").remove();
            });

            $block_grid.on("dragstart", ".cell_new", function (e, ui) {
                x_init_px = $(this).css("top");
                y_init_px = $(this).css("left");
                $(this).trigger("click");
            });

            $block_grid.on("dragstop", ".cell_new", function (event, ui) {

                var collision = false;

                var $this = $(this);
                x_final_grid = (parseInt($this.css("top")) - 4) / 48;
                y_final_grid = (parseInt($this.css("left")) - 4) / 48;

                x_init_grid = (parseInt(x_init_px) - 4) / 48;
                y_init_grid = (parseInt(y_init_px) - 4) / 48;

                h_final_grid = ((parseInt($this.css("height")) - 40) / 48 ) + 1;
                w_final_grid = ((parseInt($this.css("width")) - 40) / 48) + 1;

                collision:
                    for (var t = x_final_grid; t < h_final_grid + x_final_grid; t++) {
                        for (var s = y_final_grid; s < w_final_grid + y_final_grid; s++) {
                            if (tab_grid[t][s] != 0 && tab_grid[t][s] != $this.attr("data-new")) {
                                collision = true
                                break collision;
                            }
                        }
                    }

                if (collision) {
                    $this.draggable('disable');
                    var $obj = $this;
                    $this.animate({
                        top: x_init_px,
                        left: y_init_px
                    }, 200, function () {
                        $(this).draggable('enable');
                    });
                }
                else {
                    if (j != y_init_grid || i != x_init_grid) {
                        for (var t = x_init_grid; t < h_final_grid + x_init_grid; t++) {
                            for (var s = y_init_grid; s < w_final_grid + y_init_grid; s++) {
                                tab_grid[t][s] = 0;
                            }
                        }
                    }

                    for (var t = x_final_grid; t < h_final_grid + x_final_grid; t++) {
                        for (var s = y_final_grid; s < w_final_grid + y_final_grid; s++) {
                            tab_grid[t][s] = $this.attr("data-new");
                        }
                    }
                }
            });

            $block_grid.on("resizestart", ".cell_new", function (e, ui) {
                var $this = $(this);
                h_init_px = $this.css("height");
                w_init_px = $this.css("width");
                $this.trigger("click");
            });

            $block_grid.on("resizestop", ".cell_new", function (e, ui) {
                var collision = false;

                var $this = $(this);
                x_final_grid = (parseInt($this.css("top")) - 4) / 48;
                y_final_grid = (parseInt($this.css("left")) - 4) / 48;

                h_final_px = $this.css("height");
                w_final_px = $this.css("width");

                h_init_grid = ((parseInt(h_init_px) - 40) / 48 ) + 1;
                w_init_grid = ((parseInt(w_init_px) - 40) / 48) + 1;

                h_final_grid = ((parseInt(h_final_px) - 40) / 48 ) + 1;
                w_final_grid = ((parseInt(w_final_px) - 40) / 48) + 1;

                collision:
                    for (var t = x_final_grid; t < x_final_grid + h_final_grid; t++) {

                        for (var s = y_final_grid; s < y_final_grid + w_final_grid; s++) {
                            if (tab_grid[t][s] != 0 && tab_grid[t][s] != $this.attr("data-new")) {
                                collision = true
                                break collision;
                            }
                        }
                    }

                if (collision) {
                    $this.animate({
                        width: w_init_px,
                        height: h_init_px
                    }, 200);
                } else {
                    for (var t = x_final_grid; t < x_final_grid + h_init_grid; t++) {
                        for (var s = y_final_grid; s < y_final_grid + w_init_grid; s++) {
                            tab_grid[t][s] = 0;
                        }
                    }

                    for (var t = x_final_grid; t < x_final_grid + h_final_grid; t++) {
                        for (var s = y_final_grid; s < y_final_grid + w_final_grid; s++) {
                            tab_grid[t][s] = $this.attr("data-new");
                        }
                    }
                }
            });

            // Add an element
            $block_grid.on("click", "#btn_ajout", function (e) {

                buckle:
                    for (var i = 0; i < int_nb_lines; i++) {
                        for (var j = 0; j < int_nb_rows; j++) {
                            if (tab_grid[i][j] == 0) {
                                tab_grid[i][j] = "" + int_id_new_cell;
                                x_init_px = (4 + (i) * 48);
                                y_init_px = (4 + (j) * 48);
                                $(".selected").removeClass("selected");
                                $div_grid.append('<div class="cell_new selected" data-new ="' + int_id_new_cell + '" style="top :' + x_init_px + 'px ;left :' + y_init_px + 'px"></div>');
                                int_id_new_cell++;
                                break buckle;
                            }
                        }
                    }
                e.stopPropagation();
                activeNewCell();
            });

            $block_grid.on('dragstop resizestop click', '.cell_new', function (e, ui) {
                display_tab();
            });

            $block_grid.on('click', '#btn_ajout , #btn_suppr , #btn_vider', function () {
                display_tab();
            });

            function rgb2hex(rgb) {
                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                return "#" +
                    ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
                    ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
                    ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2);
            }

            function load_grid(chaine_tab) {
                var temp_tab;
                $(".cell_new").remove();

                if (chaine_tab == "") {
                    temp_tab = new Array(int_nb_lines);

                    for (var i = 0; i < int_nb_lines; i++) {
                        temp_tab[i] = new Array(int_nb_rows);
                    }

                    for (var i = 0; i < int_nb_lines; i++) {
                        for (var j = 0; j < int_nb_rows; j++) {
                            temp_tab [i][j] = 0;
                        }
                    }
                }
                else {
                    temp_tab = chaine_tab.split("|");

                    for (var i = 0; i < temp_tab.length; i++) {
                        temp_tab[i] = temp_tab[i].split(" ");
                    }
                }

                tab_grid = temp_tab;
                var tab_done = new Array();

                for (var i = 0; i < 12; i++) {
                    for (var j = 0; j < 12; j++) {
                        if (tab_grid[i][j] != 0 && $.inArray(tab_grid[i][j], tab_done) == -1) {
                            var x = i;
                            var y = j;
                            var h = 0;
                            var w = 0;
                            var val = tab_grid[i][j];
                            tab_done.push(val);

                            while (x + h < 12 && tab_grid[x + h][y] == val) {
                                h++;
                            }

                            while (y + w < 12 && tab_grid[x][y + w] == val) {
                                w++;
                            }

                            $div_grid.append('<div class="cell_new " data-new ="' + val + '" ' +
                                'style="top :' + (4 + x * 48) + 'px ;left :' + (4 + y * 48) + 'px ; width :' + (40 + ((w - 1) * 48)) + 'px ; height :' + (40 + ((h - 1) * 48)) + 'px"></div>');
                            int_id_new_cell = parseInt(val) + 1;
                        }
                    }
                }
                activeNewCell();
                $(".cell_new:first").trigger("resizestop");
            }

            function activeNewCell() {
                $(".template-e-block-grid").on("click", ".cell_new", function (e) {
                    $(".selected").removeClass("selected");
                    $(this).addClass("selected");
                    $("#btn_suppr").prop("disabled", false);
                    e.stopPropagation();
                });

                $(document).click(function (e) {
                    $(".selected").removeClass("selected");
                    $("#btn_suppr").prop("disabled", true);
                });

                $(".cell_new").draggable({
                    containment: "#div_grid",
                    grid: [48, 48]
                });

                $(".cell_new").resizable({
                    containment: "#div_grid",
                    grid: [48, 48]
                });
            }
        }

    });