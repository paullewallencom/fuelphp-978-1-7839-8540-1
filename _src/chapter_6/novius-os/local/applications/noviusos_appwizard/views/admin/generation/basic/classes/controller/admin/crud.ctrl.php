<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

echo "<?php\n";
?>
namespace <?= $data['application_settings']['namespace'] ?>;

class Controller_Admin_<?= $model['name'] ?>_Crud extends \Nos\Controller_Admin_Crud
{

}
