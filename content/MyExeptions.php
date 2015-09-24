<?php


class E404Exception extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

}

class E403Exception extends Exception
{

}