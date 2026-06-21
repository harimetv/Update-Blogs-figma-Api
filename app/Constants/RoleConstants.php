<?php

namespace App\Constants;

class RoleConstants
{
	public const SUPER_ADMIN = 'super-admin';
	public const ADMIN = 'admin';
	public const MANAGER = 'manager';
	public const USER = 'user';

	// Function to return all roles as an array
	public static function allRoles(): array
	{
		return [
			self::SUPER_ADMIN,
			self::ADMIN,
			self::MANAGER,
			self::USER,
		];
	}
}
