<!DOCTYPE html>
<html>
<head>
<?php
echo '<base '.array_to_attr(array('href' => Uri::base())).' />';
?>
    <meta charset="utf-8">
    <title>My microblog</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('website.css'); ?>
    <style>
        body { margin: 50px; }
    </style>
    <?php echo Asset::js(array(
        'http://code.jquery.com/jquery-1.11.2.min.js',
        'bootstrap.js',
        'mustache/mustache.js',
        'view.js',
        'templates.js',
        'post_form.js',
        'posts_dates.js',
        'posts_list.js',
    )); ?>
    <script>
        $(function(){ $('.topbar').dropdown(); });
<?php
// Converts the mymicroblog configuration to json.
$json_configuration = Format::forge(
    \Config::load('mymicroblog', true)
)->to_json();

echo '        ';
echo 'var MMBConfiguration = '.$json_configuration.";\n";
?>
    </script>
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            
            
            <div class="navbar-header">
                <!-- Allows the navbar to collapse when
                     the screen width is too small -->
                <button
                        type="button"
                        class="navbar-toggle"
                        data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" <?php echo array_to_attr(array('href' => Uri::base())) ?>>
                    My microblog
                </a>
            </div>
            <div class="navbar-collapse collapse">
            <?php if (Auth::check()): ?>
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="#"
                           data-toggle="modal"
                           data-target="#create_post_modal">
                            <!-- Displays the pencil icon.
                                 http://glyphicons.com/ -->
                            <span class="glyphicon glyphicon-pencil"></span>
                            New post
                        </a>
                    </li>

                    <li class="dropdown">
                        <a
                           data-toggle="dropdown"
                           class="dropdown-toggle"
                           href="#">
                            <?php echo e(Auth::get_screen_name()) ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
            <?php
            echo Html::anchor('user/signout', 'Sign out');
            ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php endif; ?>
            </div>

            
            
            
            
        </div>
    </div>

    <div class="container">
        <div class="row">
			<div class="col-md-12">
<?php if (Session::get_flash('success')): ?>
				<div class="alert
                            alert-success
                            alert-dismissable">
					<button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-hidden="true">
                        &times;
                    </button>
					<p>
<?php
echo implode(
    '</p><p>',
    (array) Session::get_flash('success')
); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert
                            alert-danger
                            alert-dismissable">
					<button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-hidden="true">
                        &times;
                    </button>
					<p>
<?php
echo implode(
    '</p><p>',
    (array) Session::get_flash('error')
); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
<?php echo $content; ?>
        </div>
    </div>
    
    
    <!-- Post modal window -->
    <div
         class="modal fade"
         id="create_post_modal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button
                            type="button"
                            class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Compose new Post
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- Will be displayed conditionally -->
                    <div id="post_success" class="alert
                                alert-success">
                        Your post has been successfully
                        published!
                    </div>
                    <!-- Will be displayed conditionally -->
                    <div id="post_fail" class="alert
                                alert-danger"></div>

                    <textarea
                              id="post_content"
                              rows="4"
                              class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <span id="post_remaining_characters"></span>
                    <button
                            type="button"
                            class="btn btn-primary"
                            id="post_submit_button">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
