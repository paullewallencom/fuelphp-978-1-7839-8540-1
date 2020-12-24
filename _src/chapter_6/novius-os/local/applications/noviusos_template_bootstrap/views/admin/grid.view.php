<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$data = array(
    'form_id' => $fieldset->form()->get_attribute('id'),
    'tpvar_id' => $item->tpvar_id,
);
$content = (string) View::forge($content['view'], $view_params + $content['params'], false);

\Nos\I18n::current_dictionary('noviusos_template_bootstrap::common', 'nos::common');

$js = 'static/apps/noviusos_template_bootstrap/js/admin/grid';
if (\Config::get('novius-os.assets_minified', true)) {
    $js = 'static/apps/noviusos_template_bootstrap/js/admin/grid.min';
}
?>

<script type="text/javascript">
    require(['jquery-nos', <?= \Format::forge($js)->to_json() ?>], function ($, callback_fn) {
        $(function () {
            callback_fn(<?= \Format::forge($data)->to_json() ?>);
        });
    });
</script>

<link rel="stylesheet" href="static/apps/noviusos_template_bootstrap/css/admin/grid.css">

<div class="template-e-block template-e-<?= $id ?>"
     data-title-popup="<?= htmlspecialchars($popup_title) ?>"
     data-width="<?= $width ?>"
     data-height="<?= isset($height) ? $height : "auto" ?>">
    <div class="fieldset">
        <?= $content; ?>
    </div>
    <div class="template-e-grid" style="margin-top: 20px ;display: inline-block; vertical-align: top; ">
        <div id="div_option" style="position : relative ;display: inline-block;">
            <button type="button" id="btn_ajout"><?= __('Add an area') ?></button>
            <button type="button" id="btn_suppr"><?= __('Remove') ?></button>
            <button type="button" id="btn_vider"><?= __('Empty') ?></button>
            <br><br>
        </div>
        <div id="div_grid" class="table" style ="">
        </div>

    </div>
    <div style="display: inline-block ; margin-left: 10px; padding-top: 60px;">
        <h3>Modèles :</h3><br>

        <div id="grid_pattern_1" class="grid_pattern">
            <div class="cell_new_demo" style=" width :64px ; height :88px ; " data-new="1"></div>
            <div class="cell_new_demo" style=" ; width :64px ; height :88px ;"  data-new="2"></div>
            <input type="hidden" name="tab_grid_pattern_1" value="1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2|1 1 1 1 1 1 2 2 2 2 2 2">

        </div><br><br>

        <div id="grid_pattern_2" class="grid_pattern">
            <div class="cell_new_demo" style=" width :40px ; height :88px ; " data-new="1"></div>
            <div class="cell_new_demo" style=" width :40px ; height :88px ;"  data-new="2"></div>
            <div class="cell_new_demo" style=" width :40px ; height :88px ;"  data-new="3"></div>
            <input type="hidden" name="tab_grid_pattern_2" value="1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3|1 1 1 1 2 2 2 2 3 3 3 3">
        </div><br><br>

        <div id="grid_pattern_3" class="grid_pattern">
            <div class="cell_new_demo" style=" width :128px ; height :44px ;" data-new="1"></div><br>
            <div class="cell_new_demo" style=" width :128px ; height :44px ;"  data-new="2"></div>
            <input type="hidden" name="tab_grid_pattern_3" value="1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2">
        </div><br><br>

        <div id="grid_pattern_4" class="grid_pattern">
            <div class="cell_new_demo" style="width :128px ; height :29px ; " data-new="1"></div><br>
            <div class="cell_new_demo" style="width :128px ; height :29px ;"  data-new="2"></div><br>
            <div class="cell_new_demo" style="width :128px ; height :29px ;"  data-new="3"></div>
            <input type="hidden" name="tab_grid_pattern_4" value="1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|1 1 1 1 1 1 1 1 1 1 1 1|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|2 2 2 2 2 2 2 2 2 2 2 2|3 3 3 3 3 3 3 3 3 3 3 3|3 3 3 3 3 3 3 3 3 3 3 3|3 3 3 3 3 3 3 3 3 3 3 3|3 3 3 3 3 3 3 3 3 3 3 3">
        </div>

    </div>
</div>