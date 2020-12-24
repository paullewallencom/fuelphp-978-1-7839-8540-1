<?php
echo "<div class=\"my_first_application_monkey noviusos_enhancer\">\n";
if (count($monkey_list) > 0) {
    echo "<ul>\n";
    foreach ($monkey_list as $monkey) {
        echo '<li>' . $monkey->htmlAnchor() . "</li>\n";
    }
    echo "</ul>\n";
}
echo "</div>\n";
