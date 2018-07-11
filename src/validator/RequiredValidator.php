<?php
namespace src\validator;

use Slight\validator\ValidatorImpl;

final class RequiredValidator implements ValidatorImpl {

	public static function validate(object $entity, string $name, $value, array $parameters, array &$sharedData): bool {
		return ! empty($value);
	}
}