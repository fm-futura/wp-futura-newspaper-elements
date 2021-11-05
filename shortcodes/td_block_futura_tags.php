<?php

class td_block_futura_tags extends td_block {

    function render($atts, $content = null) {
        parent::render($atts);

        $buffy = '';

        $buffy .= $this->get_block_js();
        $buffy .= '<div class="' . $this->get_block_classes() . '">';
        $buffy .= do_shortcode('[futura-tags]');
        $buffy .= '</div>';

        return $buffy;
    }

}
