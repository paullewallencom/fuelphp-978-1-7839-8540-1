<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Config::load('noviusos_template_bootstrap::template', true);
$config = \Config::get('noviusos_template_bootstrap::template');

if (!isset($inline_admin)) {
    $inline_admin = false;
}
//\Fuel\Core\Debug::dump($page->template_variation->tpvar_data);


$template = 'bootstrap' ;// or foundation

$view = \View::forge('noviusos_template_bootstrap::'.$template.'/index', array(
    'page' => $page,
    'title' => $title,
    'wysiwyg' => $wysiwyg,
    'page' => $page,
    'dom_id' => $inline_admin,
    'template' => $template,
    'current_context' => $page->get_context(),
), false);

echo $view;

if ($inline_admin) {
    echo \View::forge('noviusos_template_bootstrap::'.$template.'/inline_admin', array(
        'dom_id' => $inline_admin,
    ), false);
}
