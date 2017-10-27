<?php

namespace App;

use App\Http\Constant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'status'
    ];
    protected $dates = ['deleted_at'];
    protected $user_id;

    public function __construct()
    {
        $this->user_id = Auth::guard('users')->user()->id;
        parent::__construct();
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
        $result = array_column($query, 'name', 'id');
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

    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            foreach (Category::whereIn('id', $id)->cursor() as $category) {
                if (!$category->delete()) {
                    DB::rollback();
                    return false;
                }
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
        }
        return false;
    }
}