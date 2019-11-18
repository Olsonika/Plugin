<?php
/**
 * Plugin Name: No Bad Words
 * Description: No Bad Words Plugin is helping you avoid using swear words in you posts.
 * Author: Aleksandra Maryla Kurdelska
 */

defined( 'ABSPATH') or die ();

 add_filter ('the_content', array('filterhook_badwords_wordpress','fix_spelling'));
 add_action( 'wp_enqueue_scripts', array('filterhook_badwords_wordpress', 'includes'));

class filterhook_badwords_wordpress{
    function fix_spelling($content) 
    {
        $search  = array( 'fuck', 'fucking', 'fuck you', 'shit', 'motherfucker', 'cunt', 'bitch', 'asshole', 'dick', 'son of a bitch', 'bastard', 'twat', 'damn', 'crap' );
        $replace = array( 'fork', 'forking', 'fork you', 'shirt', 'mothertrucker', 'calm', 'bench', 'armhole', 'duck', 'son of a bench', 'backflash', 'tweet', 'darling', 'carb' );
        return str_replace( $search, $replace, $content );
    }

    function includes ()
    {
        wp_enqueue_style ("style", plugins_url() . "/alexplug/style.css");
    }
};


/*function hello_world($world_style) {
    $txt = "Hello World! ";


    shortcode_atts(
        array(
        'repeat' => 1,
        'colour' => 'red',
    ), $world_style
    );

    return "<p style='color:" . $world_style['colour'] . ";'>" . str_repeat($txt, $world_style['repeat']);
}
add_shortcode('hello', 'hello_world');
*/