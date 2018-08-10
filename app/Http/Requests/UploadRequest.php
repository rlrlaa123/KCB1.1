<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
        $fileimage = count($this->input('fileimage'));
        foreach (range(0, $fileimage) as $index) {
            $rules['fileimage.' . $index] = 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,zip|max:20000';
        }

        return $rules;
    }
}
