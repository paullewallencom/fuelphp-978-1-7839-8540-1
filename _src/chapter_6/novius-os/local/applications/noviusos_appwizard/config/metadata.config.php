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
    'name'    => '‘Build your app’ wizard',
    'version' => '5.0.1 (Elche)',
    'provider' => array(
        'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\AppWizard',
    'permission' => array(
    ),
    'i18n_file' => 'noviusos_appwizard::metadata',
    'launchers' => array(
        'noviusos_appwizard' => array(
            'name'    => '‘Build your app’ wizard',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/noviusos_appwizard/application',
                ),
            ),
        ),
    ),
    'icons' => array(
        16 => 'static/apps/noviusos_appwizard/img/icons/appwizard-16.png',
        32 => 'static/apps/noviusos_appwizard/img/icons/appwizard-32.png',
        64 => 'static/apps/noviusos_appwizard/img/icons/appwizard-64.png',
    ),
);
