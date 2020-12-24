<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$iscmd = '12'; //int_size_content medium
$iscsm ='9'; //int_size_content small
$isic = '12';//int_size_inner_content
$ioc = 'col-md-offset-1 col-sm-offset-1 '; //int_offset_content
$ioic = '' ;//int_offset_inner_content

$sidebar_display = ( $config['left']['display'] ?
    ($config['right']['display']? 'both':'left') :
    ($config['right']['display']? 'right':'none'));

switch ($sidebar_display) {
    case 'left':
        $iscmd = '8';
        $isic = '12';
        $ioic = '';
        $ioc = '';
        break;
    case 'right':
        $iscmd = '8';
        $isic = '12';
        $ioic = '';
        break;
    case 'both':
        $iscmd = '6';
        $isic = '12';
        $ioic = '';
        $ioc = '';
        break;
    case 'none':
        $ioc = "";
        break;
}

$str_class_content = $ioc.' col-md-'.$iscmd.' col-sm-'.$iscsm.' col-xs-12';
$str_class_inner_content = $ioic.' col-md-'.$isic.' col-sm-'.$isic.' col-xs-'.$isic;
$style_fixed  = '';

if ($config['header']['fixed']) {
    $style_fixed = 'middle-header-fixed';
}
?>
<div  class="row <?= $style_fixed ?> ">
    <?php
    echo \View::forge('noviusos_template_bootstrap::bootstrap/side_bar', array(
        'position' => 'left',
        'config' => $config,
        'dom_id' => $dom_id,
    ), false);
    ?>
     <div id="middle_content" class="<?= $str_class_content ?>" >

        <div class="<?= $str_class_inner_content ?>">
            <div class="">

                <div id="jumbotron" class="jumbotron customisable"
                     style="display: <?= $config['jumbotron']['display'] ? 'block' : 'none' ?>">
                    <div class="container">
                        <h1><?= $config['jumbotron']['title'] ?></h1>
                        <span><?= \Nos\Tools_Wysiwyg::parse($config['jumbotron']['content'])?></span>
                        <a href="<?=$config['jumbotron']['button']['link']?>"
                           class="btn btn-primary btn-lg"><?= $config['jumbotron']['button']['title'] ?></a>
                    </div>
                </div>
            </div>

        </div>
        <div id="block-grid" class=" customisable col-md-12 col-sm-12 col-xs-12 main_wysiwyg"><h1 id="pagename"><?= $title ?></h1>
            <div id="grid_content_layout">
            <?php
            $view = View::forge('noviusos_template_bootstrap::' . $template . '/wysiwyg', array(
                        'page' => $page,
                        'title' => $title,
                        'wysiwyg' => $wysiwyg,
                        'config' => $config,
                        'template' => $template,
                    ), false);
            echo $view;
            ?>
            </div>
        </div>
        <br>
     </div>
    <?php
    echo \View::forge('noviusos_template_bootstrap::bootstrap/side_bar', array(
        'position' => 'right',
        'config' => $config,
        'dom_id' => $dom_id,
    ), false);
    ?>
</div>
