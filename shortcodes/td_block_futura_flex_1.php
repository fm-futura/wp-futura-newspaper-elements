<?php

$plugin_path = dirname(__FILE__);
require_once($plugin_path . '/../../td-composer/legacy/Newspaper/includes/shortcodes/td_flex_block_1.php');
require_once($plugin_path . '/../modules/td_module_futura_flex_1.php');


class td_block_futura_flex_1 extends td_flex_block_1 {

    function inner($posts) {

        $buffy = '';

        $MODULES_PER_ROW = 4;
        $ROW_START = '<div class="td_block_futura_flex_1-row">' . "\n";
        $ROW_END   = "\n" . '</div> <!-- td_block_futura_flex_1-row -->';

        $td_block_layout = new td_block_layout();

            if (!empty($posts)) {
                $buffy .= $ROW_START;

                $row_open = false;
                $idx = 0;

                foreach ($posts as $post) {
                    if ($idx && ($idx % $MODULES_PER_ROW == 0)) {
                        $buffy .= $ROW_END;
                        $buffy .= $ROW_START;
                    }

                    $td_module_flex_1 = new td_module_futura_flex_1($post, $this->get_all_atts(), TRUE);
                    $buffy .= $td_module_flex_1->render($post);

                    $idx += 1;
                }
                $buffy .= $ROW_END;
            }
            $buffy .= $td_block_layout->close_all_tags();

        return $buffy;
    }

}
