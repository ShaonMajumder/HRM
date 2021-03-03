<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Division;
use App\Models\Department;
use App\Models\Position;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name','email','password','is_admin','is_super','user_type','zipcode','department_id','division_id','position_id','duty_type','hire_date','joining_date','termination_date','termination_reason','voluntary_termination','rate_type','rate','pay_frequency','pay_frequency_text','benefit_class_code','benefit_details','benefit_accural_date','benefit_status','class_code','class_status','class_details','class_accural_date','supervisor_id','is_supervisor','reference_name','reference_phone','reference_address','dob','gender','marital_status','ssn','present_address','permanent_address','nid','photo','home_phone_number','emergency_contact_person','emergency_contact','relation','employee_id','full_name','country','city','phone','soft_delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
