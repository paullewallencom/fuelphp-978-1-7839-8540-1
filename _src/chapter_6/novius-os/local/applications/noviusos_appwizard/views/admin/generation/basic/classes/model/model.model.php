<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$properties = array();
$properties[] = var_export($model['column_prefix'].'id', true);

foreach ($model['fields'] as $field) {
    if ($config['fields'][$field['type']]['on_model_properties']) {
        $column_name = var_export($model['column_prefix'].$field['column_name'], true);
        $properties[] = $column_name;
    }
}

if (isset($model['has_url_enhancer'])) {
    $properties[] = render(
        'noviusos_appwizard::admin/generation/basic/misc/properties/virtual_name',
        array(
            'model' => $model,
        ),
        true
    );
}

if (isset($model['has_publishable_behaviour'])) {
    $properties[] = var_export($model['column_prefix'].'publication_status', true);
    $properties[] = var_export($model['column_prefix'].'publication_start', true);
    $properties[] = var_export($model['column_prefix'].'publication_end', true);
}

if (isset($model['has_twinnable_behaviour'])) {
    $properties[] = var_export($model['column_prefix'].'context', true);
    $properties[] = var_export($model['column_prefix'].'context_common_id', true);
    $properties[] = var_export($model['column_prefix'].'context_is_main', true);
}

if (isset($model['has_author_behaviour'])) {
    $properties[] = var_export($model['column_prefix'].'created_by_id', true);
    $properties[] = var_export($model['column_prefix'].'updated_by_id', true);
}

$properties[] = var_export($model['column_prefix'].'created_at', true);
$properties[] = var_export($model['column_prefix'].'updated_at', true);

for ($i = 0; $i < count($properties); $i++) {
    $properties[$i] = \Nos\AppWizard\Application_Generator::indent('        ', $properties[$i]);
}

echo "<?php\n";
?>

namespace <?= $data['application_settings']['namespace'] ?>;

class Model_<?= $model['name'] ?> extends \Nos\Orm\Model
{

    protected static $_primary_key = array('<?= $model['column_prefix'] ?>id');
    protected static $_table_name = '<?= $model['table_name'] ?>';

    protected static $_properties = array(
<?= implode(",\n", $properties).",\n" ?>
    );

<?php
if ($model['title_column_name'] !== null) {
    echo '    protected static $_title_property = '.var_export($model['column_prefix'].$model['title_column_name'], true).";\n";
}
?>

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'mysql_timestamp' => true,
            'property'=>'<?= $model['column_prefix'] ?>created_at'
        ),
        'Orm\Observer_UpdatedAt' => array(
            'mysql_timestamp' => true,
            'property'=>'<?= $model['column_prefix'] ?>updated_at'
        )
    );

    protected static $_behaviours = array(
<?= isset($model['has_publishable_behaviour']) ? '' : "        /*\n" ?>
        'Nos\Orm_Behaviour_Publishable' => array(
            'publication_state_property' => '<?= $model['column_prefix'] ?>publication_status',
            'publication_start_property' => '<?= $model['column_prefix'] ?>publication_start',
            'publication_end_property' => '<?= $model['column_prefix'] ?>publication_end',
        ),
<?= isset($model['has_publishable_behaviour']) ? '' : "        */\n" ?>
<?= isset($model['has_url_enhancer']) ? '' : "        /*\n" ?>
        'Nos\Orm_Behaviour_Urlenhancer' => array(
            'enhancers' => array('<?= $data['application_settings']['folder'] ?>_<?= strtolower($model['name']) ?>'),
        ),
<?= isset($model['has_url_enhancer']) ? '' : "        */\n" ?>
<?= isset($model['has_url_enhancer']) ? '' : "        /*\n" ?>
        'Nos\Orm_Behaviour_Virtualname' => array(
            'virtual_name_property' => '<?= $model['column_prefix'] ?>virtual_name',
        ),
<?= isset($model['has_url_enhancer']) ? '' : "        */\n" ?>
<?= isset($model['has_twinnable_behaviour']) ? '' : "        /*\n" ?>
        'Nos\Orm_Behaviour_Twinnable' => array(
            'context_property'      => '<?= $model['column_prefix'] ?>context',
            'common_id_property' => '<?= $model['column_prefix'] ?>context_common_id',
            'is_main_property' => '<?= $model['column_prefix'] ?>context_is_main',
            'common_fields'   => array(),
        ),
<?= isset($model['has_twinnable_behaviour']) ? '' : "        */\n" ?>
<?= isset($model['has_author_behaviour']) ? '' : "        /*\n" ?>
        'Nos\Orm_Behaviour_Author' => array(
            'created_by_property' => '<?= $model['column_prefix'] ?>created_by_id',
            'updated_by_property' => '<?= $model['column_prefix'] ?>updated_by_id',
        ),
<?= isset($model['has_author_behaviour']) ? '' : "        */\n" ?>
    );

    protected static $_belongs_to  = array(
        /*
        'key' => array( // key must be defined, relation will be loaded via $<?= strtolower($model['name']) ?>->key
            'key_from' => '<?= $model['column_prefix'] ?>...', // Column on this model
            'model_to' => '<?= $data['application_settings']['namespace'] ?>\Model_...', // Model to be defined
            'key_to' => '...', // column on the other model
            'cascade_save' => false,
            'cascade_delete' => false,
            //'conditions' => array('where' => ...)
        ),
        */
    );
    protected static $_has_one   = array();
    protected static $_has_many  = array(
        /*
        'key' => array( // key must be defined, relation will be loaded via $<?= strtolower($model['name']) ?>->key
            'key_from' => '<?= $model['column_prefix'] ?>...', // Column on this model
            'model_to' => '<?= $data['application_settings']['namespace'] ?>\Model_...', // Model to be defined
            'key_to' => '...', // column on the other model
            'cascade_save' => false,
            'cascade_delete' => false,
            //'conditions' => array('where' => ...)
        ),
        */
    );
    protected static $_many_many = array(
        /*
            'key' => array( // key must be defined, relation will be loaded via $<?= strtolower($model['name']) ?>->key
                'table_through' => '...', // intermediary table must be defined
                'key_from' => '<?= $model['column_prefix'] ?>...', // Column on this model
                'key_through_from' => '...', // Column "from" on the intermediary table
                'key_through_to' => '...', // Column "to" on the intermediary table
                'key_to' => '...', // Column on the other model
                'cascade_save' => false,
                'cascade_delete' => false,
                'model_to'       => '<?= $data['application_settings']['namespace'] ?>\Model_...', // Model to be defined
            ),
        */
    );

    protected static $_twinnable_belongs_to = array();
    protected static $_twinnable_has_one    = array();
    protected static $_twinnable_has_many   = array();
    protected static $_twinnable_many_many  = array();
    protected static $_attachment           = array();
}
