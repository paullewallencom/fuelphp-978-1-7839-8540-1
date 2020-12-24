<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

if ($item_driver->item->mitem_cat_id) {
    $category = \Nos\BlogNews\Blog\Model_Category::find($item_driver->item->mitem_cat_id);
    if (!empty($category)) {
        $params['text'] = e($item_driver->title());
        if (method_exists(\Nos\Nos::main_controller(), 'getUrl') &&
            \Nos\Nos::main_controller()->getUrl() === $category->url()) {
            !isset($params['class']) && $params['class'] = '';
            $params['class'] .= ' '.\Arr::get($params, 'active_class', 'active');
        }
        echo $category->htmlAnchor($params);
        return;
    }
}
echo html_tag('div', $params, e($item_driver->title()));
