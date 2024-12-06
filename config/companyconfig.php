<?php
return [

/*
|--------------------------------------------------------------------------
| Company Name
|--------------------------------------------------------------------------
|
| This value is the name of your company. This value is used in the invoice.
|
*/

'name' => 'NM Exports',
/*
|--------------------------------------------------------------------------
| Tax Applicable
|--------------------------------------------------------------------------
|
| When tax is applicable, then tax_name and tax_registration_no is used in
| the invoice.
|
*/

'tax_applicable' => true,

/*
|--------------------------------------------------------------------------
| Tax Name
|--------------------------------------------------------------------------
|
| This value is the tax name applied to your company. This value is used in
| the invoice. For India it is GSTIN (Goods & Services Tax Identification Number)
|
*/

'tax_name' => 'GSTIN',

/*
|--------------------------------------------------------------------------
| Tax Registration No
|--------------------------------------------------------------------------
|
| This value is the tax registration number of your company. This value is
| used in the invoice.
|
*/

'tax_registration_no' => '19AAJCR8808D1Z3',

/*
|--------------------------------------------------------------------------
| Registered Address
|--------------------------------------------------------------------------
|
| This value is the registered address of your company. This value is used in
| the invoice.
|
*/

'address' => [
        'addr_line1' => 'Srijan Industrial and Logistics Park',
        'addr_line2' => 'N.H.-6 Bombay Road, NearSaraswati Bridge',
        'city' => 'Howrah, Hooghly',
        'state' => 'West Bengal',
        'pin' => '711302'
    ],
/*
|--------------------------------------------------------------------------
| Company's Country
|--------------------------------------------------------------------------
|
| This value is the country under which the company's tax is registered.
|This value is used in the invoice.
|
*/

'country' => 'India',
/*
|--------------------------------------------------------------------------
| Company's State
|--------------------------------------------------------------------------
|
| This value is the state under which the company's tax is registered. This
| value is used in the invoice.
|
*/

'state' => 'West Bengal',
/*
|--------------------------------------------------------------------------
| Tax Included In Product Price
|--------------------------------------------------------------------------
|
| When tax is included in product price then in invoice reverse calculation
| is shown to break up tax. When the tax is exluded from product price then
| in invoice tax is calculated at each product. This value is used in the invoice.
|
*/

'tax_inclusive_product_price' => true,
/*
|--------------------------------------------------------------------------
| Contact Phone No
|--------------------------------------------------------------------------
|
| This value is the contact number of the company. This
| value is used in the invoice.
|
*/

'phone' => '9830012345',
/*
|--------------------------------------------------------------------------
| Support Email
|--------------------------------------------------------------------------
|
| This value is the email for customer support of the company. This
| value is used in the invoice.
|
*/

'support_email' => 'support@maskare.in',
/*
|--------------------------------------------------------------------------
| Confirmed Order Email
|--------------------------------------------------------------------------
|
| When the order is placed then a mail is generated at this email id of the
| company.
|
*/

'order_email' => 'order@maskare.in',
/*
|--------------------------------------------------------------------------
| Social Media Links
|--------------------------------------------------------------------------
|
| Social Media Links to show in front panel to the customers
|
*/

'social_media_links' => [
        'facebook' => 'www.facebook.com',
        'instagram' => '#',
        'twitter' => '#',
        'youtube' => null,
        'pinterest' => '#',
        'linkedin' => '#',
        'helo' => null
    ],
/*
|--------------------------------------------------------------------------
| Default Currency
|--------------------------------------------------------------------------
|
| Default currency is used in the invoice and in product price.
|
*/

'default_currency' => ['name' => 'INR', 'symbol' => '₹'],

];