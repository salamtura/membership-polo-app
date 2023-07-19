<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;

class Membership extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'surname',
        'first_name',
        'middle_name',
        'address',
        'gender',
        'mobile',
        'alt_mobile',
        'email',
        'occupation',
        'profession',
        'name_of_organization',
        'type_of_organization',
        'nationality',
        'date_of_birth',
        'category',
        'area_of_interest',
        'other_membership',
        'other_club',
        'involved_in_polo',
        'horse_owner',
        'number_of_horses',
        'profile_photo',
        'office_address',
        'blood_group',
        'genotype',
        'emergency_contact_name',
        'emergency_contact_mobile',
        'emergency_contact_relationship',
    ];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['user'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function proposedBy() {
        return $this->belongsTo(Membership::class,'proposed_by','id');
    }

    public function secondedBy() {
        return $this->belongsTo(Membership::class,'seconded_by','id');
    }

    public function approvedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(User::class,'approved_by');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }

    public function stables(){
        return $this->hasMany(Stable::class);
    }

    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }

    public function profession(){
        return $this->belongsTo(Profession::class);
    }

    public function membershipCategory(){
        return $this->belongsTo(MembershipCategory::class);
    }
}
