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
'medias-><?= $field['column_name'] ?>->medil_media_id' => array(
    'label' => '',
    'renderer' => 'Nos\Media\Renderer_Media',
    'form' => array(
        'title' => __(<?= var_export($field['label']) ?>),
    ),
),