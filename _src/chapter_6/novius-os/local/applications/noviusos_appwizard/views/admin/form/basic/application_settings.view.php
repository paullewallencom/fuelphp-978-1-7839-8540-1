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
    <label>
        <?= __('Application name (e.g. My Application):') ?>
    </label>
    <input type="text" name="application_settings[name]" class="application_settings_name" />
</div>
<div class="labelled_input">
    <label>
        <?= __('Application folder (e.g. my_application):') ?>
    </label>
    <input type="text" name="application_settings[folder]" class="application_settings_folder" />
</div>
<div class="labelled_input">
    <label>
        <?= __('Application namespace (e.g. MyApplication):') ?>
    </label>
    <input type="text" name="application_settings[namespace]" class="application_settings_namespace" />
</div>
