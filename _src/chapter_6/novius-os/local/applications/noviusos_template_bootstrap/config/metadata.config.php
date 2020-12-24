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
    'name'    => 'Novius OS Bootstrap customisable template',
    'version' => '5.0.1 (Elche)',
    'provider' => array(
        'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\Templates\Bootstrap',

    'i18n_file' => 'noviusos_template_bootstrap::metadata',
    'launchers' => array(
    ),
    'enhancers' => array(
    ),
    'templates' => array(
        'noviusos_bootstrap_customisable' => array(
            'file' => 'noviusos_template_bootstrap::common',
            'title' => 'Bootstrap customisable template',
            'cols' => 12,
            'rows' => 12,
            'layout' => array(
                'content1' => '0,0,12,12',
            ),
            'module' => '',
        ),
    ),
);
