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
        //DB con
        $conn = mysqli_connect('localhost', 'root', '2001', 'nobadwords');
    
        // Check conn
        if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
        }

        // Select the data + send query
        $sql = 'SELECT badword, goodword FROM words';
        $result = mysqli_query($conn, $sql);
       

        // Go thru the database
        while ( $row = $result->fetch_assoc())
        {
            $search[]  = $row['badword'];
            $replace[] = $row['goodword'];
        }
      
        //Return
        return str_replace( $search, $replace, $content);
            

    }
}
    /**function includes ()
    {
        wp_enqueue_style ("style", plugins_url() . "/alexplug/style.css");
    }
}
}

    /**array( 'ass','fuck', 'shit', 'motherfucker', 'cunt', 'bitch', 'asshole', 'dick', 'dickhead', 'son of a bitch', 'bastard', 'twat', 'damn', 'crap', 'nigga', 'whore', 'slut', 'prick',); **/
        
        /**array( 
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
            
        ); **/