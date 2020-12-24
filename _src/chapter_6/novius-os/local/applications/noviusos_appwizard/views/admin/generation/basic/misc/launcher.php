<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

?>
'<?= $data['application_settings']['namespace'].'::'.$model['name'] ?>' => array(
    'name'    => '<?= \Inflector::humanize($model['name']) ?>', // displayed name of the launcher
    'action' => array(
        'action' => 'nosTabs',
        'tab' => array(
            'url' => 'admin/<?= $data['application_settings']['folder'].'/'.strtolower($model['name']).'/appdesk' ?>', // url to load
        ),
    ),
),