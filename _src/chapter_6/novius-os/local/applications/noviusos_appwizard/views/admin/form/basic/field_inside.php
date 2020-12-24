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
<div class="field_item input_item">
    <div class="labelled_input">
        <label>
            <?= __('Label (e.g. Title):') ?>
        </label>
        <input type="text" name="label" class="label_input" />
    </div>
    <div class="labelled_input">
        <label>
            <?= __('Column name (without prefix; e.g. title):') ?>
        </label>
        <input type="text" name="column_name" class="column_input" style="width: 85%;" />
        <span class="labelled_input">
            <input type="checkbox" name="use_title" class="use_title_checkbox" checked/>
            <label class="inline">
                <?= __('Use label') ?>
            </label>
        </span>
    </div>
    <div class="labelled_input">
        <label>
            <?= __('Type:') ?>
        </label>
        <select name="type">
<?php
foreach ($config['fields'] as $key => $val) {
    echo '<option value="'.$key.'">'.$val['label'].'</option>';
}
?>
        </select>
    </div>
    <div class="visible_where">
        <div class="labelled_input is_title_area">
            <input type="checkbox" name="is_title" class="is_title_checkbox" />
            <label class="inline">
                <?= __('Is the form title') ?>
            </label>
        </div>
        <div class="labelled_input">
            <input type="checkbox" name="is_on_appdesk" class="is_on_appdesk" />
            <label class="inline">
                <?= __('Shows in the App Desk') ?>
            </label>
        </div>
        <div class="labelled_input">
            <input type="checkbox" name="is_on_crud" class="is_on_crud_checkbox" checked/>
            <label class="inline">
                <?= __('Shows in the add/update forms') ?>
            </label>
        </div>
        <div class="crud_options">
            <div class="crud_other_options">
                <div class="labelled_input">
                    <label>
                        <?= __('Fields group') ?>
                    </label>
                    <select name="category" class="category_type">
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
