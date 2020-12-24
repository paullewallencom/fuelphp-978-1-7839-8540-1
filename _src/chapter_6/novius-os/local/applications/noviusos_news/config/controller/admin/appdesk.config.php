<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Nos\I18n::current_dictionary(array('noviusos_news::common'));

$base = \Config::load('noviusos_blognews::controller/admin/appdesk', true);
$base['appdesk']['texts'] = array(
    'items' => __("news stories"),
    'item' => __("news story")
);

$base['i18n'] = array(
    'item' => __('news story'),
    'items' => __('news stories'),
    'NItems' => n__(
        '1 news story',
        '{{count}} news stories'
    ),
    'showNbItems' => n__(
        'Showing 1 news story out of {{y}}',
        'Showing {{x}} news stories out of {{y}}'
    ),
    'showNoItem' => __('No news stories'),
    // Note to translator: This is the action that clears the 'Search' field
    'showAll' => __('Show all news stories'),
);
return $base;
