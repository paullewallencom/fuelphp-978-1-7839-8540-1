<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// $depth and $idParent set in template.config
// $depth: depth of the menu (1 = one level deep only, no sublevels)
// $idParent: start level, null for root (default)

$items = $menu->branch();
if (count($items)) {
    ?>
    <ul class="nobullet" id="menu">
    <?php
    foreach ($items as $item) {
        echo '<li class="lvl0">', $item->html();
        $subitems = $menu->branch($item);
        if (count($subitems)) {
            echo '<ul class="nobullet submenu">';
            foreach ($subitems as $si) {
                echo '<li class="lvl1">', $si->html(), '</li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo '</ul>';
}
