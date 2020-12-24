<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

Nos\I18n::current_dictionary('noviusos_appwizard::common');
?>
<div class="labelled_input">
    <label class="inline">
        <?= __('Install the application on this Novius OS?') ?>
    </label>
    <input type="checkbox" name="generation_options[install]" checked/>
</div>
