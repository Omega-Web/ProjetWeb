<?php
namespace Code\Service;

use Code\Repository\MailRepository;

class MailService
{
    public static function mailConfirm($firstname, $email)
    {
        $headers = 'From : contact@videomega.fr';
        $subject = "Confirmation d'inscription";
        $message = "Bonjour ".$firstname.",\n\nBienvenue sur Videomega ! \n\n Toute l'équipe te souhaite la bienvenue sur ta vidéothèque préférée.\n 
        Tu as la possibilité de découvrir une multitude de films, de les ajouter à ta liste personnelle et de valider ce que tu as déjà vu.\n\n\n
                        L'équipe Videomega"; 
        MailRepository::sendMail($email,$subject,$message,$headers);        
        }
}


