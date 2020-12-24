<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$content = (string) View::forge($content['view'], $view_params + $content['params'], false);
?>

<div class="template-e-block template-e-<?= $id ?>"
     data-title-popup="<?= htmlspecialchars($popup_title) ?>"
     data-width="<?= $width ?>"
     data-height="<?= isset($height) ? $height : "auto" ?>">
    <div class="fieldset">
        <?= $content; ?>
    </div>
</div>