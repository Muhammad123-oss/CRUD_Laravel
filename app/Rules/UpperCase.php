<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UpperCase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     /**
      *  validate. This method receives the attribute name($attribute), its value($value), 
      *  and a callback($fail) that should be invoked on failure with the validation error message
      */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Here we are defining a rule that our field value should be equal to UpperCase
        if (strtoupper($value) !== $value) {
            // :attribute it will print our attribute name
            $fail('The :attribute must be uppercase.');
        }
    }
}
