<?php

namespace App\Http\Requests;

use App\Models\Link;
use App\Rules\AfterPublish;
use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest
{
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
            "url" => "required|unique:links,url",
            "publishAt" => "required|date",
            "deleteAt" => "required|date|after:publishAt"
        ];
    }
}
