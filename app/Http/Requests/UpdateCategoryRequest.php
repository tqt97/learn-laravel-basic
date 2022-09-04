<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->category->id,
            'slug' => 'unique:categories,slug,' . $this->category->id,
            'status' => 'required|boolean|sometimes',
            'order_at' => 'integer|sometimes',
            'parent_id' => 'integer|nullable',
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
