<?php

$plugin_path = dirname(__FILE__);
require_once($plugin_path . '/../../td-composer/legacy/Newspaper/includes/modules/td_module_flex_1.php');

require_once('traits.php');


class td_module_futura_flex_1 extends td_module_flex_1 {

    use AudioHomeEmbed;

    function __construct($post, $module_atts = array(), $show_audiohome=FALSE) {
        parent::__construct($post, $module_atts);
        $this->show_audiohome = $show_audiohome;
    }

}
