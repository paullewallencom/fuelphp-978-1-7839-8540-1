<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Nos\Templates\Bootstrap;

use Nos\Page\Model_Page;
use Nos\Template\Variation\Model_Template_Variation;
use Nos\Tools_Url;

class Controller_Admin_Visualise extends \Nos\Template\Variation\Controller_Admin_Visualise
{
    protected function _generateCache()
    {
        parent::_generateCache();

        $this->_view->set('inline_admin', \Input::get('dom_id'), false);
    }

    protected function _findPage()
    {
        if (empty($this->tpvar_id_visualise)) {
            $context = \Input::get('context');
            $tpvar = Model_Template_Variation::forge();
            $tpvar->tpvar_template = \Input::get('template');
            $tpvar->tpvar_data = array();

            $page = Model_Page::forge();
            $page->page_context = $context;
            $page->template_variation = $tpvar;
            $this->_contexts_possibles[$context] = Tools_Url::context($context);
            $page->page_id = 0;
            $page->page_title = 'Lorem Ipsum';
            $page->page_entrance = 1;

            $this->setPage($page);
        } else {
            parent::_findPage();
            $tpvar = Model_Template_Variation::find($this->tpvar_id_visualise);
            $tpvar->tpvar_template = \Input::get('template');
            if (!is_array($tpvar->tpvar_data)) {
                $tpvar->tpvar_data = array();
            }
        }
    }
}
