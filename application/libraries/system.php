<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class System {
    
    private $CI;
    
    public function __construct() {
        $this->CI = & get_instance();
    }
    
}

