<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 4:30 PM
 */

namespace App\Classes\Validators;
use Illuminate\Database\Capsule\Manager as Capsule;

class BaseValidateRequest
{
    private static  $error = [];
    private static $error_messages = [
        'string' => 'The :attribute field cannot contain numbers',
        'required' => 'The :attribute field is required',
        'minLength' => 'The :attribute field minLength',
        'maxLength' => 'The :attribute field macLength',
        'mixed' => 'The :attribute field mixed',
        'number' => 'The :attribute field number',
        'email' => 'The :attribute field email',
        'unique' => 'The :attribute field unique'
    ];

    /**
     * Returns if there is a validation error(s)
     * @return bool
     */
    final public function hasError()
    {
        return count(self::$error) > 0;
    }

    /**
     * Return all validation errors
     * @return array
     */
    final public function getErrorMessages()
    {
        return self::$error;
    }

    /**
     * Column and data to validate
     * @param array $dataAndValues
     * @param array $policies
     */
    protected function abide(array $dataAndValues, array $policies)
    {
        foreach ($dataAndValues as $column => $value) {
            if (in_array($column, array_keys($policies))) {
                self::doValidation([
                    'column' => $column,
                    'value' => $value,
                    'policies' => $policies[$column]
                ]);
            }
        }
    }

    /**
     * Perform validation for the data provided and set error messages
     * @param array $data
     */
    private static function doValidation(array $data)
    {
        $column = $data['column'];
        foreach($data['policies'] as $rule => $policy) {
            $value = call_user_func_array([self::class, $rule], [$column, $data['value'], $policy]);

            if (!$value) {
                self::setError(
                    str_replace(
                        [':attribute', ':policy', '_'],
                        [$column, $policy, ' '],
                        self::$error_messages[$rule]),
                        $column
                );
            }
        }
    }

    /**
     * @param $column, field name or column name
     * @param $value, value passed into the form
     * @param $policy, rule that we set e.g min = 5
     * @return bool, true | false
     */
    protected static function unique($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return !Capsule::table($policy)->where($column, '=', $value)->exists();
        }
        return true;
    }

    protected static function required($column, $value, $policy)
    {
        return $value !== null && !empty($value);
    }

    protected static function minLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen($value) >= $policy;
        }
        return true;
    }

    protected static function maxLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen($value) <= $policy;
        }
        return true;
    }

    protected static function email($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
        return false;
    }

    protected static function mixed($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            if (!preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/', $value)) {
                return false;
            }
        }
        return true;
    }

    protected static function string($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            if (!preg_match('/^[A-Za-z ]+$/', $value)) {
                return true;
            }
        }
        return true;
    }

    protected static function number($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            if (!preg_match('/^[0-9.]+$/', $value)) {
                return true;
            }
        }
        return true;
    }

    /**
     * Set specific error
     * @param $error
     * @param null $key
     */
    final private static function setError($error, $key = null)
    {
        if ($key) {
            self::$error[$key][] = $error;
        } else {
            self::$error[] = $error;
        }
    }
}