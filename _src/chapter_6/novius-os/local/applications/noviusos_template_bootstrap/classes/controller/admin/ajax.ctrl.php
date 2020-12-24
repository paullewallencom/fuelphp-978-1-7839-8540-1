<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Nos\Templates\Bootstrap;

use Nos\Config_Data;
use Nos\Media\Model_Media;
use Nos\Menu\Model_Menu;
use Nos\Tools_Context;

class Controller_Admin_Ajax extends \Controller
{
    public function action_menu()
    {
        $menu_id = \Input::get('menu_id', 0);
        $framework = \Input::get('framework', 'bootstrap');
        $menu_type = \Input::get('menu_type', 'principal');
        switch ($menu_type) {
            case 'principal':
                if (empty($menu_id)) {
                    $menu = Model_Menu::buildFromPages(\Input::get('context', Tools_Context::defaultContext()));
                } else {
                    $menu = Model_Menu::find($menu_id);
                }
                return $menu->html(array(
                    'view' => 'noviusos_template_bootstrap::'.$framework.'/menu_header_driver',
                    'id' => 'list-menu',
                    'class' => 'nav navbar-nav navbar-right'
                ));
                break;

            case 'left':
            case 'right':
                $menu = Model_Menu::find($menu_id);
                return $menu->html(array(
                    'view' => 'noviusos_template_bootstrap::'.$framework.'/menu_side_driver',
                    'id' => 'list-'.$menu_type.'-menu',
                    'class' => ' nav nav-pills nav-stacked  sidebar-nav-2 sidebar-menu ',
                ));
                break;

            case 'footer':
                $menu = Model_Menu::find($menu_id);
                return $menu->html(array(
                    'view' => 'noviusos_template_bootstrap::'.$framework.'/menu_footer_driver',
                    'id' => 'list-footer-menu',
                    'class' => 'nav nav-pills',
                ));
                break;
        }
    }

    public function action_media($id)
    {
        $media = Model_Media::find($id);

        if (!empty($media)) {
            $item = array(
                'width' => \Input::get('width', $media->media_width),
                'height' => \Input::get('height', $media->media_height),
                'url' => $media->url(),
            );
        } else {
            $item = null;
        }

        \Response::json($item);
    }

    public function action_enhancer()
    {
        $enhancers = Config_Data::get('enhancers', array());
        $enhancer = \Arr::get($enhancers, \Input::post('enhancer'));

        return \Request::forge($enhancer['previewUrl'])->execute();
    }

    public function action_grid()
    {
        $layout = \Input::post('grid');
        $grid = preg_split('`[| ]`', $layout);
        $grid = array_unique($grid);

        $wysiwyg = array();
        $i = 0;
        foreach ($grid as $i) {
            $wysiwyg['content'.$i] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        }

        return \View::forge('noviusos_template_bootstrap::bootstrap/wysiwyg', array(
            'config' => array(
                'wysiwyg_layout' => $layout,
            ),
            'wysiwyg' => $wysiwyg,
        ), false);
    }
}
