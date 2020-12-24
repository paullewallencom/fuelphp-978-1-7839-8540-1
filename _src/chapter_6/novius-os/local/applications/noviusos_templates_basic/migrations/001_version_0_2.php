<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Nos\Templates\Basic\Migrations;

class Version_0_2 extends \Nos\Migration
{
    public function up()
    {
        $noviusos_template_variation = \Db::list_tables('nos_template_variation');
        if (empty($noviusos_template_variation)) {
            // Not need this migration on a fresh install
            parent::up();
        }
    }
}
