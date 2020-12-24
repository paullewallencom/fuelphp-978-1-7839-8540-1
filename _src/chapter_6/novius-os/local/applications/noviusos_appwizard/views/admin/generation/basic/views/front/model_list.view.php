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
echo 'echo "<div class=\"', $data['application_settings']['folder'].'_'.strtolower($model['name']), ' noviusos_enhancer\">\n";'."\n";
echo 'if (count($' . strtolower($model['name']) . "_list) > 0) {\n";
echo '    echo "<ul>\n";'."\n";
echo '    foreach ($' . strtolower($model['name']) . '_list as $' . strtolower($model['name']) . ") {\n";
echo '        echo \'<li>\' . $' . strtolower($model['name']) . '->htmlAnchor() . "</li>\n";' . "\n";
echo "    }\n";
echo '    echo "</ul>\n";'."\n";
echo "}\n";
echo 'echo "</div>\n";'."\n";
