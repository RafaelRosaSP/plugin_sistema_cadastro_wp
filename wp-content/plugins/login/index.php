<?php
/*
Plugin Name: Login e Cadastro
Description: Plugin de login e cadastro de usuarios
Version: 1.0.0
Author: Rafael Rosa
Description: Um Plugin de Cadsatro de Usuarios e Login
*/

if(!function_exists('add_action')){
    echo "O plugin não pode ser acessado diretamente";
    exit;
}

// Ativação de plugin
function dl_ativacao_plugin(){
    if(version_compare(get_bloginfo('version'), '4.8', '<')){
        wp_die("Você precisa atualizar o wordpress para atualizar o plugin");
    }
}

register_activation_hook(__FILE__, 'dl_ativacao_plugin');

// Carregar css e js
function carregar_js_css(){
   wp_enqueue_style('css', plugins_url('/style.css', __FILE__));
   wp_enqueue_script('js', plugins_url('/script.js', __FILE__), array('jquery'), '1.0', true);

}

add_action('wp_enqueue_scripts', 'carregar_js_css');

// criação shortcode de login
function dl_auth_form_shortcode(){
    $formHTL = file_get_contents(plugins_url('login/templatelogin.php'));
    
        echo   $formHTL;
}

add_shortcode('login_auth_form', 'dl_auth_form_shortcode');








