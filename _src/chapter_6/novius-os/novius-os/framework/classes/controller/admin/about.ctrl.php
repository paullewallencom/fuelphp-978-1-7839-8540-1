<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Nos;

class Controller_Admin_About extends \Nos\Controller
{
    public function action_index()
    {
        $version = \Config::load('nos::version', true);
        return \View::forge('nos::admin/about', array('version' => $version));
    }
}
