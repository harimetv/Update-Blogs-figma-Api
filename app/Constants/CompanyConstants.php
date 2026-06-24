<?php

namespace App\Constants;

class CompanyConstants
{
    public const COMPANY_SIZES = [
        '0-1 employees',
        '2-10 employees',
        '11-50 employees',
        '51-200 employees',
        '201-500 employees',
        '501-1,000 employees',
        '1,001-5,000 employees',
        '5,001-10,000 employees',
        '10,001+ employees',
    ];

    public const COMPANY_TYPES = [
        'Educational',
        'Government Agency',
        'Non Profit',
        'Partnership',
        'Privately Held',
        'Public Company',
        'Self Employed',
        'Self Owned',
    ];

    public const BUTTON_NAMES = [
        'Contact us',
        'Learn more',
        'Register',
        'Sign up',
        'Visit website',
        'Visit portfolio',
        'Visit store',
    ];

    public const ORGANIZATION_TYPES = [
        'Startup',
        'SMB',
        'Enterprise',
        'Agency',
        'NGO',
        'Corporation',
        'Freelancer',
        'Other',
    ];
    public const SERVICE_AREA= [
        "MNC",
        "Pan India",
        "State",
        "City",
        "Area"
    ];

    public const SERVICE_MODE= [
        "On call",
        "Home",
        "Online",
        "On Office"
    ];
}
