<?php
namespace Code\Repository;
class MailRepository
{
    public static function sendMail($email, $subject, $message, $headers)
    {
        return mail($email,$subject,$message,$headers);
    }
}

