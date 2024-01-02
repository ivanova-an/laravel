<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'nullable|file',
            'main_image'=>'nullable|file',
            'category_id'=>'required|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для аполнения',
            'title.string' => 'Данные должны соотвествовать строчному типу',
            'content.required' => 'Это поле необходимо для аполнения',
            'content.string' => 'Данные должны соотвествовать строчному типу',
            'preview_image.required' => 'Это поле необходимо для аполнения',
            'preview_image.file' => 'Неоходимо выбрать файл',
            'main_image.required' => 'Это поле необходимо для аполнения',
            'main_image.file' => 'Неоходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо для аполнения',
            'category_id.integer' => 'Id категории должен быть числом',
            'category_id.exists' => 'Id категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправть массив данных',
        ];
    }
}
