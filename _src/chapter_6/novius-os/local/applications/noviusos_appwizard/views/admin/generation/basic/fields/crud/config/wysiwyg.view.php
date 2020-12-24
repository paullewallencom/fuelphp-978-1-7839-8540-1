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
'wysiwygs-><?= $field['column_name'] ?>->wysiwyg_text' => array(
    'label' => __(<?= var_export($field['label']) ?>),
    'renderer' => 'Nos\Renderer_Wysiwyg',
    'template' => '{field}',
    'form' => array(
        'style' => 'width: 100%; height: 500px;',
    ),
),