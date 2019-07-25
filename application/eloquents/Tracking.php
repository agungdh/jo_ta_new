<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Tracking extends Eloquent {
    protected $table = "tracking";
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('application\eloquents\User', 'id_user');
    }

}