<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'title' => 'required',
        'note' => 'required'
    ]; 

}