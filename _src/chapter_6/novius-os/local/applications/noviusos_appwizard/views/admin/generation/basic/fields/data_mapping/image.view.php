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
'thumbnail' => array(
    'value' => function ($item) {
        foreach ($item->medias as $media) {
            return $media->urlResized(64, 64);
        }
        return false;
    },
),
'thumbnailAlternate' => array(
    'value' => function ($item) {
        return 'static/apps/<?= $data['application_settings']['folder'] ?>/img/64/icon.png';
    }
),