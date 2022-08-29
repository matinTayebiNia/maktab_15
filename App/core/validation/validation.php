<?php

namespace App\core\validation;

use JetBrains\PhpStorm\Pure;

class validation implements validationInterface
{

    const REQUIRED_VALIDATION = "required";
    const MIN_VALIDATION = "min";
    const MAX_VALIDATION = "max";
    const REGEX_VALIDATION = "regex";
    const EMAIL_VALIDATION = "email";
    const INTEGER_VALIDATION = "integer";


    private array $rules;
    private array $messages = [];
    private array $errors = [];

    public function __construct()
    {

    }

    public function setMessages(array $messages = [])
    {
        $keys = array_keys($this->rules);
        $this->messages = $this->setStaticMessageForRule($keys);
        $this->setCustomMessagesForRule($messages);
    }

    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function setRule(array $rules)
    {
        $this->rules = $rules;
    }

    public function getAttribute($key)
    {
        if (property_exists($this, $key)) {
            return $this->{$key};
        }
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
                $this->required($ruleName, $value, $attribute);

                $this->email($ruleName, $value, $attribute);

                $this->integer($ruleName, $value, $attribute);

                $this->min($ruleName, $value, $item, $attribute);

                if ($ruleName === self::MAX_VALIDATION && strlen($value) > $item["max"]) {
                    $this->addErrorForRule($attribute, self::MAX_VALIDATION, ["max" => $item["max"], "field" => $attribute]);
                }
            }
        }

        return empty(array_filter($this->errors));
    }

    /**
     * @param $keys
     * @return array
     */
    #[Pure]
    protected function setStaticMessageForRule($keys): array
    {
        $att = [];
        $msg = [];
        foreach ($keys as $key) {
            $validate = $this->rules[$key];
            foreach ($validate as $item) {
                if (!is_string($item)) {
                    $item = $item[0];
                }
                $att[] = $key . "." . $item;
                $msg[] = $this->StaticMessages()["{attribute}." . $item];
            }
        }
        return array_combine($att, $msg);
    }


    /**
     * @param array $messages
     * @return void
     */
    protected function setCustomMessagesForRule(array $messages): void
    {
        foreach ($messages as $key => $item)
            if (in_array($key, array_keys($this->messages)))
                $this->messages[$key] = $item;
    }

    private function addErrorForRule(string $attribute, string $rule, $params = [])
    {
        $message = $this->messages[$attribute . "." . $rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    protected function StaticMessages(): array
    {
        return [
            "{attribute}." . self::REQUIRED_VALIDATION => 'This {field} field is required',
            "{attribute}." . self::EMAIL_VALIDATION => 'This field must be valid email address',
            "{attribute}." . self::MIN_VALIDATION => 'Min length of this {field} must be {min}',
            "{attribute}." . self::MAX_VALIDATION => 'Max length of this {field} must be {max}',
            "{attribute}." . self::REGEX_VALIDATION => 'This {field} is not valid',
            "{attribute}." . self::INTEGER_VALIDATION => 'This {field} is not valid',
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function gerError(): array
    {
        return $this->errors;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }

    /**
     * @param mixed $ruleName
     * @param $value
     * @param int|string $attribute
     * @return void
     */
    private function required(mixed $ruleName, $value, int|string $attribute): void
    {
        if ($ruleName == self::REQUIRED_VALIDATION && !$value) {
            $this->addErrorForRule($attribute, self::REQUIRED_VALIDATION, ["field" => $attribute]);
        }
    }

    /**
     * @param mixed $ruleName
     * @param $value
     * @param int|string $attribute
     * @return void
     */
    private function email(mixed $ruleName, $value, int|string $attribute): void
    {
        if ($ruleName === self::EMAIL_VALIDATION && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addErrorForRule($attribute, self::EMAIL_VALIDATION);
        }
    }

    /**
     * @param mixed $ruleName
     * @param mixed $value
     * @param int|string $attribute
     * @return void
     */
    private function integer(mixed $ruleName, mixed $value, int|string $attribute): void
    {
        if ($ruleName === self::INTEGER_VALIDATION && !is_numeric($value)) {
            $this->addErrorForRule($attribute, self::INTEGER_VALIDATION, ["field" => $attribute]);
        }
    }

    /**
     * @param mixed $ruleName
     * @param $value
     * @param $item
     * @param int|string $attribute
     * @return void
     */
    private function min(mixed $ruleName, $value, $item, int|string $attribute): void
    {
        if (!is_string($item))
            if ($ruleName === self::MIN_VALIDATION && strlen($value) < $item["min"]) {
                $this->addErrorForRule($attribute, self::MIN_VALIDATION, ["min" => $item["min"], "field" => $attribute]);
            }
    }

}