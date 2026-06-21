<?php

use App\Constants\BusinessHourConstants;
use App\Constants\CompanyConstants;
use App\Models\Company;
use Illuminate\Support\Str;

if (! function_exists('generate_unique_slug')) {
    function generate_unique_slug(string $name, $model = null, $column = 'slug'): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $i = 1;

        $model = $model ?? new Company;

        while ($model->where($column, $slug)->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}

if (! function_exists('generate_company_account_number')) {
    function generate_company_account_number(): string
    {
        do {
            $number = 'HME'.mt_rand(10000000, 99999999);
        } while (Company::where('account_number', $number)->exists());

        return $number;
    }
}

if (! function_exists('company_sizes')) {
    function company_sizes(): array
    {
        return CompanyConstants::COMPANY_SIZES;
    }
}

if (! function_exists('company_types')) {
    function company_types(): array
    {
        return CompanyConstants::COMPANY_TYPES;
    }
}

if (! function_exists('button_names')) {
    function button_names(): array
    {
        return CompanyConstants::BUTTON_NAMES;
    }
}

if (! function_exists('organization_types')) {
    function organization_types(): array
    {
        return CompanyConstants::ORGANIZATION_TYPES;
    }
}

if (! function_exists('service_area')) {
    function service_area(): array
    {
        return CompanyConstants::SERVICE_AREA;
    }
}

if (! function_exists('service_mode')) {
    function service_mode(): array
    {
        return CompanyConstants::SERVICE_MODE;
    }
}

if (! function_exists('busines_days')) {
    function busines_days(): array
    {
        return BusinessHourConstants::DAYS;
    }
}
if (! function_exists('busines_types')) {
    function busines_types(): array
    {
        return BusinessHourConstants::TYPES;
    }
}
