<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Usulan extends Eloquent {
    protected $table = "usulan";
    public $timestamps = false;

    public function opd(){
    	return $this->belongsTo('application\eloquents\Opd', 'id_opd');
    }

    public function kecamatan(){
    	return $this->belongsTo('application\eloquents\Kecamatan', 'id_kecamatan');
    }

    public function userKecamatan(){
    	return $this->belongsTo('application\eloquents\Kecamatan', 'id_user_kecamatan');
    }

    public function userOpd(){
    	return $this->belongsTo('application\eloquents\Opd', 'id_user_opd');
    }

    public function userKabupaten(){
    	return $this->belongsTo('application\eloquents\Kabupaten', 'id_user_kabupaten');
    }
}