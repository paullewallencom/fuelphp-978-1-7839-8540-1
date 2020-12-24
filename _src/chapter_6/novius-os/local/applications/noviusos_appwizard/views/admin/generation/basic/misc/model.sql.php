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
CREATE TABLE IF NOT EXISTS `<?= $model['table_name'] ?>` (
    `<?= $model['column_prefix'] ?>id` int(11) unsigned NOT NULL AUTO_INCREMENT,
<?php
foreach ($model['fields'] as $field) {
    $view = render(
        $config['fields'][$field['type']]['views']['sql'],
        array(
            'model' => $model,
            'field' => $field,
            'data' => $data
        )
    );
    if (!empty($view)) {
        echo \Nos\AppWizard\Application_Generator::indent(
            '    ',
            $view
        );
        echo "\n";
    }
}

if (isset($model['has_url_enhancer'])) {
    echo '    `' . $model['column_prefix'] . "virtual_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,\n";
}

if (isset($model['has_twinnable_behaviour'])) {
    echo '    `' . $model['column_prefix'] . "context` varchar(25) NOT NULL,\n";
    echo '    `' . $model['column_prefix'] . "context_common_id` int(11) NOT NULL,\n";
    echo '    `' . $model['column_prefix'] . "context_is_main` tinyint(1) NOT NULL DEFAULT '0',\n";
}

if (isset($model['has_publishable_behaviour'])) {
    echo '    `' . $model['column_prefix'] . "publication_status` tinyint(1) NOT NULL,\n";
    echo '    `' . $model['column_prefix'] . "publication_start` datetime DEFAULT NULL,\n";
    echo '    `' . $model['column_prefix'] . "publication_end` datetime DEFAULT NULL,\n";
}

if (isset($model['has_author_behaviour'])) {
    echo '    `' . $model['column_prefix'] . "created_by_id` INT UNSIGNED NULL,\n";
    echo '    `' . $model['column_prefix'] . "updated_by_id` INT UNSIGNED NULL,\n";
}

?>
    `<?= $model['column_prefix'] ?>created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `<?= $model['column_prefix'] ?>updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`<?= $model['column_prefix'] ?>id`),
    KEY `<?= $model['column_prefix'] ?>created_at` (`<?= $model['column_prefix'] ?>created_at`),
    KEY `<?= $model['column_prefix'] ?>updated_at` (`<?= $model['column_prefix'] ?>updated_at`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;