<?php

namespace App\General;

trait General
{
    public $data = [];

    public function data($key, $value = null)
    {
        if (!isset($key)) throw new \Exception("key not set");
        return $this->data[$key] = $value;

    }


}
