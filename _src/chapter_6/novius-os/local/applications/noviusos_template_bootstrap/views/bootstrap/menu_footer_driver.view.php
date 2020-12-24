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
    <ul <?= ( isset($class) ? 'class="'.$class.'"' : '' )?> <?= isset($id) ? 'id="'.$id.'"' : '' ?> style="display: table ; width : 100%">
    <?php
    foreach ($items as $item) {
        echo '<li class="lvl0" style="display: table-cell ; float : none">', $item->html(array('class' => ''));
        $subitems = $menu->branch($item);
        if (count($subitems)) {
            echo '<ul class="nav nav-pills nav-stacked" style="text-indent: 20px;">';
            foreach ($subitems as $si) {
                echo '<li class="lvl0 ">', $si->html(array('class' => ''));
                $subsubitems = $menu->branch($si);
                if (count($subsubitems)) {
                    echo '<ul class="nav nav-pills nav-stacked" style="text-indent: 40px;">';
                    foreach ($subsubitems as $ssi) {
                        echo '<li class="lvl1">', $ssi->html(array('class' => '')), '</li>';
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
}
