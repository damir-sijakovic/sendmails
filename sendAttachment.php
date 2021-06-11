<?php


function sendAttachment($to, $from, $subject, $html, $filename, $filepath, &$emsg=null)
{
    if (!file_exists($filepath))
    { 
        $emsg = 'File not found!';
        return false;
    }
        
    $content = file_get_contents($filepath);
    $content = chunk_split(base64_encode($content));

    $separator = md5(time());
    $eol = "\r\n";

    $headers = "From: name <". $from .">" . $eol;
    $headers .= "Reply-To: $from" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    $body = "--" . $separator . $eol;
    $body .= "Content-type: text/html; charset=UTF-8" . $eol;
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= $html . $eol;

    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    $mailOk = mail($to, $subject, $body, $headers);
    if (!$mailOk)
    {
        $emsg = error_get_last()['message'];
        return false;
    }
    
    return true;       
    
}

