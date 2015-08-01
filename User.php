<?php

class User {

    public $fb_id;
    public $last_act;
    public $points;
    public $coins;
    public $max_dogs;

    function __construct($arr) {
        $this->fb_id = $arr['fb_id'];
        $this->last_act = $arr['last_act'];
        $this->points = $arr['points'];
        $this->coins = $arr['coins'];
        $this->max_dogs = $arr['max_dogs'];
    }
    
    function toJSON() {
        return json_encode(get_object_vars($this));
    }
    
}