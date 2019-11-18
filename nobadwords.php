<?php
/**
 * Plugin Name: No Bad Words
 * Description: No Bad Words Plugin is helping you avoid using swear words in you posts.
 * Author: Aleksandra Maryla Kurdelska
 */

defined( 'ABSPATH') or die ('Go away');

 add_filter ('the_content', array('filterhook_badwords_wordpress','fix_spelling'));
 add_action( 'wp_enqueue_scripts', array('filterhook_badwords_wordpress', 'includes'));

class filterhook_badwords_wordpress{
    function fix_spelling($content) 
    {
        $search  = array( 'ass','fuck', 'shit', 'motherfucker', 'cunt', 'bitch', 'asshole', 'dick', 'dickhead', 'son of a bitch', 'bastard', 'twat', 'damn', 'crap', 'nigga', 'whore', 'slut', 'prick',);
        $replace = array( 
            "<p class='modified'>" . 'abs' . "</p>",
            "<p class='modified'>" . 'fork' . "</p>",
            "<p class='modified'>" . 'shirt' . "</p>",
            "<p class='modified'>" . 'mothertrucker' . "</p>",
            "<p class='modified'>" . 'calm' . "</p>",
            "<p class='modified'>" . 'bench' . "</p>",
            "<p class='modified'>" . 'armhole' . "</p>",
            "<p class='modified'>" . 'duck' . "</p>", 
            "<p class='modified'>" . 'duckhead' . "</p>",
            "<p class='modified'>" . 'son of a bench' . "</p>",
            "<p class='modified'>" . 'backflash' . "</p>",
            "<p class='modified'>" . 'tweet' . "</p>",
            "<p class='modified'>" . 'darling' . "</p>",
            "<p class='modified'>" . 'carb' . "</p>",
            "<p class='modified'>" . 'nibba' . "</p>",
            "<p class='modified'>" . 'whole' . "</p>",
            "<p class='modified'>" . 'flute' . "</p>",
            "<p class='modified'>" . 'prank' . "</p>",
            
        );


        return str_replace( $search, $replace, $content );
    }

   


    function includes ()
    {
        wp_enqueue_style ("style", plugins_url() . "/alexplug/style.css");
    }
};

        //1) explode string with " ", will give you array
        //2) loop through each word in new array based on $content
        //3) --loop through each word in search
        //4) ----if we find a matching word with $search -> replace with $replace