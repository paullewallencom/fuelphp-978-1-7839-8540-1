<?php

            Nos\FrontCache::checkExpires(1422123241, 600);

                if (!empty($controller)) {
                    $controller->rebuildCache(unserialize('a:8:{s:5:"_page";O:19:"Nos\\Page\\Model_Page":2:{s:8:"' . "\0" . '*' . "\0" . '_data";a:31:{s:7:"page_id";i:2;s:14:"page_parent_id";N;s:26:"page_template_variation_id";s:1:"1";s:10:"page_level";s:1:"1";s:10:"page_title";s:4:"Blog";s:12:"page_context";s:11:"main::en_GB";s:22:"page_context_common_id";s:1:"2";s:20:"page_context_is_main";s:1:"1";s:15:"page_menu_title";s:4:"Blog";s:15:"page_meta_title";N;s:9:"page_sort";s:1:"2";s:9:"page_menu";s:1:"1";s:9:"page_type";s:1:"0";s:14:"page_published";s:1:"1";s:22:"page_publication_start";N;s:20:"page_publication_end";N;s:17:"page_meta_noindex";s:1:"0";s:9:"page_lock";s:1:"0";s:13:"page_entrance";s:1:"0";s:9:"page_home";s:1:"0";s:19:"page_cache_duration";N;s:17:"page_virtual_name";s:4:"blog";s:16:"page_virtual_url";s:9:"blog.html";s:18:"page_external_link";N;s:23:"page_external_link_type";s:1:"0";s:15:"page_created_at";s:19:"2015-01-20 23:58:28";s:15:"page_updated_at";s:19:"2015-01-24 18:59:20";s:21:"page_meta_description";N;s:18:"page_meta_keywords";N;s:18:"page_created_by_id";s:1:"1";s:18:"page_updated_by_id";s:1:"1";}s:10:"' . "\0" . '*' . "\0" . '_is_new";b:0;}s:8:"_context";s:11:"main::en_GB";s:12:"_context_url";s:27:"http://localhost/novius-os/";s:9:"_page_url";s:9:"blog.html";s:4:"_url";s:13:"blog/def.html";s:7:"_status";i:200;s:8:"_headers";a:0:{}s:12:"_custom_data";a:0:{}}'));
                }
?><!doctype html>
<html>
<head>
<base href="http://localhost/novius-os/" />
<title>Blog - My first post</title>
<meta name="description" content="Summary 1">
<meta name="robots" content="index,follow">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

            <link title="static/apps/noviusos_template_bootstrap/vendor/bootstrap/css/skin/Cerulean.css" rel="stylesheet" type="text/css"
              href="static/apps/noviusos_template_bootstrap/vendor/bootstrap/css/skin/Cerulean.css">
        <link rel="stylesheet"
          href="static/apps/noviusos_template_bootstrap/vendor/bootstrap/css/social-buttons-3.css">

    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"
          data-local="static/apps/noviusos_template_bootstrap/vendor/css/jquery-ui.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"
          data-local="static/apps/noviusos_template_bootstrap/vendor/bootstrap/css/font-awesome.css">

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
            'bootstrap/js/bootstrap.min.js">\x3C/script>');
    </script>

    <script src="static/apps/noviusos_template_bootstrap/vendor/bootstrap/js/less-1.7.0.min.js"></script>
    <script src="static/apps/noviusos_template_bootstrap/js/script.js"></script>

    <style>
            </style>

<link rel="alternate" type="application/rss+xml" title="My first post: Comments list" href="http://localhost/novius-os/blog/rss/comments/def.html">
<link rel="alternate" type="application/rss+xml" title="Posts list" href="http://localhost/novius-os/blog/rss/posts.html">
<link rel="alternate" type="application/rss+xml" title="Comments list" href="http://localhost/novius-os/blog/rss/comments.html">
<link href="static/apps/noviusos_blognews/css/blognews.css" rel="stylesheet" type="text/css">
</head>


<body id="principal"
      class="customisable title_page"
    >

<div id="content" class="container-fluid">
    <div class="head_content row ">
    <nav class="navbar navbar-inverse " role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" id="sitename"
               href="http://localhost/novius-os/"
                ><span id="header-logo-small" class="image_small" style=" display : none"> <img src=""></span><span id="header-title-small" class="title_small" style="">Test website</span></a>
            <button class="navbar-toggle collapsed right" data-target=".navbar-collapse" data-toggle="collapse"
                    type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="container collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right" id="list-menu">
    <li class="lvl0"><a href="http://localhost/novius-os/blog.html">Blog</a></li><li class="lvl0"><a href="http://localhost/novius-os/monkey.html">Monkey</a></li>    </ul>
            </div>

    </nav>
    <div id="header" class="nav-logo customisable title_header">
        <a href="#" style="display: inline-block;"><span id="header-logo" class="image " style="display : none ;" > <img src=""></span><a/>

            <span class="titleonly">
                 <a class="link-title" href="#" style="display: inline-block;"><span id="header-title" style="">Test website</span><br>
                     <span id="header-baseline" style="">Chapter 6</span></a>
            </span>
        </a>
    </div>
</div>





<div  class="row  ">
         <div id="middle_content" class=" col-md-12 col-sm-9 col-xs-12" >

        <div class=" col-md-12 col-sm-12 col-xs-12">
            <div class="">

                <div id="jumbotron" class="jumbotron customisable"
                     style="display: none">
                    <div class="container">
                        <h1>zaeazeaz</h1>
                        <span><p>eazeazeaze</p></span>
                        <a href="#"
                           class="btn btn-primary btn-lg">Learn more</a>
                    </div>
                </div>
            </div>

        </div>
        <div id="block-grid" class=" customisable col-md-12 col-sm-12 col-xs-12 main_wysiwyg"><h1 id="pagename">My first post</h1>
            <div id="grid_content_layout">
            <style>
    .div_layout {
        margin-bottom: 10px;
        text-align: justify;
    }

    .layout {
        padding: 0;
    }
</style>

<div class='div_layout col-md-12' style='' data-val=1><div class="noviusos_blog noviusos_enhancer blognews_post blognews_post_show">
    <img src="http://localhost/novius-os/blog/stats/2.html" title="" alt="" width="0" height="0" />


        <h1 class="blognews_title">My first post</h1>        <div class="blognews_author">
    <a href="http://localhost/novius-os/blog/author/Admin_Admin_1.html">Author: Admin Admin</a>    </div>
            <div class="blognews_date">
    00:13, 21 January 2015    </div>
    
        <div class="blognews_summary">
        <p>Summary 1</p>
    </div>
        <div class="blognews_content">
    <p>Content of my first post</p></div>

        <div class="blognews_tags">
        </div>
            <div class="blognews_categories">
        </div>
        <div class="blognews_comments" id="comments">
            <div class="blognews_nb_comments">
    No comments    </div>
        <ul class="comments_list">
</ul>
<div class="comment_form" id="comment_form">
    <form class="comment_form" name="TheFormComment" id="TheFormComment" method="post">
        <input type="hidden" name="model" value="Nos\BlogNews\Blog\Model_Post" />
        <input type="hidden" name="id" value="2" />
        <input type="hidden" name="action" value="addComment" />
        <input class="input_mm" type="hidden" id="mm_54c3de9170584" name="ismm" value="548">
        <div class="comment_form_title">Leave a comment</div>
        <?php
echo View::forge('noviusos_comments::front/add_comment_message', unserialize('N;'), NULL);?>        <table border="0">
            <tbody>
            <tr>
                <td align="right"><label for="comm_author">Name:</label></td>
                <td><input type="text" style="width:300px;" maxlength="100" id="comm_author" name="comm_author" value="<?php
echo View::forge('noviusos_comments::front/author', unserialize('N;'), NULL);?>"></td>
            </tr>
            <tr>
                <td align="right" valign="top"><label for="comm_email">Email address (never sold, shared nor spammed):</label></td>
                <td>
                    <input type="text" style="width:300px;" maxlength="100" id="comm_email" name="comm_email" value="<?php
echo View::forge('noviusos_comments::front/email', unserialize('N;'), NULL);?>">
                    <div>
                        <input type="checkbox" name="subscribe_to_comments" id="subscribe_to_comments" value="1" checked/>
                        <label for="subscribe_to_comments">Receive new comments by email</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><label for="comm_content">Your comment:</label></td>
            </tr>
            <tr>
                <td colspan="2"><textarea style="width:100%;height:200px;" id="comm_content" name="comm_content"><?php
echo View::forge('noviusos_comments::front/content', unserialize('N;'), NULL);?></textarea></td>
            </tr>
            </tbody>
        </table>
        <script type="text/javascript">
            var RecaptchaOptions = {
                theme:'clean'
            };
        </script>
        <div class="comment_submit"><input type="submit" value="Send"></div>
    </form>
</div>
<script type="text/javascript">
(function() {
    if (document.addEventListener) {
        document.addEventListener('mousemove', function() {
            document.getElementById('mm_54c3de9170584').value = "327";
            document.removeEventListener('mousemove', arguments.callee, false);
        }, false);
    } else {
        // Old IE
        document.attachEvent('onmousemove', function() {
            document.getElementById('mm_54c3de9170584').value = "327";
            document.detachEvent('onmousemove', arguments.callee);
        });
    }
})();
</script>
    </div>
    </div>
</div>            </div>
        </div>
        <br>
     </div>
    </div>
<div id="footer" class="row footer customisable ">
    <div class="footer_menu">
<ul class="nav nav-pills nav-justified" style="text-align: left">    </div>

    <div class="footer_text"><p>This a an example of what you can achieve using Novius OS.</p>
<p>FuelPHP Application Development Blueprints.</p>    </div>
</div>
</div>
</body>
</html>
