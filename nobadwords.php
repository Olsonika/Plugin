<?php
/**
 * Plugin Name: No Bad Words
 * Description: No Bad Words Plugin is helping you avoid using swear words in you posts.
 * Author: Aleksandra Maryla Kurdelska
 * Version: 0.5
 */

defined( 'ABSPATH') or die ('Go away!');

 add_filter ('the_content', array('filterhook_badwords_wordpress','fix_spelling'));
 add_action( 'wp_enqueue_scripts', array('filterhook_badwords_wordpress', 'includes'));

class filterhook_badwords_wordpress{
    function fix_spelling($content) 
    {
        $search  = array( 'ass','fuck', 'shit', 'motherfucker', 'cunt', 'bitch', 'asshole', 'dick', 'dickhead', 'son of a bitch', 'bastard', 'twat', 'damn', 'crap', 'nigga', 'whore', 'slut', 'prick',);
        $replace = array( 
            "<a class='modified'>" . 'abs' . "</a>",
            "<a class='modified'>" . 'fork' . "</a>",
            "<a class='modified'>" . 'shirt' . "</a>",
            "<a class='modified'>" . 'mothertrucker' . "</a>",
            "<a class='modified'>" . 'calm' . "</a>",
            "<a class='modified'>" . 'bench' . "</a>",
            "<a class='modified'>" . 'armhole' . "</a>",
            "<a class='modified'>" . 'duck' . "</a>", 
            "<a class='modified'>" . 'duckhead' . "</a>",
            "<a class='modified'>" . 'son of a bench' . "</a>",
            "<a class='modified'>" . 'pumpkin' . "</a>",
            "<a class='modified'>" . 'tweet' . "</a>",
            "<a class='modified'>" . 'darling' . "</a>",
            "<a class='modified'>" . 'carb' . "</a>",
            "<a class='modified'>" . 'nibba' . "</a>",
            "<a class='modified'>" . 'whole' . "</a>",
            "<a class='modified'>" . 'flute' . "</a>",
            "<a class='modified'>" . 'prank' . "</a>",
            
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