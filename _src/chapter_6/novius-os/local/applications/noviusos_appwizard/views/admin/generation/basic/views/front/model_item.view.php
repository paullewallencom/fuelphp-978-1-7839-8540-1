<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$medias = $wysiwygs = array();
foreach ($model['fields'] as $field) {
    if ($field['type'] == 'image') {
        $medias[] = $field['column_name'];
    }
    if ($field['type'] == 'wysiwyg') {
        $wysiwygs[] = $field['column_name'];
    }
}
$item_variable = '$'.strtolower($model['name']);
?>
<?= "<?php\n" ?>
    // Load dictionnary if we want to use __()
    // Nos\I18n::current_dictionary('<?= $data['application_settings']['folder'] ?>::common');
<?= "?>\n" ?>
<div class="<?= $data['application_settings']['folder'].'_'.strtolower($model['name']) ?> noviusos_enhancer">
<h2><?= "<?=" . $item_variable . '->' .  $model['column_prefix'] . $model['title_column_name'] . " ?>" ?></h2>

<?php
if (count($medias)) {
    echo "<?php\n";

    foreach ($medias as $media_name) {
        echo 'if (!empty(' . $item_variable . "->medias->$media_name)) {\n";
        echo '    echo ' . $item_variable . '->medias->' . $media_name . '->htmlImgResized(400, 300);'."\n";
        echo "}\n";
    }
    echo "?>\n";
}
?>

<?php
if (count($wysiwygs)) {
    foreach ($wysiwygs as $wysiwyg_name) {
        echo '<?= ' . $item_variable . '->wysiwygs->' . $wysiwyg_name . " ?>\n";
    }
}

echo '<?= \Nos\Nos::main_controller()->getPage()->htmlAnchor(array(\'text\' => __(\'Back\'))); ?>';
?>
</div>