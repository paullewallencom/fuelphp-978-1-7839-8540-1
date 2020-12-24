<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$uniqid = uniqid('template_bootstrap');

$width_wysiwyg = '850px';
$width_grid = '780px';
$height_panel = '550';
$width_image = '650px';
$width_standard = '500px';
$height_wysiwyg = 350;

\Config::load('noviusos_template_bootstrap::skins', true);
$temp_skin = \Config::get('noviusos_template_bootstrap::skins');


foreach ($temp_skin as $key => $value) {
    $skin[$key] = $key;
}

\Config::load('noviusos_template_bootstrap::template', true);

\Nos\I18n::current_dictionary('noviusos_template_bootstrap::common', 'nos::common');


return array(
    'init' => function () {

        $config =  \Config::get('noviusos_template_bootstrap::template');
        $array = Arr::flatten($config, '-');
        $_input_hidden_left = '';
        $_input_hidden_right= '';
        $tab_left = \Config::get('noviusos_template_bootstrap::template.left.blocks');
        $tab_right = \Config::get('noviusos_template_bootstrap::template.right.blocks');

        foreach ($tab_left as $key => $value) {
            if ($value['display'] == true) {
                $_input_hidden_left .= 'left-blocks-'.$key.'-display||';
            }
        }

        foreach ($tab_right as $key => $value) {
            if ($value['display'] == true) {
                $_input_hidden_right .= 'right-blocks-'.$key."-display||";
            }
        }

        $sidebar_display = ($config['left']['display'] ?
            ($config['right']['display'] ? "both" : "left") :
            ($config['right']['display'] ? 'right' : "none"));

        $array['_sidebar-display'] = $sidebar_display;
        $array['_input_hidden_right'] = $_input_hidden_right;
        $array['_input_hidden_left'] = $_input_hidden_left;
        $temp = "";

        for ($i=0; $i<12; $i++) {
            for ($j = 0; $j < 12; $j++) {
                $temp .= "1 ";
            }
            $temp = substr($temp, 0, strlen($temp)-1);
            $temp .= "|";
        }
        $temp = substr($temp, 0, strlen($temp)-1);


        return $array;

    },
    'layout' => function ($tpvar) {
        if (isset($tpvar->tpvar_data['wysiwyg_layout']) && $tpvar->tpvar_data['wysiwyg_layout'] != '') {
            $layout = $tpvar->tpvar_data['wysiwyg_layout'];
            $tab = explode("|", $layout);
            $tab_layout = array();
            $tab_done = array();

            foreach ($tab as $key => $value) {
                $tab[$key] = explode(" ", $value);
            }

            for ($i = 0; $i < 12; $i++) {
                for ($j = 0; $j < 12; $j++) {
                    if ($tab[$i][$j] != 0 && !in_array($tab[$i][$j], $tab_done)) {
                        $x = $i;
                        $y = $j;
                        $h = 0;
                        $w = 0;
                        $val = $tab[$i][$j];
                        $tab_done []  = $val;

                        while ($x+$h < 12 && $tab[$x+$h][$y] == $val) {
                            $h++;
                        }

                        while ($y+$w < 12 &&  $tab[$x][$y+$w] == $val) {
                            $w++;
                        }
                        $tab_layout["content".$val] = $y.",".$x.",".$w.",".$h;
                    }
                }
            }
            return $tab_layout;
        }
        return array(
            'content1' => '0,0,12,12',
        );
    },
    'admin' => array(
        'layout' => array(
            'content' => array(
                "javascript"=> array(
                    'view' => 'noviusos_template_bootstrap::admin/javascript',
                    'params' => array(
                        'uniqid' => $uniqid,
                    ),
                ),


                'grid' => array(
                    'view' => 'noviusos_template_bootstrap::admin/grid',
                    'params' => array(
                        'id' => 'block-grid',
                        'popup_title' => __('WYSIWYG areas'),
                        'width' => $width_grid,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'wysiwyg_layout',

                                )
                            )
                        )
                    )
                ),

                //-------------------------------------------
                // Configuration
                //-------------------------------------------
                'principal' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'principal',
                        'popup_title' => __('Main settings'),
                        'width' => $width_image,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'menus->principal->menu_id',
                                    'principal-skin',
                                    '_sidebar-display',
                                    'medias->background->medil_media_id',
                                    'principal-background_fixed_display',
                                    'principal-background_style',
                                    'jumbotron-display',
                                    'css_style'
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Header
                //-------------------------------------------
                'header' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'header',
                        'popup_title' => __('Top bar settings'),
                        'width' => $width_image,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'header-type',
                                    'header-title',
                                    'header-baseline',
                                    'medias->logo->medil_media_id',
                                    'header-fixed'
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Jumbotron
                //-------------------------------------------
                'jumbotron' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'jumbotron',
                        'popup_title' => __('Jumbotron settings'),
                        'width' => $width_wysiwyg,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'jumbotron-title',
                                    'jumbotron-content',
                                    'jumbotron-button-title',
                                    'jumbotron-button-link',
                                ),

                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Left Side bar
                //-------------------------------------------
                'side-left' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'side-left',
                        'popup_title' => __('Left column settings'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(

                                    'left-blocks-panel_1-display',
                                    'left-blocks-panel_2-display',
                                    'left-blocks-panel_3-display',
                                    'left-blocks-panel_4-display',
                                    'left-blocks-panel_5-display',
                                    'left-blocks-menu-display',
                                    'left-blocks-twitter-display',
                                    'left-blocks-social-display',
                                    '_select_left',
                                    '_input_hidden_left'
                                ),
                            ),
                        ),
                    ),
                ),

                'left-blocks-panel_1' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-panel_1',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-panel_1-title',
                                    'left-blocks-panel_1-content',

                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-panel_2' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-panel_2',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-panel_2-title',
                                    'left-blocks-panel_2-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-panel_3' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-panel_3',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-panel_3-title',
                                    'left-blocks-panel_3-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-panel_4' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-panel_4',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-panel_4-title',
                                    'left-blocks-panel_4-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-panel_5' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-panel_5',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-panel_5-title',
                                    'left-blocks-panel_5-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-twitter' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-twitter',
                        'popup_title' => __('Twitter'),
                        'width' => $width_standard,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-twitter-account_name',
                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-menu' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-menu',
                        'popup_title' => __('Menu'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'menus->left->menu_id'
                                ),
                            ),
                        ),
                    ),
                ),
                'left-blocks-social' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'left-blocks-social',
                        'popup_title' => __('Social'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'left-blocks-social-list-facebook-link',
                                    'left-blocks-social-list-twitter-link',
                                    'left-blocks-social-list-google_plus-link',
                                    'left-blocks-social-list-github-link',
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Right Side bar
                //-------------------------------------------
                'side-right' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'side-right',
                        'popup_title' => __('Right column settings'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(

                                    'right-blocks-panel_1-display',
                                    'right-blocks-panel_2-display',
                                    'right-blocks-panel_3-display',
                                    'right-blocks-panel_4-display',
                                    'right-blocks-panel_5-display',
                                    'right-blocks-menu-display',
                                    'right-blocks-twitter-display',
                                    'right-blocks-social-display',
                                    '_select_right',
                                    '_input_hidden_right'
                                ),
                            ),
                        ),
                    ),
                ),

                'right-blocks-panel_1' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-panel_1',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-panel_1-title',
                                    'right-blocks-panel_1-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-panel_2' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-panel_2',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-panel_2-title',
                                    'right-blocks-panel_2-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-panel_3' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-panel_3',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-panel_3-title',
                                    'right-blocks-panel_3-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-panel_4' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-panel_4',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-panel_4-title',
                                    'right-blocks-panel_4-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-panel_5' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-panel_5',
                        'popup_title' => __('Panel'),
                        'width' => $width_wysiwyg,
                        'height' => $height_panel,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-panel_5-title',
                                    'right-blocks-panel_5-content',
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-twitter' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-twitter',
                        'popup_title' => __('Twitter'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-twitter-account_name'
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-menu' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-menu',
                        'popup_title' => __('Menu'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'menus->right->menu_id'
                                ),
                            ),
                        ),
                    ),
                ),
                'right-blocks-social' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'right-blocks-social',
                        'popup_title' => __('Social'),
                        'width' => $width_standard,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'right-blocks-social-list-facebook-link',
                                    'right-blocks-social-list-twitter-link',
                                    'right-blocks-social-list-google_plus-link',
                                    'right-blocks-social-list-github-link',
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Footer
                //-------------------------------------------
                'footer' => array(
                    'view' => 'noviusos_template_bootstrap::admin/block',
                    'params' => array(
                        'id' => 'footer',
                        'popup_title' => __('Footer settings'),
                        'width' => $width_wysiwyg,
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'menus->footer->menu_id',
                                    'footer-content'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),


        //-------------------------------------------
        // Fields configuration
        //-------------------------------------------
        'fields' => array(

            //-------------------------------------------
            // Grid
            //-------------------------------------------

             'wysiwyg_layout' => array(
                'form' => array(
                    'type' => 'hidden',
                ),
            ),

            //-------------------------------------------
            // Principal
            //-------------------------------------------
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
                'form' => array(
                    'class' => 'template-e-select-menu'
                ),
            ),
            'principal-skin' => array(
                'label' => __('Skin'),
                'form' => array(
                    'type' => 'select',
                    'options' => $skin
                ),
            ),
            '_sidebar-display' => array(
                'label' => __('Side column(s)'),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        'both' => __('Both sides'),
                        'right' => __('Right-hand side'),
                        'left' => __('Left-hand side'),
                        'none' => __('None')
                    ),
                ),
            ),
            'medias->background->medil_media_id' => array(
                'label' => __('Background image'),
                'renderer' => 'Nos\Media\Renderer_Media',
                'renderer_options' => array(
                    'inputFileThumb' => array(
                        'title' => __('Background image'),
                    ),
                ),
                'form' => array(
                    'class' => 'template-e-select-media',
                    'data-target' => '#principal'
                ),
            ),
            'principal-background_fixed_display' => array(
                'label' => __('Fixed background image'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '',
                ),
            ),
            'principal-background_style' => array(
                'label' => __('Background style'),
                'form' => array(
                    'type' => 'text',
                    'value' => "",
                    'data-target' => 'body',
                ),
            ),
            'jumbotron-display' => array(
                'label' => __('Jumbotron (large call-out)'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#jumbotron',
                ),
            ),
            'css_style' => array(
                'label' => __('Additional CSS (Global)'),
                'form' => array(
                    'type' => 'textarea',
                ),
            ),


            //-------------------------------------------
            // Bloc Header
            //-------------------------------------------
            'header-type' => array(
                'label' => __('Type'),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        'title' => __('Title only'),
                        'image' => __('Image (logo) only'),
                        'both' => __('Both'),
                    ),
                ),
            ),
            'header-title' => array(
                'label' => __('Website title'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#header-title'

                ),
            ),
            'header-baseline' => array(
                'label' => __('Baseline'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#header-baseline'

                ),
            ),
            'medias->logo->medil_media_id' => array(
                'label' => __('Logo'),
                'renderer' => 'Nos\Media\Renderer_Media',
                'renderer_options' => array(
                    'inputFileThumb' => array(
                        'title' => __('Logo'),
                    ),
                ),
                'form' => array(
                    'class' => 'template-e-select-media',
                    'data-target' => '#header-logo , #header-logo-small'
                ),
            ),

            'header-fixed' => array(
                'label' => __('Fixed bar'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                ),
            ),

            //-------------------------------------------
            // Jumbotron
            //-------------------------------------------
            'jumbotron-title' => array(
                'label' => __('Title'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#jumbotron h1'
                ),
            ),
            'jumbotron-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#jumbotron span'
                ),
            ),
            'jumbotron-button-title' => array(
                'label' => __('Button label'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#jumbotron a'
                ),
            ),
            'jumbotron-button-link' => array(
                'label' => __('Button link'),
                'form' => array(
                    'type' => 'text',
                    'placeholder' => 'http://',
                    'data-target' => '#jumbotron a link'
                ),
            ),

            //-------------------------------------------
            // Left bar
            //-------------------------------------------
            'left-blocks-panel_1-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-panel_1',
                    'data-admin-target' => '[name="left-blocks-panel_1-title"]'
,                ),
            ),
            'left-blocks-panel_2-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-panel_2',
                    'data-admin-target' => '[name="left-blocks-panel_2-title"]'
                ),
            ),
            'left-blocks-panel_3-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-panel_3',
                    'data-admin-target' => '[name="left-blocks-panel_3-title"]'
                ),
            ),
            'left-blocks-panel_4-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-panel_4',
                    'data-admin-target' => '[name="left-blocks-panel_4-title"]'
                ),
            ),
            'left-blocks-panel_5-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-panel_5',
                    'data-admin-target' => '[name="left-blocks-panel_5-title"]'
                ),
            ),
            'left-blocks-twitter-display' => array(
                'label' => __('Twitter'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-twitter',
                ),
            ),
            'left-blocks-menu-display' => array(
                'label' => __('Menu'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-menu',
                ),
            ),
            'left-blocks-social-display' => array(
                'label' => __('Social'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#left-blocks-social',
                ),
            ),
            '_select_left' => array(
                'label' => __(''),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        '' => __('Add a component'),
                        'panel' => __('Panel'),
                        'left-blocks-social-display' => __('Social'),
                        'left-blocks-twitter-display' => __('Twitter'),
                        'left-blocks-menu-display' => __('Menu'),

                    ),
                ),
            ),
            '_input_hidden_left'=> array(
                'label' => __(''),
                'form' => array(
                    'type' => 'hidden'
                )
            ),

            //-------------------------------------------
            // Modules Panel 1 Left
            //-------------------------------------------
            'left-blocks-panel_1-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text' ,
                    'data-target' => '#left-blocks-panel_1 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_left-blocks-panel_1-display'
                ),
            ),
            'left-blocks-panel_1-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#left-blocks-panel_1 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 2 Left
            //-------------------------------------------
            'left-blocks-panel_2-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-blocks-panel_2 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_left-blocks-panel_2-display'
                ),
            ),
            'left-blocks-panel_2-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                   'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#left-blocks-panel_2 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 3 Left
            //-------------------------------------------
            'left-blocks-panel_3-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-blocks-panel_3 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_left-blocks-panel_3-display'
                ),
            ),
            'left-blocks-panel_3-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#left-blocks-panel_3 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 4 Left
            //-------------------------------------------
            'left-blocks-panel_4-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-blocks-panel_4 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_left-blocks-panel_4-display'
                ),
            ),
            'left-blocks-panel_4-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#left-blocks-panel_4 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 5 Left
            //-------------------------------------------
            'left-blocks-panel_5-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-blocks-panel_5 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_left-blocks-panel_5-display'
                ),
            ),
            'left-blocks-panel_5-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#left-blocks-panel_5 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Twitter time line Left
            //-------------------------------------------
            'left-blocks-twitter-account_name' => array(
                'label' => __('Account name'),
                'form' => array(
                    'type' => 'text',
                    'value' => 'NoviusOS'
                ),
            ),


            //-------------------------------------------
            // Menu Left
            //-------------------------------------------
            'menus->left->menu_id' => array(
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
                'form' => array(
                    'class' => 'template-e-select-menu'
                ),
            ),

            //-------------------------------------------
            //  Social Left
            //-------------------------------------------
            'left-blocks-social-list-facebook-link' => array(
                'label' => __('Facebook link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-facebook a link',
                    'placeholder' => "https://www.facebook.com/".__("UserName")
                ),
            ),
            'left-blocks-social-list-twitter-link' => array(
                'label' => __('Twitter link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-twitter a link',
                    'placeholder' => "https://twitter.com/".__("UserName")
                ),
            ),
            'left-blocks-social-list-google_plus-link' => array(
                'label' => __('Google+ link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-google_plus a link',
                    'placeholder' => "https://plus.google.com/".__("UserName")
                ),
            ),
            'left-blocks-social-list-github-link' => array(
                'label' => __('Github link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#left-github a link',
                    'placeholder' => "https://github.com/".__("UserName")
                ),
            ),

            //-------------------------------------------
            // Right bar
            //-------------------------------------------
            'right-blocks-panel_1-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-panel_1',
                    'data-admin-target' => '[name="right-blocks-panel_1-title"]'
                ),
            ),
            'right-blocks-panel_2-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-panel_2',
                    'data-admin-target' => '[name="right-blocks-panel_2-title"]'
                ),
            ),
            'right-blocks-panel_3-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-panel_3',
                    'data-admin-target' => '[name="right-blocks-panel_3-title"]'

                ),
            ),
            'right-blocks-panel_4-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-panel_4',
                    'data-admin-target' => '[name="right-blocks-panel_4-title"]'
                ),
            ),
            'right-blocks-panel_5-display' => array(
                'label' => __('New panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-panel_5',
                    'data-admin-target' => '[name="right-blocks-panel_5-title"]'
                ),
            ),
            'right-blocks-twitter-display' => array(
                'label' => __('Twitter'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-twitter',
                ),
            ),
            'right-blocks-social-display' => array(
                'label' => __('Social'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-social',
                ),
            ),
            'right-blocks-menu-display' => array(
                'label' => __('Menu'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => true,
                    'data-target' => '#right-blocks-menu',

                ),
            ),
            '_select_right' => array(
                'label' => __(''),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        '' => __('Add a component'),
                        'panel' => __('Panel'),
                        'right-blocks-social-display' => __('Social'),
                        'right-blocks-twitter-display' => __('Twitter'),
                        'right-blocks-menu-display' => __('Menu'),
                    ),
                ),
            ),
            '_input_hidden_right'=> array(
                'label' => __(''),
                'form' => array(
                    'type' => 'hidden'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 1 Right
            //-------------------------------------------
            'right-blocks-panel_1-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-blocks-panel_1 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_right-blocks-panel_1-display',

                ),
            ),
            'right-blocks-panel_1-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#right-blocks-panel_1 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 2 Right
            //-------------------------------------------
            'right-blocks-panel_2-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-blocks-panel_2 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_right-blocks-panel_2-display'


                ),
            ),
            'right-blocks-panel_2-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#right-blocks-panel_2 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 3 Right
            //-------------------------------------------
            'right-blocks-panel_3-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-blocks-panel_3 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_right-blocks-panel_3-display'
                ),
            ),
            'right-blocks-panel_3-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#right-blocks-panel_3 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 4 Right
            //-------------------------------------------
            'right-blocks-panel_4-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-blocks-panel_4 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_right-blocks-panel_4-display'
                ),
            ),
            'right-blocks-panel_4-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#right-blocks-panel_4 .panel-body'
                ),
            ),

            //-------------------------------------------
            // Modules Panel 5 Right
            //-------------------------------------------
            'right-blocks-panel_5-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-blocks-panel_5 > .panel-heading > .panel-title',
                    'data-admin-target' => '#label_right-blocks-panel_5-display'
                ),
            ),
            'right-blocks-panel_5-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '#right-blocks-panel_5 .panel-body'
                ),

            ),

            //-------------------------------------------
            // Twitter time line Right
            //-------------------------------------------
            'right-blocks-twitter-account_name' => array(
                'label' => __('Account name'),
                'form' => array(
                    'type' => 'text',
                    'value' => 'NoviusOS'
                ),
            ),

            //-------------------------------------------
            // Menu Right
            //-------------------------------------------
            'menus->right->menu_id' => array(
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
                'form' => array(
                    'class' => 'template-e-select-menu'
                ),
            ),

            //-------------------------------------------
            //  social Right
            //-------------------------------------------
            'right-blocks-social-list-facebook-link' => array(
                'label' => __('Facebook link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-facebook a link',
                    'placeholder' => "https://www.facebook.com/".__("UserName")
                ),
            ),
            'right-blocks-social-list-twitter-link' => array(
                'label' => __('Twitter link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-twitter a link',
                    'placeholder' => "https://twitter.com/".__("UserName")
                ),
            ),
            'right-blocks-social-list-google_plus-link' => array(
                'label' => __('Google+ link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-google_plus a link',
                    'placeholder' => "https://plus.google.com/".__("UserName")
                ),
            ),
            'right-blocks-social-list-github-link' => array(
                'label' => __('Github link'),
                'form' => array(
                    'type' => 'text',
                    'data-target' => '#right-github a link',
                    'placeholder' => "https://github.com/".__("UserName")
                ),
            ),

            //-------------------------------------------
            // Bloc Footer
            //-------------------------------------------
            'footer-content'=> array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                    'height' => $height_wysiwyg,
                    'theme_advanced_toolbar_location' => 'top',
                ),
                'form' => array(
                    'data-target' => '.footer_text'
                ),
            ),
            'menus->footer->menu_id' => array(
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
                'form' => array(
                    'class' => 'template-e-select-menu'
                ),
            ),
        ),
    ),
);
