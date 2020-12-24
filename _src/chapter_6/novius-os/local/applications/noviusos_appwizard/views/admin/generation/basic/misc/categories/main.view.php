<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

?>
'<?= Inflector::friendly_title($category['name'], '_', true, false) ?>' => array(
    'view' => 'nos::form/expander',
    'params' => array(
        'title'   => __(<?= var_export($category['name']) ?>),
        'nomargin' => true,
        'options' => array(
            'allowExpand' => false,
        ),
        'content' => array(
            'view' => 'nos::form/fields',
            'params' => array(
                'fields' => array(
<?php
$fieldsName = array();
foreach ($fields as $field) {
    $fieldsName[] = render(
        $config['fields'][$field['type']]['views']['crud_name'],
        array(
            'field' => $field,
            'model' => $model,
            'data' => $data,
            'config' => $config,
        )
    );
}
if (count($fieldsName) > 0) {
    echo '                    \''.implode("',\n                    '", $fieldsName).'\'';
    echo "\n";
}
?>
                ),
            ),
        ),
    ),
),