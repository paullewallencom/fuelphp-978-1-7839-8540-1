/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

ALTER TABLE `nos_page` ADD `page_created_by_id` INT UNSIGNED NULL AFTER `page_updated_at` ,
ADD `page_updated_by_id` INT UNSIGNED NULL AFTER `page_created_by_id`;
