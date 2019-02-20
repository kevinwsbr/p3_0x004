<?php

class Resources
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}