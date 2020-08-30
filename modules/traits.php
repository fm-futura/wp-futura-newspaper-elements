<?php

trait AudioHomeEmbed {

    public $show_audiohome = FALSE;

    public function get_audio_embed() {
        if ($this->show_audiohome) {
            return futura_get_audiohome_player($this->post->ID);
        } else {
            return parent::get_audio_embed();
        }
    }

}
