<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'order_date',
        'package_name',
        'total_participant',
        'total_day',
        'accommodation',
        'transportation',
        'food',
        'travel_price',
        'total_bill',
    ];

    protected $casts = [
        'accommodation' => 'boolean',
        'transportation' => 'boolean',
        'food' => 'boolean',
    ];

    // Helper method to get formatted price
    public function getFormattedTravelPriceAttribute()
    {
        return 'Rp ' . number_format($this->travel_price, 0, ',', '.');
    }

    // Helper method to get formatted total bill
    public function getFormattedTotalBillAttribute()
    {
        return 'Rp ' . number_format($this->total_bill, 0, ',', '.');
    }
}
