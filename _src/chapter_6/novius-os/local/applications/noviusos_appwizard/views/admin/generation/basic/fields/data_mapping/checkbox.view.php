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
'<?= $model['column_prefix'].$field['column_name'] ?>' => array(
    'title' => __(<?= var_export($field['label']) ?>),
    'value' => function($item) {
        return $item-><?= $model['column_prefix'].$field['column_name'] ?> ? __('Yes') : __('No');
    },
),