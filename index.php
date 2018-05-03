<?php
/*
Plugin Name: Formularze zamówienia
Description: Formularze zamówienia
Author: <a href="mailto:volmargreiso@gmail.com">Volmarg Reiso</a>
Version: 1.0
*/

include_once 'hooks.php';

#Plugin hook to admin Panel
if(is_admin()){ #checks if thats admin panel

  function load_plugin_backend(){
    include_once 'backend/index.php';
  }


}#include styles and sripts if it's front end
else{
  #external downloaded
  wp_enqueue_script('bootstrap.min', plugin_dir_url(__FILE__) . 'frontend/libs/bootstrap.min.js','');
  wp_enqueue_script('jquery-2.2.4', plugin_dir_url(__FILE__) . 'frontend/libs/jquery-2.2.4.js','','',true);
  wp_enqueue_script('jquery-ui', plugin_dir_url(__FILE__) . 'frontend/libs/jquery-ui.js','','',true);
  wp_enqueue_script('select2', plugin_dir_url(__FILE__) . 'frontend/libs/select2.min.js','','',true);


  #internal
  if(strstr($_SERVER["REQUEST_URI"],'komponent')){
    wp_enqueue_script('selectize', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/pluginsActivators.js','','',true);
  }
  wp_enqueue_script('selectize', plugin_dir_url(__FILE__) . 'frontend/libs/selectize-js/selectize.js','','',true);
  wp_enqueue_script('tkaniny', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/tkaniny.js','','',true);
  wp_enqueue_script('wyroby', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/wyroby.js','','',true);
  wp_enqueue_script('komponenty', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/components.js','','',true);
  wp_enqueue_script('wyroby', plugin_dir_url(__FILE__) . 'frontend/js/car-types-tabs.js','','',true);

  wp_enqueue_script('uiJS', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/ui.js','','',true);
  wp_enqueue_script('initializer', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/initializators.js','','',true);

function load_css() {
  wp_enqueue_style( 'bootstrap', plugin_dir_url(__FILE__) . 'frontend/libs/bootstrap.min.css', '', '', 'all' );
  wp_enqueue_style( 'select2css', plugin_dir_url(__FILE__) . 'frontend/libs/select2.min.css', '', '', 'all' );
  wp_enqueue_style( 'font-awesome', plugin_dir_url(__FILE__) . 'frontend/libs/font-awesome.min.css', '', '', 'all' );
  wp_enqueue_style( 'jqueryUiCss', plugin_dir_url(__FILE__) . 'frontend/libs/jquery-ui.css', '', '', 'all' );
  wp_enqueue_style( 'formsTable', plugin_dir_url(__FILE__) . 'frontend/css_/form-tables.css', '', '', 'all' );
  wp_enqueue_style( 'generalStyles', plugin_dir_url(__FILE__) . 'frontend/css_/style.css', '', '', 'all' );
  wp_enqueue_style( 'selectize', plugin_dir_url(__FILE__) . 'frontend/libs/selectize-js/selectize.css', '', '', 'all');
  }

  add_action( 'wp_print_styles', 'load_css', 99 );

  #external downloaded
  wp_enqueue_script('initializer', plugin_dir_url(__FILE__) . 'frontend/scripts/js_/select2.min.js','','',true);
}


#hooks
add_action('admin_menu', 'hook_plugin_in_panel'); #add admin menu option
add_action( 'wp', 'orderPageConstruct' ); #add handling virutal - tkaniny

function orderPageConstruct(){
  $hook=new hooks();
  $hook->orderPage(true);
}


function hook_plugin_in_panel(){ #hook options in admin panel
        add_menu_page( 'Formularze zamówień', 'Formularze zamówień', 'manage_options', 'Formularze zamówień', 'load_plugin_backend' ); #settings for menu acces
}


?>
