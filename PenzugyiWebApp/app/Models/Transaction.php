<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $primaryKey = 'transaction_id';

    // Tömegesen kitölthető mezők
    protected $fillable = [
        'account_id',
        'category_id',
        'amount',
        'type',
        'description',
        'date',
    ];

    // Dátum típusok automatikus konvertálása Carbon objektummá
    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];

    /**
     * Kapcsolat az Account modelhez
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    /**
     * Kapcsolat a Category modelhez
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
