<?php

function sendHtmlMail($to, $from, $subject, $html, &$msg=null)
{
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
    
    $mailOk = mail($to, $subject, $html, $headers);    
    if (!$mailOk)
    {
        $msg = error_get_last()['message'];
        return false;
    }
    
    return true;
}
