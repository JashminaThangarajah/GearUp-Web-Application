<?php

/// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'quantity', 'name', 'email', 'address', 'phone'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
