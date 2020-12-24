<?php
return array(
    'controller_url'  => 'admin/my_first_application/monkey/crud',
    'model' => 'MyFirstApplication\Model_Monkey',
    'layout' => array(
        'large' => true,
        'title' => 'monk_name',
        'content' => array(
            'properties' => array(
                'view' => 'nos::form/expander',
                'params' => array(
                    'title'   => __('Properties'),
                    'nomargin' => true,
                    'options' => array(
                        'allowExpand' => false,
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'wysiwygs->description->wysiwyg_text'
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'menu' => array(
            __('URL') => array('monk_virtual_name'),
            __('Additional informations') => array(
                'monk_still_here',
                'monk_height'
            ),
        ),
    ),
    'fields' => array(
        'monk__id' => array (
            'label' => 'ID: ',
            'form' => array(
                'type' => 'hidden',
            ),
            'dont_save' => true,
        ),
        'monk_name' => array(
            'label' => __('Name'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'monk_still_here' => array(
            'label' => __('Still here'),
            'form' => array(
                'type' => 'checkbox',
                'value' => '1',
                'empty' => '0',
            ),
        ),
        'monk_height' => array(
            'label' => __('Height'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'wysiwygs->description->wysiwyg_text' => array(
            'label' => __('Description'),
            'renderer' => 'Nos\Renderer_Wysiwyg',
            'template' => '{field}',
            'form' => array(
                'style' => 'width: 100%; height: 500px;',
            ),
        ),
        'monk_virtual_name' => array(
            'label' => __('URL: '),
            'renderer' => 'Nos\Renderer_Virtualname',
            'validation' => array(
                'required',
                'min_length' => array(2),
            ),
        ),
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
