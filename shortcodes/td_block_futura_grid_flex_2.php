<?php

$plugin_path = dirname(__FILE__);
require_once($plugin_path . '/../../td-composer/legacy/Newspaper/includes/shortcodes/td_block_big_grid_flex_2.php');
require_once($plugin_path . '/../modules/td_module_futura_flex_6.php');
require_once($plugin_path . '/../modules/td_module_futura_flex_7.php');


class td_block_futura_grid_flex_2 extends td_block_big_grid_flex_2 {


    function inner($posts, $td_column_number = '') {

        $buffy = '';

        if (!empty($posts)) {

            $post_count = 0;

            foreach ( $posts as $post ) {
                if ($post_count == 0) {
                    $td_module_flex = new td_module_futura_flex_6($post, $this->get_all_atts(), TRUE);
                    $buffy .= $td_module_flex->render($post_count);

                    $buffy .= '<div class="td-big-grid-flex-scroll-holder">';
                    $post_count++;
                    continue;
                }

                $td_module_flex_2 = new td_module_futura_flex_7($post, $this->get_all_atts(), TRUE);
                $buffy .= $td_module_flex_2->render($post_count);

                $post_count++;
            }

            if ($post_count < self::POST_LIMIT) {
                for ($i = $post_count; $i < self::POST_LIMIT; $i++) {
                    if ($post_count == 0) {
                        $td_module_flex = new td_module_flex_empty($post, $this->get_all_atts());
                        $buffy .= $td_module_flex->render($i, 'td_module_flex_6');

                        $buffy .= '<div class="td-big-grid-flex-scroll-holder">';
                        $post_count++;
                        continue;
                    }

                    $td_module_flex_2 = new td_module_flex_empty($post, $this->get_all_atts());
                    $buffy .= $td_module_flex_2->render($i, 'td_module_flex_7');

                    $post_count++;
                }
            }
            $buffy .= '</div>';  // close td-big-grid-scroll

        }

        return $buffy;
    }

    function get_block_classes($additional_classes_array = array() ) {
        return parent::get_block_classes($additional_classes_array) . ' td_block_big_grid_flex_2';
    }

}
