<?php

namespace Gomee\Validators\FOLDER;

use Gomee\Validators\Validator as BaseValidator;

class NAMEValidator extends BaseValidator
{
    public function extends()
    {
        // Thêm các rule ở đây
    }

    /**
     * ham lay rang buoc du lieu
     */
    public function rules()
    {
    
        return [
            $RULES
        ];
    }

    /**
     * các thông báo
     */
    public function messages()
    {
        return [
            $MESSAGES
        ];
    }
}