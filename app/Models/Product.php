<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
		'precio' => 'required|numeric|min:1',
		'cantidad' => 'required|integer|min:1',
    ];

    static $rulesUpdate = [
      'name' => 'required'
      ];
  

    static $rulesCantidad = [
      'cantidad' => 'required|integer|min:1',
      ];
    

    protected $perPage = 20;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name','precio','cantidad'];
}
