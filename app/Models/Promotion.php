<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promotion
 *
 * @property $id
 * @property $cat
 * @property $status
 * @property $name
 * @property $description
 * @property $price
 * @property $image
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Promotion extends Model
{
    
  static $rules = [
		'cat' => 'required',
		'status' => 'required',
		'name' => 'required',
		'description' => 'required',
		'price' => 'numeric|required|min:1|max:100',
		'image' => 'image|mimes:jpeg,jpg,png,svg|max:1024',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cat','status','name','description','price','image'];
}
