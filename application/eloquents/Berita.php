<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Berita extends Eloquent {
    protected $table = "berita";
    public $timestamps = false;
}