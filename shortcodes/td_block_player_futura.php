<?php

class td_block_player_futura extends td_block {

    function render($atts, $content = null) {
        parent::render($atts);

        $buffy = '';

        $buffy .= $this->get_block_js();
        $buffy .= '<div class="' . $this->get_block_classes() . '">';
        $buffy .= do_shortcode('[player-futura]');
        $buffy .= '</div>';

        return $buffy;
    }

    function inner($posts, $td_column_number = '') {
        return '';
    }

}
