<?php

namespace App\Rules\Api;

use Illuminate\Contracts\Validation\Rule;

class UniqueDataRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $orginalEmail;

    public function __construct($value)
    {
        $this->orginalEmail = $value;
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
        return $value == $this->orginalEmail;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
