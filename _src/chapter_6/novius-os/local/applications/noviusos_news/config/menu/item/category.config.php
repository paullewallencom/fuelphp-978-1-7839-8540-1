<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

return array(
    'name' => 'News story category',
    'texts' => array(
        'add' => __('Add a news story category link'),
        'new' => __('New news story category link'),
    ),
    'icon' => 'static/apps/noviusos_news/img/category-16.png',

    // Allowed EAV attributes
    'attributes' => array(
        'cat_id',
    ),

    'view' => 'noviusos_news::driver/category',

    'admin' => array(
        'layout' => array(
            'standard' => array(
                'view'   => 'nos::form/accordion',
                'params' => array(
                    'accordions' => array(
                        'main' => array(
                            'fields' => array(
                                'mitem_cat_id',
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'view'   => 'noviusos_news::admin/driver/category',
            ),
        ),
        'fields' => array(
            'mitem_cat_id' => array(
                'label' => __('News story category:'),
                'form' => array(
                    'type' => 'hidden',
                    'class' => 'menu_item_cat_id',
                ),
                'renderer' => 'Nos\Renderer_Item_Picker',
                'renderer_options' => array(
                    'model' => 'Nos\BlogNews\News\Model_Category',
                    'appdesk' => 'admin/noviusos_news/appdesk/category',
                    'defaultThumbnail' => 'static/apps/noviusos_news/img/category-64.png',
                    'texts' => array(
                        'empty' => __('No news story category selected'),
                        'add' => __('Pick a news story category'),
                        'edit' => __('Pick another news story category'),
                        'delete' => __('Un-select this news story category'),
                    ),
                ),
            ),
        ),
    ),
);
