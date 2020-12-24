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

echo render('nos::form/expander', array(
    'title' => __('Field'),
    'content' => render('noviusos_appwizard::admin/form/basic/field_inside', array('config' => $config), false)), false);
