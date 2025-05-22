<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
      protected $fillable = [
        'amount',
        'description',
        'transaction_date',
        'category_id',
        'user_id',
    ];

     public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function user()
  {
    return $this->belongsTo(User::class);
  }
}
