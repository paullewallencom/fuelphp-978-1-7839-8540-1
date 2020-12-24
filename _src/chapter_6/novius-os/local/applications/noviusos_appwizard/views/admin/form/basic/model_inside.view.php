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
<div class="model input_item">
    <div class="model_information">
        <div class="labelled_input">
            <label>
                <?= __('Name (e.g. Monkey):') ?>
            </label>
            <input type="text" name="name" class="model_name" />
        </div>
        <div class="labelled_input">
            <label>
                <?= __('Table name (e.g. monkeys):') ?>
            </label>
            <input type="text" name="table_name" class="table_name" />
        </div>
        <div class="labelled_input">
            <label>
                <?= __('Column prefix (e.g. monk_):') ?>
            </label>
            <input type="text" name="column_prefix" class="column_prefix" />
        </div>
        <div class="labelled_input has_url_enhancer">
            <input type="checkbox" name="has_url_enhancer" />
            <label>
                <?= __('URL enhancer: This model content is to meant to be published online.') ?>
            </label>
        </div>
        <div class="labelled_input has_twinnable_behaviour">
            <input type="checkbox" name="has_twinnable_behaviour" />
            <label>
                <?= __('Twinnable behaviour: This model content is available in different versions depending on the language or context.') ?>
            </label>
        </div>
        <div class="labelled_input has_publishable_behaviour">
            <input type="checkbox" name="has_publishable_behaviour" />
            <label>
                <?= __('Publishable behaviour: This model content has a publication status, e.g. Published, Scheduled.') ?>
            </label>
        </div>
        <div class="labelled_input has_author_behaviour">
            <input type="checkbox" name="has_author_behaviour" />
            <label>
                <?= __('Author behaviour: An author is attributed to each piece of this model content.') ?>
            </label>
        </div>
    </div>
</div>
