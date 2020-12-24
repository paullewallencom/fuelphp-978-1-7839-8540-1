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

$params = array(
    'dom_id' => '#'.$dom_id,
    'texts' => array(
        'newPanel' => __('New Panel'),
        'ok' => __('OK'),
    ),
);
$js = 'static/apps/noviusos_template_bootstrap/js/admin/iframe.js';
if (\Config::get('novius-os.assets_minified', true)) {
    $js = 'static/apps/noviusos_template_bootstrap/js/admin/iframe.min.js';
}
?>
<script type="text/javascript" src="<?= $js ?>"></script>
<script type="text/javascript">
    $.templateBootstrap(<?= \Format::forge($params)->to_json() ?>);
</script>
