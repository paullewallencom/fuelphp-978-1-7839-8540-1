<?php
return array(
    'name'    => 'My first application',
    'version' => 'WIP', //@todo: to be defined
    'provider' => array(
        'name' => 'Unknown', //@todo: to be defined
    ),
    'namespace' => "MyFirstApplication",
    'permission' => array(
    ),
    'icons' => array( //@todo: to be defined
        64 => 'static/apps/my_first_application/img/64/icon.png',
        32 => 'static/apps/my_first_application/img/32/icon.png',
        16 => 'static/apps/my_first_application/img/16/icon.png',
    ),
    'launchers' => array(
        'MyFirstApplication::Monkey' => array(
            'name'    => 'Monkey', // displayed name of the launcher
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/my_first_application/monkey/appdesk', // url to load
                ),
            ),
        ),
    ),
    /* Launcher configuration sample
    'launchers' => array(
        'key' => array( // key must be defined
            'name'    => 'name of the launcher', // displayed name of the launcher
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'url to load', // URL to load
                ),
            ),
        ),
    ),
    */
    // Enhancer configuration sample
    'enhancers' => array(
        'my_first_application_monkey' => array( // key must be defined
            'title' => 'My first application Monkey',
            'desc'  => '',
            'urlEnhancer' => 'my_first_application/front/monkey/main', // URL of the enhancer
            //'previewUrl' => 'admin/my_first_application/application/preview', // URL of preview
            //'dialog' => array(
            //    'contentUrl' => 'admin/my_first_application/application/popup',
            //    'width' => 450,
            //    'height' => 400,
            //    'ajax' => true,
            //),
        ),
    ),
    /* Data catcher configuration sample
    'data_catchers' => array(
        'key' => array( // key must be defined
            'title' => 'title',
            'description'  => '',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/my_first_application/post/insert_update/?context={{context}}&title={{urlencode:'.\Nos\DataCatcher::TYPE_TITLE.'}}&summary={{urlencode:'.\Nos\DataCatcher::TYPE_TEXT.'}}&thumbnail={{urlencode:'.\Nos\DataCatcher::TYPE_IMAGE.'}}',
                    'label' => 'label of the data catcher',
                ),
            ),
            'onDemand' => true,
            'specified_models' => false,
            // data examples
            'required_data' => array(
                \Nos\DataCatcher::TYPE_TITLE,
            ),
            'optional_data' => array(
                \Nos\DataCatcher::TYPE_TEXT,
                \Nos\DataCatcher::TYPE_IMAGE,
            ),
        ),
    ),
    */
);
