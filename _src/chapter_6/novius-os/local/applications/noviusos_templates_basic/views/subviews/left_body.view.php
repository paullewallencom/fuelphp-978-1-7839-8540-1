<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */
?>
<div id="content">
    <div id="colleft" class="noprint">
        <div class="vertical_menu">
            <?= \View::forge('noviusos_templates_basic::subviews/menu', $config['menu']) ?>
        </div>
    </div>
    <div id="colright">
        <?= \View::forge('noviusos_templates_basic::subviews/page_contexts', array('page' => $page), false) ?>
        <h1 id="pagename"><?= $title ?></h1>
        <?= $wysiwyg['content'] ?>
    </div>
    <div class="clearfloat"></div>
</div>
