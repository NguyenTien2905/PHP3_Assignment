<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'image_url' => 'image|mimes:jpg,jpeg,png,gif|max:5120',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bắt buộc phải có tiêu đề',
            'title.max' => 'Không vượt quá 100 ký tự',
            'image_url.image' => 'Hình ảnh không hợp lệ',
            'image_url.mines' => 'Hình ảnh không hợp lệ',
            'image_url.max' => 'Hình ảnh không vượt quá 5MB',
            'content.required' => 'Bắt buộc phải có nọi dung bài viết',
            'category_id.required' => 'Danh mục là bắt buộc',
            'category_id.exists' => 'Danh mục không tồn tại',
        ];
    }
}
