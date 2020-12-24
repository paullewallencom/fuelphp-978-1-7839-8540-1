<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

Nos\I18n::current_dictionary('noviusos_templates_basic::common');

return array(
    'global' => array(
        'sitename' => __('My super website'),
    ),
    'menu' => array(
        'depth' => 2,        // depth of the menu (1 = one level deep only, no sublevels)
        'idParent' => null   // start level, null for root (default)
    ),
);
