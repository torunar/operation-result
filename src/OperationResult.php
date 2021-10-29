<?php

namespace Torunar\OperationResult;

class OperationResult
{
    private bool $isSuccessful;

    private array $data = [];

    private array $errors = [];

    public function __construct(bool $isSuccessful = true)
    {
        $this->isSuccessful = $isSuccessful;
    }

    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    public function getData(string $key = null, $defaultValue = null)
    {
        if ($key === null) {
            return $this->data;
        }

        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return $defaultValue;
    }

    public function setData($value, string $key = null)
    {
        if ($key === null) {
            $this->data[] = $value;

            return;
        }

        $this->data[$key] = $value;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $message, string $code = null)
    {
        if ($code === null) {
            $this->errors[] = $message;

            return;
        }

        $this->errors[$code] = $message;
    }

    public function setIsSuccessful(bool $isSuccessful): void
    {
        $this->isSuccessful = $isSuccessful;
    }
}
