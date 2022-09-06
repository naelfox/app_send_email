<?php
class Message
{
    private $to = null;
    private $subject = null;
    private $message = null;


    public function getAtribute($atribute)
    {
        return $this->$atribute;
    }

    public function setAtribute($atribute, $value)
    {
        $this->$atribute = $value;
    }

    public function validateMessage()
    {
        if (empty($this->to) || empty($this->subject || empty($this->message))) {
            return false;
        }

        return true;
    }
}
