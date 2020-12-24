<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

Nos\I18n::current_dictionary('noviusos_templates_basic::common');

// Display a switch to others contexts twin with the current page
$others_contexts = $page->find_other_context();
$links = array();
foreach ($others_contexts as $page_context) {
    if ($page_context->published()) {
        $context = $page_context->get_context();
        $links[] = $page_context->htmlAnchor(array('text' => \Nos\Tools_Context::contextLabel($context)));
    }
}
if (!empty($links)) {
    ?>
    <div id="page_contexts"><span><?= strtr(__('This page also exists in: {{contexts}}'), array(
        '{{contexts}}' => implode(' | ', $links),
    )); ?></span></div>
    <?php
}
