<?php
namespace SEO\Lite\Core;
class Scanner {
    private $errors; private $languageErrors; private $schemaError;
    public function __construct(){
        $this->errors = rand(8,15);
        $this->languageErrors = rand(5,20);
        $this->schemaError = true;
    }
    public function getTotalErrors(){ return $this->errors + $this->languageErrors + ($this->schemaError ? 1 : 0); }
    public function getLanguageErrors(){ return $this->languageErrors; }
    public function hasSchemaError(){ return $this->schemaError; }
}
