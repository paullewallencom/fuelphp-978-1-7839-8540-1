<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 21/03/14
 * Time: 16:52
 */

define('NOS_ENTRY_POINT', 'front');
// Boot the app

set_time_limit(1000000);

$theme = "bootstrap";

if($theme == "bootstrap")
{

    include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_template_bootstrap/vendor/lessphp/Less.php";

    $less = new Less_Parser();

    $variable = array(
    );

    $str_param = "";

    foreach( $variable as $key => $value)
    {
        $str_param .= "$".$key." : ".$value.";\n" ;
    }

    $str_param .= "@import 'Style.less'; \n";

    //------------------------------
    // Compilation des autres styles
    //------------------------------

    $tab_skin = array_diff(scandir("static/vendor/".$theme."/less/skin"), array('..', '.' ));

    foreach($tab_skin as $key => $value)
    {

        $less = new Less_Parser();

        $less->SetImportDirs(array("static/vendor/".$theme."/less" => "static/vendor/".$theme."/less",
            "static/vendor/".$theme."/less/bootstrap" => "static/vendor/".$theme."/less/bootstrap"));

        $str_param_setting = "";
        $str =explode(".less",$value);

        $file = file_get_contents("static/vendor/".$theme."/less/bootstrap/bootstrap.less");

        $str_param_setting .= "@import url('bootstrap/variables.less'); \n";
        $str_param_setting .= "@import 'bootstrap/mixins.less'; \n";
        $str_param_setting .= "@import 'skin/$str[0].less'; \n";
        $compiled = "";
        $less->parse($str_param_setting.$file.$str_param."@import 'skin/custom/$str[0]_custom.less'; \n");

        try{
            echo $compiled = $less->getCss();
        }catch(Exception $e){
            echo $error_message = $e->getMessage();
        }

        file_put_contents("static/vendor/".$theme."/css/skin/$str[0].css" ,$compiled );
    }
}