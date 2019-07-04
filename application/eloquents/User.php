<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
    protected $table = "user";
    public $timestamps = false;

    public function opd(){
    	return $this->belongsTo('application\eloquents\Opd', 'id_opd');
    }

    public function kecamatan(){
    	return $this->belongsTo('application\eloquents\Kecamatan', 'id_kecamatan');
    }
}