<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
    ];
    protected $dates = ['deleted_at'];

    public function posts()
    {
        return $this->hasMany('App/Post', 'category_id');
    }

    public static function getAllCategory()
    {
        $query = Category::select('id', 'name')->get()->toArray();
        $result  = array_column($query, 'name', 'id');
        return $result;
    }
}