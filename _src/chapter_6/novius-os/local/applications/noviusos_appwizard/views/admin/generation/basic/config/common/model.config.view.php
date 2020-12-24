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
return array(
    'controller' => '<?= strtolower($model['name']).'/crud' ?>',
    'data_mapping' => array(
<?php
$thumbnails_rendered = false;
foreach ($model['fields'] as $field) {
    if (isset($field['is_on_appdesk']) && $field['is_on_appdesk']) {
        if ($field['type'] == 'image') {
            if ($thumbnails_rendered) {
                // we add the data_mapping (thumbnail and thumbnailAlternate) for the media only once
                continue;
            }
            $thumbnails_rendered = true;
        }
        echo \Nos\AppWizard\Application_Generator::indent(
            '        ',
            render(
                $config['fields'][$field['type']]['views']['data_mapping'],
                array(
                    'field' => $field,
                    'model' => $model,
                    'data' => $data,
                    'config' => $config
                )
            )
        );
        echo "\n";
    }
}
if (isset($model['has_twinnable_behaviour'])) {
    echo "        'context' => true,\n";
}

if (isset($model['has_publishable_behaviour'])) {
    echo "        'publication_status' => true,\n";
}

?>
    ),
    /*
    'i18n' => array(
        // Crud
        'notification item added' => __('Done! The item has been added.'),
        'notification item saved' => __('OK, all changes are saved.'),
        'notification item deleted' => __('The item has been deleted.'),

        // General errors
        'notification item does not exist anymore' => __('This item doesn’t exist any more. It has been deleted.'),
        'notification item not found' => __('We cannot find this item.'),
        'deleted popup title' => __('Bye bye'),
        'deleted popup close' => __('Close tab'),

        // see novius-os/framework/config/i18n_common.config.php
    ),
    */
    /*
    'actions' => array(
        'delete' => array(
            'action' => array( // ce qu'on envoi à nosAction
                'action' => 'confirmationDialog',
                    'dialog' => array(
                    'contentUrl' => '{{controller_base_url}}delete/{{_id}}',
                    'title' => 'Delete',
                ),
            ),
            'label' => __('Delete'),
            'primary' => true,
            'icon' => 'trash',
            'red' => true,
            'targets' => array(
                'grid' => true,
                'toolbar-edit' => true,
            ),
            'disabled' => function($item) {
                return false;
            },
            'visible' => function($params) {
                return !isset($params['item']) || !$params['item']->is_new();
            },
        ),
    )
    */
    /*
    'actions' => array(
        'list' => array(
            'delete' => array(
                'action' => array( // ce qu'on envoi à nosAction
                    'action' => 'confirmationDialog',
                    'dialog' => array(
                        'contentUrl' => '{{controller_base_url}}delete/{{_id}}',
                        'title' => 'Delete',
                    ),
                ),
                'label' => __('Delete'),
                'primary' => true,
                'icon' => 'trash',
                'red' => true,
                'targets' => array(
                'grid' => true,
                    'toolbar-edit' => true,
                ),
                'disabled' => function($item) {
                        return false;
                },
                'visible' => function($params) {
                        return !isset($params['item']) || !$params['item']->is_new();
                },
            ),
        ),
        'order' => array(
            'delete',
            // others
        ),
    )
    */
);