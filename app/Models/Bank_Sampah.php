<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property integer $id
 * @property integer $kelurahan_id
 * @property string $nm_banksampah
 * @property string $almt_banksampah
 * @property float $telp
 * @property string $tgl_berdiri
 * @property string $jenis_sampah
 * @property string $nm_penggurus
 * @property float $jml_karyawan
 * @property int $jml_nasabah
 * @property float $jml_simpanan
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Kelurahan $kelurahan
 */
class Bank_Sampah extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes, Notifiable;


    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank_sampah';

    
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['kelurahan_id', 'nm_banksampah', 'almt_banksampah', 'telp', 'tgl_berdiri', 'jenis_sampah', 'nm_penggurus', 'jml_karyawan', 'jml_nasabah', 'jml_simpanan', 'email', 'username', 'password',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
