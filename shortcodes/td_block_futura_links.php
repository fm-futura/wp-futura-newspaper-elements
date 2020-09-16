<?php

class td_block_futura_links extends td_block {

    function render($atts, $content = null) {
        parent::render($atts);

        $buffy = '';

        $buffy .= $this->get_block_js();
        $buffy .= '<div class="' . $this->get_block_classes() . '">';
        $buffy .= do_shortcode('[futura-links]');
        $buffy .= '</div>';

        return $buffy;
    }

}
