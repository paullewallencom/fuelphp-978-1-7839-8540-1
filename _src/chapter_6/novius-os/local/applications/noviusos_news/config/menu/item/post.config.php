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
    'name' => 'News story post',
    'texts' => array(
        'add' => __('Add a news story link'),
        'new' => __('New news story link'),
    ),
    'icon' => 'static/apps/noviusos_news/img/news-16.png',

    // Allowed EAV attributes
    'attributes' => array(
        'post_id',
    ),

    'view' => 'noviusos_news::driver/post',

    'admin' => array(
        'layout' => array(
            'standard' => array(
                'view'   => 'nos::form/accordion',
                'params' => array(
                    'accordions' => array(
                        'main' => array(
                            'fields' => array(
                                'mitem_post_id',
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'view'   => 'noviusos_news::admin/driver/post',
            ),
        ),
        'fields' => array(
            'mitem_post_id' => array(
                'label' => __('News story post:'),
                'form' => array(
                    'type' => 'hidden',
                    'class' => 'menu_item_post_id',
                ),
                'renderer' => 'Nos\Renderer_Item_Picker',
                'renderer_options' => array(
                    'model' => 'Nos\BlogNews\News\Model_Post',
                    'appdesk' => 'admin/noviusos_news/appdesk',
                    'defaultThumbnail' => 'static/apps/noviusos_news/img/news-64.png',
                    'texts' => array(
                        'empty' => __('No news story selected'),
                        'add' => __('Pick a news story'),
                        'edit' => __('Pick another news story'),
                        'delete' => __('Un-select this news story'),
                    ),
                ),
            ),
        ),
    ),
);
