<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

     
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity','user_id','produit_id'];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shops';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
