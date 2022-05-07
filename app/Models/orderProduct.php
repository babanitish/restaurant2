<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;

    
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','product_id','price','quantity'];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_product';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
