<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class greaterThan implements Rule
{
    
    
    public function __construct()
    {

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
        return (int)$value < 1999;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, To sign up, you must be 18 or older.';
    }
}
