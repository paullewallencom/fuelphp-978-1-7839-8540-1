<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$items = $menu->branch();

if (count($items)) {
    ?>
    <ul <?= isset($class) ? 'class="'.$class.'"' : '' ?> <?= isset($id) ? 'id="'.$id.'"' : '' ?>>
    <?php
    foreach ($items as $item) {
        $param = count($menu->branch($item)) < 1 ?
            array() : array('data-toggle' => 'dropdown' , 'class' => ' item_caret dropdown-toggle');

        echo '<li class="lvl0">', $item->html($param);
        $subitems = $menu->branch($item);
        if (count($subitems)) {
            echo '<ul class="nobullet submenu dropdown-menu">';
            foreach ($subitems as $si) {
                $param = count($menu->branch($si)) < 1 ?
                    array() : array('data-toggle' => 'dropdown' , 'class' => 'dropdown-toggle');
                $css_sub = count($menu->branch($si)) > 0 ?  'dropdown-submenu' : '';
                echo '<li class="lvl0 '.$css_sub.'">', $si->html($param);
                $subsubitems = $menu->branch($si);
                if (count($subsubitems)) {
                    echo '<ul class="nobullet submenu dropdown-menu">';
                    foreach ($subsubitems as $ssi) {
                        echo '<li class="lvl1">', $ssi->html(), '</li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    ?>
    </ul>
    <?php
} else {
    ?>
    <ul <?= isset($class) ? 'class="'.$class.'"' : '' ?> <?= isset($id) ? 'id="'.$id.'"' : '' ?>></ul>
    <?php
}
