<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$sidebar_display = ($config['left']['display'] ?
    ($config['right']['display'] ? 'both' : 'left') :
    ($config['right']['display'] ? 'right' : 'none'));

$template = 'bootstrap';

if (($sidebar_display == $position || $sidebar_display == 'both') || $dom_id) {
    if ($sidebar_display == $position || $sidebar_display == 'both') {
        $display = 'block';
    } else {
        $display = 'none';
    }

    $str_bar = '';

    $colsm = '12';
    $offset = '';

    $str_prio_class = '';

    $colsm = '3';
    $str_prio_class = 'priority';
    ?>
    <div id="side-<?= $position ?>"
         class="customisable side_bar <?= $offset ?> col-md-3 col-sm-<?= $colsm ?> col-xs-12 <?= $str_prio_class ?>"
         style="display: <?= $display ?>;">
        <?php
    foreach ($config[$position]['blocks'] as $key => $value) {
        if (isset($value['type'])) {
            switch ($value['type']) {
                case 'menu':
                    if ($value['display'] || $dom_id) {
                        ?>
                        <div id="<?= $position ?>-blocks-menu"
                             class="customisable panel panel-default title_menu"
                            <?= $dom_id && !$value['display'] ? 'style="display: none;"' : '' ?>>
                            <div class='panel-body'>
                        <?php
                        $depth = 3;
                        if ($depth > 0) {
                            $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
                            $menu = ($position == 'left' ? $tpvar->menus->left : $tpvar->menus->right);
                            if (!empty($menu)) {
                                echo $menu->html(array(
                                    'view' => 'noviusos_template_bootstrap::'.$template.'/menu_side_driver',
                                    'id' => 'list-'.$position.'-menu',
                                    'class' => ' nav nav-pills nav-stacked  sidebar-nav-2 sidebar-menu ',
                                ));
                            } elseif ($dom_id) {
                                ?>
                                <ul id="list-<?= $position ?>-menu"></ul>
                            <?php
                            }

                        }
                        ?>
                            </div>
                        </div>
                        <?php
                    }
                    break;

                case 'social':
                    if ($value['display'] || $dom_id) {
                        ?>
                        <div id="<?= $position ?>-blocks-social"
                             class="customisable panel panel-default title_social"
                            <?= ($dom_id && !$value['display'] ? 'style="display: none;"' : '') ?>>
                            <div class="panel-heading">
                                <h3 class="panel-title">Social</h3>
                            </div>
                            <div class="panel-body" id="social">
                                <ul class="social">
                        <?php
                        foreach ($value['list'] as $key_social => $value_social) {
                            if ($value_social['link'] != '' || $dom_id) {
                                if ($key_social == 'google_plus') {
                                    $icon = 'google-plus';
                                    $name = 'Google+';
                                } else {
                                    $icon = $key_social;
                                    $name = ucfirst($key_social);
                                }
                                ?>
                                <li id="<?= $position ?>-<?= $key_social ?>"
                                    <?= $value_social['link'] == "" && $dom_id ? 'style="display: none;"' : '' ?>
                                    ><a href="<?= $value_social['link'] ?>">
                                        <button class="btn btn-<?= $icon ?>">
                                            <i class="fa fa-<?= $icon ?>"></i> <span>| <?= $name ?>
                                                <span>
                                        </button>
                                    </a>
                                </li>
                            <?php
                            }
                        }
                        ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                    break;

                case 'twitter':
                    if ($value['display'] || $dom_id) {
                        ?>
                        <div id="<?= $position ?>-blocks-twitter"
                             class="customisable title_twitter"
                            <?= $dom_id && !$value['display'] ? 'style="display: none;"' : '' ?>
                             data-twitter-account="<?= $value['account_name'] ?>">
                            <a class="twitter-timeline" href="https://twitter.com"
                               data-widget-id="448388405479501824"
                               data-screen-name="<?= $value['account_name'] ?>"
                               height="500"
                               data-tweet-limit="">Bad account name</a>
                        </div>
                        <?php
                    }
                    break;

                case 'panel':
                    if ($value['display'] || $dom_id) {
                        ?>
                        <div id="<?= $position ?>-blocks-<?= $key ?>"
                             class="customisable panel panel-default title_panel"
                            <?= $dom_id && !$value['display'] ? 'style="display: none;"' : '' ?>>
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $value['title'] ?></h3>
                            </div>
                            <div class="panel-body">
                                <?= \Nos\Tools_Wysiwyg::parse($value['content']) ?>
                            </div>
                        </div>
                        <?php
                    }

                    break;
            }
        }
    }
    ?>
    </div>
    <?php
}
