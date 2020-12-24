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
    'admin' => array(
        'layout' => array(
            'content' => array(
                'expander' => array(
                    'view' => 'nos::form/expander',
                    'params' => array(
                        'title'   => __('Configuration'),
                        'options' => array(
                            'allowExpand' => false,
                        ),
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'menus->principal->menu_id',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'fields' => array(
            'menus->principal->menu_id' => array(
                'label' => __('Menu'),
                'renderer' => 'Nos\Renderer_Item_Picker',
                'renderer_options' => array(
                    'model' => 'Nos\Menu\Model_Menu',
                    'appdesk' => 'admin/noviusos_menu/menu/appdesk',
                    'defaultThumbnail' => 'static/apps/noviusos_menu/img/64/menu.png',
                    'texts' => array(
                        'empty' => __('No menu selected'),
                        'add' => __('Pick a menu'),
                        'edit' => __('Pick another menu'),
                        'delete' => __('Un-select this menu'),
                    ),
                ),
            ),
        ),
    ),
);
