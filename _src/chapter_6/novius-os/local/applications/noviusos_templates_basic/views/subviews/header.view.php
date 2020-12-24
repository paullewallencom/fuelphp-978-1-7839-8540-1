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
<div id="header" class="noprint">
    <a id="sitename" href="<?=\Nos\Tools_Url::context(\Nos\Nos::main_controller()->getPage()->get_context()) ?>"><?= $sitename ?></a>
<?php
// Display a switch to others contexts home page
$contexts = \Nos\Tools_Context::contexts();
$links = array();
foreach (array_keys($contexts) as $i => $context) {
    if ($context === $current_context) {
        continue;
    }
    $links[] = '<a href="'.\Nos\Tools_Url::context($context).'">'.\Nos\Tools_Context::contextLabel($context).'</a>';
}
if (!empty($links)) {
    echo '<div id="contexts">', implode(' | ', $links), '</div>';
}
?>
</div>
