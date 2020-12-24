<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$style_fixed  = '';

if ($config['header']['fixed']) {
    $style_fixed = "middle-header-fixed";
}
?>
<div id="footer" class="row footer customisable <?= $style_fixed ?>">
    <div class="footer_menu">
<?php
$result="";
if ($config['footer']['menu']['display']== true || $dom_id) {
    $result .= '<ul class="nav nav-pills nav-justified" style="text-align: left">';
    $depth = 3;
    if ($depth > 0) {
        $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
        $menu = $tpvar->menus->footer;
        if (!empty($menu)) {
            echo $menu->html(array(
                'view' => 'noviusos_template_bootstrap::'.$template.'/menu_footer_driver',
                'id' =>'list-footer-menu',
                'class' => 'nav nav-pills'
            ));
        } elseif ($dom_id) {
            echo '<ul id="list-footer-menu"></ul>';
        }
    }
}
echo $result;
?>
    </div>

    <div class="footer_text"><?=\Nos\Tools_Wysiwyg::parse($config['footer']['content'])?>
    </div>
</div>
