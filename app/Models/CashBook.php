<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;

class CashBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'amount',
        'detail',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
      return $this->belongsTo(Type::class);
    }
}
