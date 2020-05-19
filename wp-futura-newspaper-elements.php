<?php
/*
Plugin Name:        FM Futura Newspaper Elements
Plugin URI:         https://github.com/fm-futura/wp-futura-newspaper-elements
GitHub Plugin URI:  https://github.com/fm-futura/wp-futura-newspaper-elements
Description:        modules/blocks to wrap to wrap our custom widgets and shortcodes inside TagDiv composer
Version:            20200514
Author:             FM Futura
Author URI:         https://fmfutura.com.ar
*/
class td_futura_api_plugin {
    var $plugin_url = '';
    var $plugin_path = '';

    function __construct() {
        $this->plugin_url = plugins_url('', __FILE__);
        $this->plugin_path = dirname(__FILE__);

        add_action('td_global_after', array($this, 'hook_td_global_after'));
        add_action('admin_enqueue_scripts', array($this, 'td_plugin_wpadmin_css'));
        add_action('wp_enqueue_scripts', array($this, 'td_plugin_frontend_css'));
    }

    static function td_plugin_wpadmin_css() {
        //wp_enqueue_style('td-plugin-framework', plugins_url('', __FILE__) . '/wp-admin/style.css');
    }

    static function td_plugin_frontend_css() {
        wp_enqueue_style('td-plugin-framework', plugins_url('', __FILE__) . '/css/style.css');
    }

    function hook_td_global_after()    {

        td_api_block::add('td_block_player_futura',
            array(
                'map_in_visual_composer' => true,
                'map_in_td_composer' => true,
                "name" => 'Player Futura',
                "base" => 'td_block_player_futura',
                "class" => 'td_block_player_futura',
                "controls" => "full",
                "category" => 'Blocks',
                'tdc_category' => 'Blocks',
                'icon' => 'icon-pagebuilder-td_block_futura',
                'file' => $this->plugin_path . '/shortcodes/td_block_player_futura.php',
                "params" => array_merge(
                    td_config::get_map_block_general_array(),
                    td_config::get_map_filter_array(),
                    td_config::get_map_block_ajax_filter_array(),
                    td_config::get_map_block_pagination_array()
                )
            )
        );

        td_api_block::add('td_block_futura_social_icons',
            array(
                'map_in_visual_composer' => true,
                'map_in_td_composer' => true,
                "name" => 'Redes Sociales Futura',
                "base" => 'td_block_futura_social_icons',
                "class" => 'td_block_futura_social_icons',
                "controls" => "full",
                "category" => 'Blocks',
                'tdc_category' => 'Blocks',
                'icon' => 'icon-pagebuilder-td_block_futura_social_icons',
                'file' => $this->plugin_path . '/shortcodes/td_block_futura_social_icons.php',
                "params" => array_merge(
                    td_config::get_map_block_general_array(),
                    td_config::get_map_filter_array(),
                    td_config::get_map_block_ajax_filter_array(),
                    td_config::get_map_block_pagination_array()
                )
            )
        );

    }

}

new td_futura_api_plugin();
