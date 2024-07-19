<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'amount',
        'member_id',
        'from_account',
        'to_account',
        'new',
        'created_at',
        'website_id',
        'user_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function website(){
        return $this->belongsTo(Website::class);
    }

    public function from_account(){
        return $this->belongsTo(Account::class,'from_account');
    }

    public function to_account(){
        return $this->belongsTo(Account::class, 'to_account');
    }
}
