<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Produk extends Eloquent {
    protected $table = "produk";
    public $timestamps = false;
}