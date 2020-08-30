<?php

$plugin_path = dirname(__FILE__);
require_once($plugin_path . '/../../td-composer/legacy/Newspaper/includes/modules/td_module_flex_6.php');

require_once('traits.php');


class td_module_futura_flex_6 extends td_module_flex_6 {

    use AudioHomeEmbed;

    function __construct($post, $module_atts = array(), $show_audiohome=FALSE) {
        parent::__construct($post, $module_atts);
        $this->show_audiohome = $show_audiohome;
    }

    function render($order_no) {
        ob_start();

        $image_size = $this->get_shortcode_att('image_size');
        $category_position = $this->get_shortcode_att('modules_category');
        $title_length = $this->get_shortcode_att('mf6_tl');
        $modified_date = $this->get_shortcode_att('show_modified_date');

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }

        ?>

        <div class="<?php echo $this->get_module_classes(array("td-big-grid-flex-post", "td-big-grid-flex-post-$order_no"));?>">
            <div class="td-module-container td-category-pos-<?php echo $category_position; ?>">
                <div class="td-image-container">
                    <?php if ($category_position == 'image') { echo $this->get_category(); }?>
                    <?php echo $this->get_image($image_size, true);?>
                </div>

                <div class="td-module-meta-info">
                    <?php if ($category_position == 'above') { echo $this->get_category(); }?>

                    <div class="tdb-module-title-wrap">
                        <?php echo $this->get_title($title_length);?>
                    </div>

                    <?php if ($category_position == '') { echo $this->get_category(); }?>

                    <?php echo $this->get_audio_embed(); ?>

                    <div class="td-editor-date">
                        <?php echo $this->get_author(true);?>
                        <?php echo $this->get_date($modified_date, true);?>
                        <?php echo $this->get_review();?>
                    </div>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }

}
