<?php

namespace App\Services\SessionService;

use Illuminate\Http\Request;

class SessionObj
{
    public ?string $name = null;
    public mixed $data = null;
    public ?string $errorMessage = null;

    public function init(?string $name = null, mixed $data): self
    {
        $this->name = $name;
        $this->data = $data;

        return $this;
    }

    public function isValid(): bool
    {
        return $this->name && $this->data;
    }

    public function checkError(): self
    {
        if (!$this->isValid()){
            $this->errorMessage = 'Не удалось найти данные в сессии';
        }

        return $this;
    }

}
