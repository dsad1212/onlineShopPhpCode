<?php
class mail{
    public $message;
    public $to;
    public $subject;
    public $mailto;
    PUBLIC $name;
    public function setMessage($mailTo,$txt,$subject)
    {
        $this->message=$txt;
        $this->to = $mailTo;
        $this->subject = $subject;

    }
    public function geTo()
    {
        return $this->to;
    }
    public function sendEmail()
    {


        $headers = "From: jewish@jewish-store.com" . "\r\n" .
            "CC: jewish@jewish-store.com";

        mail($this->to,$this->message,$this->subject,$headers);



    }

}

?>