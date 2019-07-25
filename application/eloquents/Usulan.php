<?php
namespace application\eloquents;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Usulan extends Eloquent {
    protected $table = "usulan";
    public $timestamps = false;

    public function opd(){
    	return $this->belongsTo('application\eloquents\Opd', 'id_opd');
    }
   
    public function trackings(){
        return $this->hasMany('application\eloquents\Tracking', 'id_usulan');
    }

    public function done(){
        return $this->hasOne('application\eloquents\Tracking', 'id_usulan')->where(['user_level' => 'opkab']);
    }

    public function verifikasiKecamatan(){
        return $this->hasOne('application\eloquents\Tracking', 'id_usulan')->where(['user_level' => 'opkec']);
    }

    public function verifikasiKabupaten(){
        return $this->hasOne('application\eloquents\Tracking', 'id_usulan')->where(['user_level' => 'opkab']);
    }

    public function verifikasiOPD(){
        return $this->hasOne('application\eloquents\Tracking', 'id_usulan')->where(['user_level' => 'opopd']);
    }

    public function rejected(){
        return $this->hasOne('application\eloquents\Tracking', 'id_usulan')->where(['aksi' => 'd']);
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