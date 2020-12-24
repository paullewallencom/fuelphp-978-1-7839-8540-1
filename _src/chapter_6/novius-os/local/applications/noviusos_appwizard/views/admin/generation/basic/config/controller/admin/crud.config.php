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
<?php
$menus = array();
$content = array();

$fieldsByCategory = array();
$title_field = null;
$medias = array();
foreach ($model['fields'] as $field) {
    if (isset($field['is_on_crud']) && $field['is_on_crud']) {
        if (isset($field['is_title']) && $field['is_title']) {
            $title_field = render(
                $config['fields'][$field['type']]['views']['crud_name'],
                array(
                    'field' => $field,
                    'model' => $model,
                    'data' => $data,
                    'config' => $config,
                )
            );
        } elseif ($field['type'] == 'image') {
            $medias[] = render(
                $config['fields'][$field['type']]['views']['crud_name'],
                array(
                    'field' => $field,
                    'model' => $model,
                    'data' => $data,
                    'config' => $config,
                )
            );
        } else {
            if (!isset($fieldsByCategory[$field['category']])) {
                $fieldsByCategory[$field['category']] = array();
            }
            $fieldsByCategory[$field['category']][] = $field;
        }
    }
}

$viewsByCategoryType = array();
if (isset($model['categories'])) {
    for ($i = 0; $i < count($model['categories']); $i++) {
        $categoryType = $model['categories'][$i]['type'];
        if (!isset($viewsByCategoryType[$categoryType])) {
            $viewsByCategoryType[$categoryType] = array();
        }
        $viewsByCategoryType[$categoryType][] = render(
            $config['generation_path'].'/misc/categories/'.$categoryType,
            array(
                'fields' => isset($fieldsByCategory[$i]) ? $fieldsByCategory[$i] : array(),
                'model' => $model,
                'category' => $model['categories'][$i],
                'config' => $config,
                'data' => $data
            )
        );
    }
}
?>
return array(
    'controller_url'  => 'admin/<?= $data['application_settings']['folder'] ?>/<?= strtolower($model['name']) ?>/crud',
    'model' => '<?= $data['application_settings']['namespace'] ?>\Model_<?= $model['name'] ?>',
    'layout' => array(
        'large' => true,
<?php
if ($title_field !== null) {
    echo "        'title' => '".$title_field."',\n";
}
if (count($medias) > 0) {
    echo "        'medias' => array('".implode("', '", $medias)."'),\n";
}

if (isset($viewsByCategoryType['main'])) {
    echo "        'content' => array(\n";
    echo \Nos\AppWizard\Application_Generator::indent(
        '            ',
        implode("\n", $viewsByCategoryType['main'])
    );
    echo "\n";
    echo "        ),\n";
}
?>
<?php
if (isset($viewsByCategoryType['menu']) || isset($model['has_url_enhancer'])) {
    echo "        'menu' => array(\n";
    if (isset($model['has_url_enhancer'])) {
        echo "            __('URL') => array('" . $model['column_prefix'] . "virtual_name'),\n";
    }
    if (isset($viewsByCategoryType['menu'])) {
        echo \Nos\AppWizard\Application_Generator::indent(
            '            ',
            implode("\n", $viewsByCategoryType['menu'])
        );
        echo "\n";
    }
    echo "        ),\n";
}
?>
    ),
    'fields' => array(
        '<?= $model['column_prefix'] ?>_id' => array (
            'label' => 'ID: ',
            'form' => array(
                'type' => 'hidden',
            ),
            'dont_save' => true,
        ),
<?php
foreach ($model['fields'] as $field) {
    echo \Nos\AppWizard\Application_Generator::indent(
        '        ',
        render(
            $config['fields'][$field['type']]['views']['crud_config'],
            array(
                'field' => $field,
                'model' => $model,
                'config' => $config,
                'data' => $data
            )
        )
    );
    echo "\n";
}
?>
<?php if (isset($model['has_url_enhancer'])) {
        echo <<<MYDELIMITER
        '{$model['column_prefix']}virtual_name' => array(
            'label' => __('URL: '),
            'renderer' => 'Nos\Renderer_Virtualname',
            'validation' => array(
                'required',
                'min_length' => array(2),
            ),
        ),
MYDELIMITER;
        echo "\n";
}
?>
    )
    /* UI texts sample
    'i18n' => array(
        // Crud
        // Note to translator: Default copy meant to be overwritten by applications (e.g. The item has been deleted > The page has been deleted). The word 'item' is not to feature in Novius OS.
        'notification item added' => __('Done! The item has been added.'),
        'notification item saved' => __('OK, all changes are saved.'),
        'notification item deleted' => __('The item has been deleted.'),

        // General errors
        'notification item does not exist anymore' => __('This item doesn’t exist any more. It has been deleted.'),
        'notification item not found' => __('We cannot find this item.'),

        // Deletion popup
        'deleting item title' => __('Deleting the item ‘{{title}}’'),

        # Delete action's labels
        'deleting button N items' => n__(
            'Yes, delete this item',
            'Yes, delete these {{count}} items'
        ),

        'deleting wrong confirmation' => __('We cannot delete this item as the number of sub-items you’ve entered is wrong. Please amend it.'),

        'N items' => n__(
            '1 item',
            '{{count}} items'
        ),

        # Keep only if the model has the behaviour Contextable
        'deleting with N contexts' => n__(
            'This item exists in <strong>one context</strong>.',
            'This item exists in <strong>{{context_count}} contexts</strong>.'
        ),
        'deleting with N languages' => n__(
            'This item exists in <strong>one language</strong>.',
            'This item exists in <strong>{{language_count}} languages</strong>.'
        ),

        # Keep only if the model has the behaviour Twinnable
        'translate error parent not available in context' => __('We’re afraid this item cannot be added to {{context}} because its <a>parent</a> is not available in this context yet.'),
        'translate error parent not available in language' => __('We’re afraid this item cannot be translated into {{language}} because its <a>parent</a> is not available in this language yet.'),
        'translate error impossible context' => __('This item cannot be added in {{context}}. (How come you get this error message? You’ve hacked your way into here, haven’t you?)'),

        # Keep only if the model has the behaviour Tree
        'deleting with N children' => n__(
            'This item has <strong>one sub-item</strong>.',
            'This item has <strong>{{children_count}} sub-items</strong>.'
        ),
    ),
    */
    /*
    Tab configuration sample
    'tab' => array(
        'iconUrl' => 'static/apps/{{application_name}}/img/16/icon.png',
        'labels' => array(
            'insert' => __('Add an item'),
            'blankSlate' => __('Translate an item'),
        ),
    ),
    */
);
