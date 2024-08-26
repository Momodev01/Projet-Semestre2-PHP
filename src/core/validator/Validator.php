<?php

namespace App\Core\Validator;

class Validator {
    public static array $errors = [];

    public static function validate(): bool {
        return count(self::$errors) == 0;
    }

    // Régles de Validation

    //Champ Obligatoire
    public static function isEmpty($nameField, $sms = "Ce champ est obligatoire"): bool {
        if (empty($_REQUEST[$nameField])) {
            self::$errors[$nameField] = $sms;
            return false;
        }
        return true;
    }

    // Format Email
    public static function isEmail($nameField, $sms = "Ce champ est obligatoire"): bool {
        if (!filter_var($_REQUEST[$nameField], FILTER_VALIDATE_EMAIL)) {
            self::$errors[$nameField] = $sms;
            return true;
        }
        return false;
    }
}
