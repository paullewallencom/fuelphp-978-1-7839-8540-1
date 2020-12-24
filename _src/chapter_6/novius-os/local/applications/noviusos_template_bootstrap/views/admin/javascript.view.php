<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Nos\I18n::current_dictionary('noviusos_template_bootstrap::common', 'nos::common');

$data = array(
    'form_id' => $fieldset->form()->get_attribute('id'),
    'tpvar_id' => $item->tpvar_id,
    'texts' => array(
        'deletePanel' => __('Delete'),
        'managePanel' => __('Manage'),
        'editPanelName' => __('Edit name'),
    ),
);
$js = 'static/apps/noviusos_template_bootstrap/js/admin/layout';
if (\Config::get('novius-os.assets_minified', true)) {
    $js = 'static/apps/noviusos_template_bootstrap/js/admin/layout.min';
}
?>
<script type="text/javascript">
    require(['jquery-nos', <?= \Format::forge($js)->to_json() ?>], function ($, callback_fn) {
        $(function () {
            callback_fn(<?= \Format::forge($data)->to_json() ?>);
        });
    });
</script>
<link rel="stylesheet" href="static/apps/noviusos_template_bootstrap/css/admin/layout.css">
