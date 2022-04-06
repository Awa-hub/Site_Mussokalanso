<?php
    /**
     * Plugin Name: Mussokalanso Form plugin
     */

     function gescabForm()
     {
         
        $content= '';
        $content .= '<h2>Contactez-nous !</h2>';
        $content .= '<form method="post" action="http://localhost/gescabinet/merci/?preview_id=203&preview_nonce=bd9e50ec79&preview=true">';

        $content .= '<label for="your_name">Nom</label>';
        $content .= '<input type="text" name="your_name" class="form-control" placeholder="votre nom" />';

        $content .= '<label for="your_emal">Email</label>';
        $content .= '<input type="email" name="your_email" class="form-control" placeholder="Entrer votre mail" />';

        $content .= '<label for="your_object">Objet</label>';
        $content .= '<input type="text" name="your_object" class="form-control" placeholder="Objet du message" />';

        $content .= '<label for="your_comments">Message</label>';
        $content .= '<textarea name="your_comments" class="form-control" placeholder="Bonjour!"></textarea>';

        $content .= '<br/><input type="submit" name="form_submit"  class="btn btn-md btn-primary" value="Envoyer" />';

        $content .= '</form>';




        return $content;

     }

    add_shortcode('form', 'gescabForm');

    function user_capture()
    {
        if(isset($_POST['form_submit']))
        {
            $name = sanitize_text_field($_POST['your_name']);
            $email = sanitize_text_field($_POST['your_email']);
            $objet = sanitize_text_field($_POST['your_object']);
            $comments = sanitize_textarea_field($_POST['your_comments']);

            $to = 'awakeita627@gmail.com';
            $to = 'text form submission';
            $message = ''.$name.' - '.$email. ' - '.$comments;

            wp_mail($to,$subject,$message);

        }

    }

    add_action('wp_head','user_capture');



?>