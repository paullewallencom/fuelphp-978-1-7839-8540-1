<?php
    // Load dictionnary if we want to use __()
    // Nos\I18n::current_dictionary('my_first_application::common');
?>
<div class="my_first_application_monkey noviusos_enhancer">
<h2><?=$monkey->monk_name ?></h2>


<?= $monkey->wysiwygs->description ?>
<?= \Nos\Nos::main_controller()->getPage()->htmlAnchor(array('text' => __('Back'))); ?></div>