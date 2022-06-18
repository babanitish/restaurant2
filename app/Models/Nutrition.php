<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Valeurs énergétiques','matières grasses','proteines','glucides','sel',];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nutritions';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
