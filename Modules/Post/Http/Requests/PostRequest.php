<?php

namespace Modules\Post\Http\Requests;

use App\Rules\Test;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'name' => new Test('content'),
            'name' => 'required|max:50',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Hãy nhập :attribute!',
            'max' => 'Hãy nhập tối đa :max ký tự!',
        ];
    }
}
