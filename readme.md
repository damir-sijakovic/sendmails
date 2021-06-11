# Send mail functions

Two functions to send mail with html message and attachment.


## sendHtmlMail($to, $from, $subject, $html, &$msg=null)

Arguments:  

* to - destination email address
* from - sender email address
* subject - email subject
* html - message in html format (can be plain text)
* msg - optional arg that pass error message

Return:

Boolean, error messages are passed through msg reference argument.



## sendAttachment($to, $from, $subject, $html, $filename, $filepath, &$emsg=null)

* to - destination email address
* from - sender email address
* subject - email subject
* html - message in html format (can be plain text)
* msg - optional arg that pass error message
* filename - file name of attachment in email
* filepath - path to file you want to send
* emsg - optional arg that pass error message

Return:

Boolean, error messages are passed through emsg reference argument.


Example:

            $msg = '';
            $html = '<html><body><h1 style="color:red;">Hello</h1><br><p style="color:green;">This is paragraph.</p></body></html>';
            $sendOk = sendAttachment('destination@fake.fake', 'from@fake.fake', 'hello subject', $html, 'somefile2.pdf', __DIR__ . '/somefile2.pdf', $msg);
            if (!sendOk)
            {
                die($msg);
            }


### Have Fun
`Developed and tested under 5.4.118-1-manjaro/xfce/docker/portainer`
