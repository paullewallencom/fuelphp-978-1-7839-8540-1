<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// $depth and $idParent set in template.config
// $depth: depth of the menu (1 = one level deep only, no sublevels)
// $idParent: start level, null for root (default)

if ($depth > 0) {
    $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
    $menu = $tpvar->menus->principal;
    if (empty($menu)) {
        $menu = \Nos\Menu\Model_Menu::buildFromPages(\Nos\Nos::main_controller()->getContext(), $idParent, $depth);
    }
    echo $menu->html(array('view' => 'noviusos_templates_basic::subviews/menu_driver'));
}
