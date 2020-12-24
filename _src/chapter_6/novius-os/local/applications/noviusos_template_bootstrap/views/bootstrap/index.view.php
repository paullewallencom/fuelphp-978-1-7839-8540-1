<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// Loading configs (see bootstrap.php)

$config = \Config::get('noviusos_template_bootstrap::template');


// cast to array because data can not be initialise
foreach ((array)$page->template_variation->tpvar_data as $key => $value) {
    if ($key == 'principal-background_style' && $value == '') {
        $config['principal']['background_style'] = '';
    } elseif ($key == 'principal-background_fixed_display' && $value == '') {
        $config['principal']['background_fixed_display'] = '';
    } elseif ($key == '_sidebar-display') {
        switch ($value) {
            case 'left':
                $config['left']['display'] = true;
                $config['right']['display'] = false;
                break;

            case 'right':
                $config['left']['display'] = false;
                $config['right']['display'] = true;
                break;

            case 'both':
                $config['left']['display'] = true;
                $config['right']['display'] = true;
                break;

            case 'none':
                $config['left']['display'] = false;
                $config['right']['display'] = false;
                break;
        }
    } elseif ($value != '' && $value != null && strstr($key, '-display') == false) {
        if ($key == '_input_hidden_left') {
            $tab_temp = explode('||', $value);
            $tab_left_old = arr::get($config, 'left.blocks');

            foreach ($tab_temp as $key => $value) {
                if ($value != '') {
                    $temp_key = str_replace('-', '.', $value);
                    $temp_key = str_replace('.display', '', $temp_key);
                    $tab_temp_value = explode('-', $value);
                    $temp_value = $tab_temp_value[count($tab_temp_value) - 2];
                    $tab_left[$temp_value] = arr::get($config, $temp_key);
                    unset($tab_left_old[$temp_value]);
                }
            }
            \Arr::set($config, 'left.blocks', array_merge($tab_left, $tab_left_old));

        } elseif ($key == '_input_hidden_right') {
            $tab_temp = explode('||', $value);
            $tab_right_old = arr::get($config, 'right.blocks');


            foreach ($tab_temp as $key => $value) {
                if ($value != '') {
                    $temp_key = str_replace('-', '.', $value);
                    $temp_key = str_replace('.display', '', $temp_key);
                    $tab_temp_value = explode('-', $value);
                    $temp_value = $tab_temp_value[count($tab_temp_value) - 2];
                    $tab_right[$temp_value] = arr::get($config, $temp_key);
                    unset($tab_right_old[$temp_value]);
                }
            }
            \Arr::set($config, 'right.blocks', array_merge($tab_right, $tab_right_old));

        } else {
            $key = str_replace('-', '.', $key);
            arr::set($config, $key, $value);
        }
    } elseif (strstr($key, '-display') != false) {
        $key = str_replace('-', '.', $key);
        arr::set($config, $key, $value);
    } else {
        arr::set($config, $key, $value);
    }
}

if (!empty($page->template_variation->medias->background)) {
    $config['principal']['background_image'] = $page->template_variation->medias->background->url();
}
if (!empty($page->template_variation->medias->logo)) {
    $config['header']['logo_url'] = $page->template_variation->medias->logo->url();
}

if (!isset($config['wysiwyg_layout']) || $config['wysiwyg_layout'] == '') {
    $temp = '';

    for ($i = 0; $i < 12; $i++) {
        for ($j = 0; $j < 12; $j++) {
            $temp .= "1 ";
        }
        $temp = substr($temp, 0, strlen($temp) - 1);
        $temp .= "|";
    }
    $temp = substr($temp, 0, strlen($temp) - 1);
    $config['wysiwyg_layout'] = $temp;
}
?>
<!doctype html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <?php

    \Config::load('noviusos_template_bootstrap::skins', true);
    $tab_skin = \Config::get('noviusos_template_bootstrap::skins');

    $str_skin_name = $config['principal']['skin'];

    if ($dom_id) {
        foreach ($tab_skin as $key => $value) {
            if ($key == $str_skin_name) {
                ?>
                <link title="<?= $key ?>" rel="stylesheet" type="text/css"
                      href="<?= $value ?>">
            <?php
            } else {
                ?>
                <link title="<?= $key ?>" rel="alternate stylesheet" type="text/css"
                      href="<?= $value ?>">
            <?php
            }
        }
    } else {
        ?>
        <link title="<?= $tab_skin[$str_skin_name] ?>" rel="stylesheet" type="text/css"
              href="<?= $tab_skin[$str_skin_name] ?>">
    <?php
    }

    $js = 'static/apps/noviusos_template_bootstrap/js/script.js';
    if (\Config::get('novius-os.assets_minified', true)) {
        $js = 'static/apps/noviusos_template_bootstrap/js/script.min.js';
    }
    ?>
    <link rel="stylesheet"
          href="static/apps/noviusos_template_bootstrap/vendor/<?= $template ?>/css/social-buttons-3.css">

    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"
          data-local="static/apps/noviusos_template_bootstrap/vendor/css/jquery-ui.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"
          data-local="static/apps/noviusos_template_bootstrap/vendor/<?= $template ?>/css/font-awesome.css">

    <!-- Fallback Jquery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        window.jQuery ||
        document.write('<script src="static/apps/noviusos_template_bootstrap/vendor/js/jquery.min.j">\x3C/script>');
    </script>

    <!-- Fallback Jquery UI-->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
        window.jQuery.ui ||
        document.write('<script src="static/apps/noviusos_template_bootstrap/vendor/js/jquery-ui.min.j">\x3C/script>');
    </script>

    <!-- Fallback Bootstrap.js-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $.fn.modal || document.write('<script src="static/apps/noviusos_template_bootstrap/vendor/' +
            '<?= $template ?>/js/bootstrap.min.js">\x3C/script>');
    </script>

    <script src="static/apps/noviusos_template_bootstrap/vendor/<?= $template ?>/js/less-1.7.0.min.js"></script>
    <script src="<?= $js ?>"></script>

    <style>
        <?=$config['css_style'] ?>
    </style>

</head>


<body id="principal"
      class="customisable title_page"
    <?=
    $config['principal']['background_image'] != '' ?
        'style="background-image: url(\'' . $config['principal']['background_image'] . '\'); '
        . $config['principal']['background_style']
        . ($config['principal']['background_fixed_display'] ? "background-attachment : fixed ; " : "") . ' " '
        : '' ?>>

<div id="content" class="container-fluid">
    <?php
    $view = \View::forge('noviusos_template_bootstrap::bootstrap/header', array(
        'template' => $template,
        'page' => $page,
        'title' => $title,
        'wysiwyg' => $wysiwyg,
        'dom_id' => $dom_id,
        'current_context' => $page->get_context(),
    ), false);
    $view->config = $config;
    echo $view;

    $view = View::forge('noviusos_template_bootstrap::bootstrap/content', array(
        'page' => $page,
        'template' => $template,
        'title' => $title,
        'wysiwyg' => $wysiwyg,
        'dom_id' => $dom_id,
    ), false);
    $view->config = $config;
    echo $view;

    $view = View::forge('noviusos_template_bootstrap::bootstrap/footer', array(
        'page' => $page,
        'template' => $template,
        'title' => $title,
        'wysiwyg' => $wysiwyg,
        'dom_id' => $dom_id,
    ), false);
    $view->config = $config;
    echo $view;
    ?>
</div>
</body>
</html>
