<?php

$plugin_path = dirname(__FILE__);
require_once($plugin_path . '/../../td-composer/legacy/Newspaper/includes/shortcodes/td_flex_block_1.php');
require_once($plugin_path . '/../modules/td_module_futura_flex_1.php');


class td_block_futura_flex_1 extends td_flex_block_1 {

    function inner($posts) {

        $buffy = '';
        $td_block_layout = new td_block_layout();

            if (!empty($posts)) {
                foreach ($posts as $post) {

                    $td_module_flex_1 = new td_module_futura_flex_1($post, $this->get_all_atts(), TRUE);
                    $buffy .= $td_module_flex_1->render($post);
                }
            }
            $buffy .= $td_block_layout->close_all_tags();

        return $buffy;
    }

}
