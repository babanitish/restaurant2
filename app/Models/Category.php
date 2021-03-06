<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

