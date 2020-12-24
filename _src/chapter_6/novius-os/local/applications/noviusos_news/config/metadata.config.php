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
    'name'    => 'News stories',
    'version' => '5.0.1 (Elche)',
    'provider' => array(
        'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\BlogNews\News',
    'permission' => array(

    ),
    'i18n_file' => 'noviusos_news::metadata',
    'requires' => array('noviusos_blognews', 'noviusos_comments'),
    'extends' => array('noviusos_menu'),
    'launchers' => array(
        'noviusos_news' => array(
            'name'    => 'News stories',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/noviusos_news/appdesk',
                ),
            ),
        ),
    ),
    'enhancers' => array(
        'home_news' => array(
            'title' => 'Links to news stories (e.g. for side column)',
            'desc'  => '',
            'enhancer' => 'noviusos_news/front/home',
            'iconUrl' => 'static/apps/noviusos_news/img/news-16.png',
            'dialog' => array(
                'contentUrl' => 'admin/noviusos_news/enhancer/popup',
                'width' => 370,
                'height' => 410,
                'ajax' => true,
            ),
        ),
        'noviusos_news' => array(
            'title' => 'News stories',
            'desc'  => '',
            'urlEnhancer' => 'noviusos_news/front/main',
            'iconUrl' => 'static/apps/noviusos_news/img/news-16.png',
            'dialog' => array(
                'contentUrl' => 'admin/noviusos_news/enhancer/popup',
                'width' => 370,
                'height' => 410,
                'ajax' => true,
            ),
        ),
    ),
    'icons' => array(
        16 => 'static/apps/noviusos_news/img/news-16.png',
        32 => 'static/apps/noviusos_news/img/news-32.png',
        64 => 'static/apps/noviusos_news/img/news-64.png',
    ),
);
