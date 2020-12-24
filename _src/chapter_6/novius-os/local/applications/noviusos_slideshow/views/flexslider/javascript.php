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
(function($) {
    $(window).load(function() {
        $('.flexslider').flexslider(<?= json_encode($flexslider_config) ?>)<?= $slides_preview ? '.novius_flexpreview()' : ''?>;
    });
})($.noConflict(true));
