<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Nuhsa implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(strlen($value) != 12 || substr($value, 0, 2) != 'AN' || !is_numeric(substr($value, 2))){
            return false;
        }
        $b = (int)substr($value, 2, 8);
        $c = (int)substr($value, 10, 2);
        $d = null;

        if($b < 10000000){
            $d = $b + 60 * 10000000;
        }
        else{
            $d = (int)("60".substr($value, 2, 8));
        }
        return $d % 97 == $c;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.nuhsa');
    }
}
