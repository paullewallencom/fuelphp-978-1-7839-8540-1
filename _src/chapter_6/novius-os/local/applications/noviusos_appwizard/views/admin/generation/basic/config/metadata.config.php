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
    'name'    => <?= var_export($data['application_settings']['name']) ?>,
    'version' => 'WIP', //@todo: to be defined
    'provider' => array(
        'name' => 'Unknown', //@todo: to be defined
    ),
    'namespace' => "<?= $data['application_settings']['namespace'] ?>",
    'permission' => array(
    ),
    'icons' => array( //@todo: to be defined
        64 => 'static/apps/<?= $data['application_settings']['folder'] ?>/img/64/icon.png',
        32 => 'static/apps/<?= $data['application_settings']['folder'] ?>/img/32/icon.png',
        16 => 'static/apps/<?= $data['application_settings']['folder'] ?>/img/16/icon.png',
    ),
<?php
if (isset($data['models'])) {
    echo "    'launchers' => array(\n";
    foreach ($data['models'] as $model) {
        echo \Nos\AppWizard\Application_Generator::indent(
            '        ',
            render(
                $config['generation_path'].'/misc/launcher',
                array(
                    'model' => $model,
                    'data' => $data
                )
            )
        );
        echo "\n";
    }
    echo "    ),\n";

}
?>
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
<?php
if (isset($data['models'])) {
    foreach ($data['models'] as $model) {
        if (!isset($model['has_url_enhancer'])) {
            echo "        /*\n";
        }
        $title = str_replace("'", "\\'", $data['application_settings']['name'] . ' ' . $model['name']);
        $name_lower = strtolower($model['name']);
        echo <<<MYDELIMITER
        '{$data['application_settings']['folder'] }_{$name_lower}' => array( // key must be defined
            'title' => '$title',
            'desc'  => '',
            'urlEnhancer' => '{$data['application_settings']['folder']}/front/{$name_lower}/main', // URL of the enhancer
            //'previewUrl' => 'admin/{$data['application_settings']['folder']}/application/preview', // URL of preview
            //'dialog' => array(
            //    'contentUrl' => 'admin/{$data['application_settings']['folder']}/application/popup',
            //    'width' => 450,
            //    'height' => 400,
            //    'ajax' => true,
            //),
        ),
MYDELIMITER;
        echo "\n";
        if (!isset($model['has_url_enhancer'])) {
            echo "        */\n";
        }
    }
}
?>
    ),
    /* Data catcher configuration sample
    'data_catchers' => array(
        'key' => array( // key must be defined
            'title' => 'title',
            'description'  => '',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/<?= $data['application_settings']['folder'] ?>/post/insert_update/?context={{context}}&title={{urlencode:'.\Nos\DataCatcher::TYPE_TITLE.'}}&summary={{urlencode:'.\Nos\DataCatcher::TYPE_TEXT.'}}&thumbnail={{urlencode:'.\Nos\DataCatcher::TYPE_IMAGE.'}}',
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
