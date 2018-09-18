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
        $file = count($this->input('file'));
        foreach (range(0, $fileimage) as $index) {
            $rules['fileimage.' . $index] = 'required|mimes:jpeg,png,jpg,gif,svg|max:20000';
        }
        foreach (range(0, $file) as $index) {
            $rules['file.' . $index] = 'required|max:20000';
        }

        return $rules;
    }
    public function messages(){
        return[
            'required'=> ':attribute은(는) 필수 입력 항목입니다.',
            'min'=>':attribute은(는) 최소 :min 글자 이상 입력해야 합니다.'
        ];
    }
    public function attributes()
    {
        return[
            'fileimage'=>'첨부 파일',
            'file'=>'이미지',
        ];
    }
}
