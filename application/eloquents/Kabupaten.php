<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Kabupaten extends Eloquent {
    protected $table = "kabupaten";
    public $timestamps = false;
}