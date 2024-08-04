<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'avatar' => 'image|mimes:jpg,jpeg,png,gif|max:5120',
            'password' => 'min:8|max:20',
            'email' => 'required|email|unique:users,email',
            'type' => 'not_in:0'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc phải có tên',
            'name.max' => 'Không vượt quá 100 ký tự',

            'avatar.image' => 'Hình ảnh không hợp lệ',
            'avatar.mines' => 'Hình ảnh không đúng định dạng jpg,jpeg,png,gif',
            'avatar.max' => 'Hình ảnh không vượt quá 5MB',

            'password.required' => 'Bắt buộc phải có tên',
            'password.min' => 'Không ít hơn 8 ký tự',
            'password.max' => 'Không vượt quá 20 ký tự',

            'email.required' => 'Bắt buộc phải điền email',
            'email.email' => 'Không đúng dịnh dạng email',
            'email.unique' => 'Email đã tồn tại',

            'type.not_in' => 'Bạn chưa chọn cấp quyền',

        ];
    }
}
