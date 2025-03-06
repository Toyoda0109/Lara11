<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;


class RequiredIfNamashi implements ValidationRule
{
    public $implicit = true;

    public function __construct(private mixed $name)
    {
        
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(is_string($this->name) && $this->name === '名無し' && blank($value)) {
            $fail("名前が名無しの時は、:attributeを入力してください")->translate();
        }
    }
}
