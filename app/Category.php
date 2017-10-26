<?php

namespace App;

use App\Http\Constant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'user_id'
    ];
    protected $dates = ['deleted_at'];
    protected $user_id;

    public function __construct()
    {
        $this->user_id = Auth::guard('users')->user()->id;
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id')->whereNotNull('id');
    }

    public static function getAllCategory()
    {
        $query = Category::select('id', 'name')
            ->where('status', '1')
            ->get()
            ->toArray();
        $result  = array_column($query, 'name', 'id');
        return $result;
    }

    public function getWhere($filter)
    {
        $query = Category::whereHas('users', function ($q) use ($filter) {
            if (isset($filter['user']) && $filter['user']) {
                $q->where('name', 'like', '%' . $filter['user'] . '%');
            }
        });
        if (isset($filter['name']) && $filter['name']) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');
        };
        $query->orderBy('id');
        return $query;
    }

    public function getData($filter)
    {
        $query = $this->getWhere($filter);
        return $query->paginate(Constant::$limit);
    }
}