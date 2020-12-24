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

use Nos\Controller_Front_Application;

use View;

class Controller_Front_<?= $model['name'] ?> extends Controller_Front_Application
{
    public $page_from = false;

    public function action_main($args = array())
    {
        $this->page_from = $this->main_controller->getPage();

        $enhancer_url = $this->main_controller->getEnhancerUrl();

        if (!empty($enhancer_url)) {
            $segments = explode('/', $enhancer_url);

            if (!empty($segments[0])) {
                return $this->display_<?= strtolower($model['name']) ?>($segments[0]);
            }

            throw new \Nos\NotFoundException();
        }

        return $this->display_list_<?= strtolower($model['name']) ?>();
    }

    protected function display_list_<?= strtolower($model['name']) ?>()
    {
        $params = array(
            'where' => array(),
            'order_by' => array(
                '<?= $model['column_prefix'] ?>id' => 'ASC'
            ),
            'limit' => 10
        );

<?php
if (!empty($model['has_twinnable_behaviour'])) {
    echo '        $params[\'where\'][] = array(\''.$model['column_prefix'].'context\', \'=\', $this->page_from->page_context);'."\n";
}
if (!empty($model['has_publishable_behaviour'])) {
    echo '        $params[\'where\'][] = array(\'published\', true);'."\n";
}
?>

        $<?= strtolower($model['name']) ?>_list =  Model_<?= $model['name'] ?>::find('all', $params);

        return \View::forge('front/<?= strtolower($model['name']) ?>_list', array(
            '<?= strtolower($model['name']) ?>_list' => $<?= strtolower($model['name']) ?>_list,
        ), false);
    }


    protected function display_<?= strtolower($model['name']) ?>($virtual_name)
    {
        $<?= strtolower($model['name']) ?> = Model_<?= $model['name'] ?>::find('first', array(
            'where' => array(
                array('<?= $model['column_prefix'] ?>virtual_name', '=', $virtual_name)
            )
        ));

        if (empty($<?= strtolower($model['name']) ?>)) {
            throw new \Nos\NotFoundException();
        }

        $title = $<?= strtolower($model['name']) ?>-><?= $model['column_prefix'] ?><?= $model['title_column_name'] ?>;
        $this->main_controller->setItemDisplayed(
            $<?= strtolower($model['name']) ?>,
            array(
                //'meta_description' => $title,
                //'meta_keywords' => '',
            ),
            array(
                'title' => ':page_title - '.$title,
            )
        );

        return \View::forge('front/<?= strtolower($model['name']) ?>_item', array(
            '<?= strtolower($model['name']) ?>' => $<?= strtolower($model['name']) ?>,
        ), false);
    }

    public static function getUrlEnhanced($params = array())
    {
        $item = \Arr::get($params, 'item', false);
        if ($item) {
            // url built according to $item'class
            switch (get_class($item)) {
                case '<?= $data['application_settings']['namespace'] ?>\Model_<?= $model['name'] ?>' :
                    return $item->virtual_name().'.html';
                    break;

                default:
                    return false;
            }
        }

        return '';
    }
}
