<?php

namespace App;

use App\Jobs\sendSMSVerificationJob;
use App\Jobs\SendWelcomSmsJob;
use Illuminate\Notifications\Notifiable;
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
        'name', 'phone','age','gender'
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

    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites','user_id','story_id');
    }

    public function downloads()
    {
        return $this->belongsToMany(User::class,'downloads','user_id','story_id');
    }

    public function storyHistories()
    {
        return $this->belongsToMany(User::class,'story_history','user_id','story_id');
    }

    public function sendSMS($UUID = null)
    {
        $random_number = random_int(10000, 99999);

        $device =  $this->devices()->where('uu_id', $UUID)->first();
        if (! empty($device)) {

            $device->update(['code' => $random_number]);

        } else {

            ($this->devices())->create(['uu_id' => $UUID , 'code' =>$random_number ]);
        }

        sendSMSVerificationJob::dispatch($random_number,$this->phone);

}

    public function sendSMSUpdate($UUID ,$phone)
    {
        $random_number = random_int(10000, 99999);

        $device =  $this->devices()->where('uu_id', $UUID)->first();

        if (! empty($device)) {

            $device->update(['code' => $random_number]);

        } else {

            ($this->devices())->create(['uu_id' => $UUID , 'code' =>$random_number ]);
        }

        sendSMSVerificationJob::dispatch($random_number,$phone);

    }
}
