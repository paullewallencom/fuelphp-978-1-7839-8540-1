<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$display_img = '';
$display_img_small = '';
$display_title = '';
$display_title_small = '';
$id_text = 'title';

switch ($config['header']['type']) {
    case 'title':
        $display_img = 'display : none ;';
        $id_text = 'titleonly';
        $display_img_small = ' display : none';
        $str_title_small = '<span class="title_small_only">' . $config['header']['title'] . '</span>';
        break;

    case 'image':
        $display_title = 'display : none';
        break;

    case 'both':
        break;
}

$sitename = $config['header']['title'];

$str_img = '<span id="header-logo" class="image " style="' .
    $display_img . '" > <img src="' . $config['header']['logo_url'] . '"></span>';
$str_img_small = '<span id="header-logo-small" class="image_small" style="' . $display_img_small . '"> <img src="' .
    $config['header']['logo_url'] . '"></span>';
$str_title_small = '<span id="header-title-small" class="title_small" style="' . $display_title_small . '">' . $sitename . '</span>';
$str_title = '<span id="header-title" style="' .
    $display_title . '">' . $sitename . '</span>';
$str_baseline = '<span id="header-baseline" style="' .
    $display_title . '">' . $config['header']['baseline'] . '</span>';

$top = '-50px';

if (!$dom_id) {
    switch ($config['header']['type']) {
        case 'text':
            $str_img = '';
            $id_text = 'titleonly';
            $str_img_small = '';
            $str_title_small = '<span class="title_small_only">' . $config['header']['title'] . '</span>';
            break;

        case 'image':
            $str_title = '';
            $str_title_small = '';
            break;

        case 'both':
            break;
    }
}

$path_img = 'static/apps/noviusos_template_bootstrap/img/';

$depth = 3;
$top = '-72px';

$style_fixed = '';

if ($config['header']['fixed']) {
    $style_fixed = 'header-fixed';
}
?>
<div class="head_content row <?= $style_fixed ?>">
    <nav class="navbar navbar-inverse " role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" id="sitename"
               href="<?= \Nos\Tools_Url::context(\Nos\Nos::main_controller()->getPage()->get_context()) ?>"
                ><?= $str_img_small ?><?= $str_title_small ?></a>
            <button class="navbar-toggle collapsed right" data-target=".navbar-collapse" data-toggle="collapse"
                    type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="container collapse navbar-collapse">
            <?php
            if ($depth > 0) {
                $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
                $menu = $tpvar->menus->principal;
                if (empty($menu)) {
                    $menu = \Nos\Menu\Model_Menu::buildFromPages(\Nos\Nos::main_controller()->getContext());
                }
                echo $menu->html(array(
                    'view' => 'noviusos_template_bootstrap::' . $template . '/menu_header_driver',
                    'id' => 'list-menu',
                    'class' => 'nav navbar-nav navbar-right'
                ));
            }
            ?>
        </div>

    </nav>
    <div id="header" class="nav-logo customisable title_header">
        <a href="#" style="display: inline-block;"><?= $str_img ?><a/>

            <span class="<?= $id_text ?>">
                 <a class="link-title" href="#" style="display: inline-block;"><?= $str_title ?><br>
                     <?= $str_baseline ?></a>
            </span>
        </a>
    </div>
</div>





