<?php

namespace app\core\validation;

use JetBrains\PhpStorm\ArrayShape;

class validation implements validationInterface
{

    const REQUIRED_VALIDATION = "required";
    const MIN_VALIDATION = "min";
    const MAX_VALIDATION = "max";
    const REGEX_VALIDATION = "regex";
    const EMAIL_VALIDATION = "email";


    private array $rules;
    private array $messages;
    private array $errors;

    public function __construct(array $data)
    {
        $this->loadData($data);
    }

    public function setMessages(array $messages = [])
    {
        if (!empty($messages)) {
            //todo implement replace custom error message
            var_dump($this->rules);
            /*if (in_array($this->rules)){

            }*/
            $this->loadMessageData($messages);

            $this->messages = $messages;
        }
    }

    protected function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function setRule(array $rules)
    {
        $this->rules = $rules;
    }

    public function SetupRule(): bool
    {
        foreach ($this->rules as $attribute => $rule) {
            $value = $this->{$attribute};
            foreach ($rule as $item) {
                $ruleName = $item;
                if (!is_string($item)) {
                    $ruleName = $item[0];
                }
                if ($ruleName == self::REQUIRED_VALIDATION && !$value) {

                }

            }
        }

        return empty($this->errors);
    }

    /**
     * @param $messages
     * @param array $keysMessageValidation
     * @return array
     */
    protected function replaceKeys($messages, array $keysMessageValidation): array
    {
        foreach ($messages as $key => $message) {
            $keys = explode(".", $key);
            $validate = $this->rules[$keys[0]];

            foreach ($validate as $item) {
                $keysMessageValidation[array_search("{attribute}.{$item}", $keysMessageValidation, true)] = $key;

            }
        }
        return array($key, $keysMessageValidation);
    }

    private function addErrorForRule(string $attribute, string $rule, $params = [])
    {

    }

    protected function messages(): array
    {
        return [
            "{attribute}." . self::REQUIRED_VALIDATION => 'This {field} field is required',
            "{attribute}." . self::EMAIL_VALIDATION => 'This field must be valid email address',
            "{attribute}." . self::MIN_VALIDATION => 'Min length of this {field} must be {min}',
            "{attribute}." . self::MAX_VALIDATION => 'Max length of this {field} must be {max}',
            "{attribute}." . self::REGEX_VALIDATION => 'This {field} is not valid',
        ];
    }

    protected function loadMessageData($messages)
    {
        $keysMessageValidation = array_keys($this->messages());
        //todo implement replace static messages

        $valuesMessageValidation = array_values($this->messages());
        list($key, $keysMessageValidation) = $this->replaceKeys($messages, $keysMessageValidation);

        /*echo "<pre>";
        var_dump(array_combine($keysMessageValidation,$valuesMessageValidation));
        echo "</pre>";*/
        $this->messages = array_combine($keysMessageValidation, $valuesMessageValidation);

        foreach ($this->messages as $key => $message) {
            if (in_array($key, array_keys($messages))) {
                $this->messages[$key] = $messages[$key];
            }
        }


        echo "<pre>";
        var_dump($this->messages);
        echo "</pre>";
    }
}