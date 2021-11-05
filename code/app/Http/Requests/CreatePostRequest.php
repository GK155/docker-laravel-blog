<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $avatar
 */
class CreatePostRequest extends FormRequest
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
            'title' => 'required|unique:posts,title|max:255',
            'text' => 'required',
            'avatar' => 'mimes:png,jpg,gif',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
