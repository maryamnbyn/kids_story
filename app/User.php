<?php

namespace App;

use App\Events\SMSCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
//    use Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function devices()
    {
        return $this->belongsToMany(Device::class );
    }

    public function sendSMS($UUID = null, $digit = null)
    {
        if (is_null($digit)) $digit = config('verify.digit');

        $random_number = rand(pow(10, $digit - 1), pow(10, $digit) - 1);

        $device =  $this->devices()->where('uu_id', $UUID)->first();

        if (! empty($device)) {

            $device->update(['code' => $random_number]);

        } else {

            ($this->devices())->create(['uu_id' => $UUID , 'code' =>$random_number ]);
        }

        event(new SMSCreated($random_number , $this->phone));
    }
}
