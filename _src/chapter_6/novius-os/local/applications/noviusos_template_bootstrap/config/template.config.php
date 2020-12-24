<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Nos\I18n::current_dictionary('noviusos_template_bootstrap::common', 'nos::common');

return array(
    'option_bar' => 'y',
    'css_style' => '',
    'principal' =>
        array(
            'skin' => 'Cerulean',
            'background_image' => '',
            'background_fixed_display' => true,
            'background_style' => 'background-attachment: fixed;background-repeat : no-repeat; background-position:center center; background-size :cover;'
        ),
    'header' =>
        array(
            'type' => 'title',
            'title' => 'Lorem Ipsum',
            'baseline' => 'dolor sit ame',
            'logo_url' => '',
            'fixed' => false,
        ),
    'jumbotron' => array(
        'display' => true, // option : true ,false
        'title' => __('Hello world!'),
        'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida libero vel magna cursus semper.</p>',
        'button' => array(
            'title' => __('Learn more'),
            'link' => '#',
        ),
    ),
    'left' =>
        array(
            'display' => true, // option : true ,false
            'blocks' =>
                array(
                    'menu' => array(
                        'type' => 'menu',
                        'display' => false, // option : true ,false
                    ),
                    'social' => array(
                        'type' => 'social',
                        'display' => false, // option : true ,false
                        'list' => array(
                            'facebook' => array(
                                'link' => '',
                            ),
                            'twitter' => array(
                                'link' => '',

                            ),
                            'google_plus' => array(
                                'link' => '',
                            ),
                            'github' => array(
                                'link' => '',
                            ),
                        ),
                    ),
                    'twitter' => array(
                        'type' => 'twitter',
                        'display' => false, // option : true ,false
                        'account_name' => 'NoviusOS',
                    ),
                    'panel_1' => array(
                        'type' => 'panel',
                        'display' => true, // option : true ,false
                        'title' => 'Lorem ipsum',
                        'content' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis consequat ligula. Quisque et ipsum non lacus porta lobortis a in lacus. Suspendisse venenatis nulla eget est lacinia rhoncus. Phasellus ac pretium lacus. Fusce elit enim, tincidunt id nibh id, lacinia varius erat. Nulla ornare imperdiet mattis. Curabitur neque orci, tincidunt eu ante a, semper tincidunt dui. Mauris cursus, mauris sed varius adipiscing, lectus leo ultricies velit, in ornare mi massa eget dui. Aliquam hendrerit lobortis turpis, eu elementum nunc tempus vel. Nulla luctus massa nec tellus congue posuere. Praesent vestibulum mauris enim, vel luctus odio dignissim ac. Donec elit ante, rhoncus semper nibh id, euismod eleifend elit. Suspendisse tincidunt sit amet ante ac sagittis. Nunc ac erat eleifend, semper massa nec, hendrerit est. Donec tristique in nunc nec feugiat. '
                        ),
                    'panel_2' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_3' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_4' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_5' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                ),
        ),
    'right' =>
        array(
            'display' => false, // option : true ,false
            'blocks' =>
                array(
                    'menu' => array(
                        'type' => 'menu',
                        'display' => false, // option : true ,false
                    ),
                    'social' => array(
                        'type' => 'social',
                        'display' => false, // option : true ,false
                        'list' => array(
                            'facebook' => array(
                                'link' => '',

                            ),
                            'twitter' => array(
                                'link' => '',

                            ),
                            'google_plus' => array(
                                'link' => '',

                            ),
                            'github' => array(
                                'link' => '',

                            ),
                        ),
                    ),
                    'twitter' => array(
                        'type' => 'twitter',
                        'display' => false, // option : true ,false
                        'account_name' => 'NoviusOS',
                    ),
                    'panel_1' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_2' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_3' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_4' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                    'panel_5' => array(
                        'type' => 'panel',
                        'display' => false, // option : true ,false
                        'title' => __('New Panel'),
                        'content' => '',
                    ),
                ),
        ),
    'footer' => array(
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis consequat ligula. Quisque et ipsum non lacus porta lobortis a in lacus. Suspendisse venenatis nulla eget est lacinia rhoncus. Phasellus ac pretium lacus. Fusce elit enim, tincidunt id nibh id, lacinia varius erat. Nulla ornare imperdiet mattis. Curabitur neque orci, tincidunt eu ante a, semper tincidunt dui. Mauris cursus, mauris sed varius adipiscing, lectus leo ultricies velit, in ornare mi massa eget dui. Aliquam hendrerit lobortis turpis, eu elementum nunc tempus vel. Nulla luctus massa nec tellus congue posuere. Praesent vestibulum mauris enim, vel luctus odio dignissim ac. Donec elit ante, rhoncus semper nibh id, euismod eleifend elit. Suspendisse tincidunt sit amet ante ac sagittis. Nunc ac erat eleifend, semper massa nec, hendrerit est. Donec tristique in nunc nec feugiat. ',
        'menu' => array(
           'display' => true,
        ),

    ),
);
