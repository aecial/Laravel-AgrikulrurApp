<?php 
// app/Services/ValidationService.php

namespace App\Services;

use Illuminate\Validation\Factory as Validator;

class ValidationService
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateMessage(array $data)
    {
        return $this->validator->make($data, [
            'message' => 'required|string|max:255',
        ])->validate();
    }
}


/*namespace App\Services;

use Illuminate\Validation\Factory as Validator;

class ValidationService
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateMessage(array $data)
    {
        return $this->validator->make($data, [
            'message' => 'required|string|max:255',
        ])->validate();
    }
}*/
