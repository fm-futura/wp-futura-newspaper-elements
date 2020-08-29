<?php

$plugin_path = dirname(__FILE__);
require_once($plugin_path . '/../../td-composer/legacy/Newspaper/includes/modules/td_module_flex_1.php');


class td_module_futura_flex_1 extends td_module_flex_1 {
    public $show_audiohome = FALSE;

    function __construct($post, $module_atts = array(), $show_audiohome=FALSE) {
        parent::__construct($post, $module_atts);
        $this->show_audiohome = $show_audiohome;
    }

    public function get_audio_embed() {
        if ($this->show_audiohome) {
            return futura_get_audiohome_player($this->post->ID);
        } else {
            return parent::get_audio_embed();
        }
    }


}
