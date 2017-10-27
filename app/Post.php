<?php

namespace App;

use App\Http\Constant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'content',
        'category_id',
        'tag',
        'user_id'
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

    public function getWhere($filter)
    {
        $query = Post::whereHas('categories', function ($q) use ($filter) {
            if (isset($filter['category']) && $filter['category']) {
                $q->where('name', 'like', '%' . $filter['category'] . '%');
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
        dd(self::all());
        $query = $this->getWhere($filter);
        return $query->paginate(Constant::$limit);
    }

    /*
    public function validate($data)
    {
        $rules = [
            'name' => 'required|max:5',
            'content' => 'required|max:5',
            'category_id' => 'required',
        ];
        $messages = [
            'required' => 'Trường :attribute bắt buộc nhập (Mày ngu vkl).',
            'max' => 'Chỉ được nhập tối đa :max ký tự (Mày ngu vkl).',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(Input::except('password'));
        }
        return $validator;
    }
    */
}
