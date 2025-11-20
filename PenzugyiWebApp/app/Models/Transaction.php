<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'amount',
        'type',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Accessor to allow using 'id' as an alias for 'transaction_id'
     */
    public function getIdAttribute()
    {
        return $this->transaction_id;
    }
}
