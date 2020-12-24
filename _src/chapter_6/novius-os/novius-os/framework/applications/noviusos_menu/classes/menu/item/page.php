<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Nos\Menu;

use Nos\Page\Model_Page;

class Menu_Item_Page extends Menu_Item_Driver
{

    /**
     * @return string The item title
     */
    public function title()
    {
        if (!empty($this->item->mitem_title)) {
            return parent::title();
        }

        if ($this->item->mitem_page_id) {
            $page = Model_Page::find($this->item->mitem_page_id);
            if (!empty($page)) {
                return $page->page_menu_title ?: $page->page_title;
            }
        }
        return '';
    }
}
