<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    protected $fillable =['name','price','description','image'];
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_menu');
    }
}