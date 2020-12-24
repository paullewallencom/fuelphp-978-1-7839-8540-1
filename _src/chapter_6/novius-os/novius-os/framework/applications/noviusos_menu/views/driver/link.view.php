<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

if ($item_driver->item->mitem_url_blank) {
    $params['target'] = '_blank';
}
echo \Html::anchor($item_driver->item->mitem_url, e($item_driver->title()), $params);
