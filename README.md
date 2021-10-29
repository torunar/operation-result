# Operation result

# About

This package provides a component that can be used to store results (data and errors) of some operation: API query, system call, data parsing, etc.

This package aims to provide **simple tool** that can be used in cases where robust specific operation result classes create unnecessary complexity. 

# Installation

```bash
$ composer require torunar/operation-result
```

# Usage

```php
<?php

use Torunar\OperationResult\OperationResult;

$curl = curl_init('https://example.com');
curl_setopt(CURLOPT_RETURNTRANSFER, true);

$content = curl_exec($curl);
$errorCode = curl_errno();
$errorMessage = curl_error();
curl_close($curl);

$operationResult = new OperationResult(true);
if ($errorCode) {
    $operationResult->setIsSuccessful(false);
    $operationResult->addError($errorMessage, $errorCode);
} else {
    $operationResult->setData($content, 'content');
}

// Check whether operation succeeded
$operationResult->isSuccessful();

// Get all data
$operationResult->getData();

// Get single data record
$operationResult->getData('content');

// Get error messages
$operationResult->getErrors();
```
