<?php

namespace App\Lib;

class MsgContent
{
    public $email,$name,$phone,$content;

    public function __construct( $email,$name,$phone,$content)
    {
        $this->email=$email;
        $this->name=$name;
        $this->phone=$phone;
        $this->content=$content;

    }


}
