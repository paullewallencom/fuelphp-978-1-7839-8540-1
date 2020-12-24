<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

return array(
    'name'    => 'Novius OS default templates',
    'version' => '5.0.1 (Elche)',
    'provider' => array(
        'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\Templates\Basic',
    'i18n_file' => 'noviusos_templates_basic::metadata',
    'launchers' => array(
    ),
    'enhancers' => array(
    ),
    'templates' => array(
        'noviusos_top_menu' => array(
            'file' => 'noviusos_templates_basic::top_menu',
            'title' => 'Default template (top menu)',
            'cols' => 1,
            'rows' => 1,
            'layout' => array(
                'content' => '0,0,1,1',
            ),
            'module' => '',
        ),
        'noviusos_left_menu' => array(
            'file' => 'noviusos_templates_basic::left_menu',
            'title' => 'Default template (left menu)',
            'cols' => 1,
            'rows' => 1,
            'layout' => array(
                'content' => '0,0,1,1',
            ),
            'module' => '',
        )
    ),
);
