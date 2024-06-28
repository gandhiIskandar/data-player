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
        'account_id',
        'new',
        'created_at',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
