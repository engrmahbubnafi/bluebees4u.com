<?php

$conf = [
    'comming_soon' => false,
    'chat' => true,
    'administratorId' => 1,
    'contactEntity' => config('app.name'),
    'lang' => [
        'en' => [
            'title' => 'English',
            'flag' => 'us',
        ],
        // 'fr' => [
        //     'title' => 'France',
        //     'flag'  => 'fr',
        // ],
        // 'bd' => [
        //     'title' => 'Bangla',
        //     'flag'  => 'bd',
        // ],
    ],
    'currency_symbol' => 'US$',
    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],
    'payment_status' => [
        'received' => 'Received',
        'pending' => 'Pending',
    ],
    'published_status' => [
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ],
    'colors' => [
        'success',
        'brand',
        'danger',
        'success',
        'warning',
        'primary',
        'info',
    ],
    'groups' => [
        [
            'role_id' => 2,
            'name' => 'Supplier',
            'group_type' => 'supplier',
        ],
        [
            'role_id' => 3,
            'name' => 'Buyer',
            'group_type' => 'buyer',
        ],
    ],
    'smsApi' => [
        'host' => 'https://api.mobireach.com.bd/SendTextMessage',
        'host2' => 'https://api.mobireach.com.bd/SendTextMultiMessage',
        'params' => [
            'Username' => 'indexsms',
            'Password' => 'X-Index2020',
            'From' => '8801847170249',
        ],
    ],
    'stage' => [
        'buyer' => [
            [
                'title' => 'Verify Phone',
                'fn' => 'isMobileVerified',
                'route' => 'contact.change',
                'route_params' => ['mobile'],
                'point' => 10,
            ],
            [
                'title' => 'Company Information',
                'fn' => 'hasCompanyInfo',
                'route' => 'buyer.profile',
                'route_params' => ['company-basic-info'],
                'point' => 30,
            ],
            [
                'title' => 'Business Category',
                'fn' => 'hasBusinessInfo',
                'route' => 'buyer.profile',
                'route_params' => ['business-info'],
                'point' => 20,
            ],
            [
                'title' => 'Communication',
                'fn' => 'hasCommunication',
                'route' => 'buyer.profile',
                'route_params' => ['communication'],
                'point' => 10,
            ],
        ],
        'supplier' => [
            [
                'title' => 'Verify Phone',
                'fn' => 'isMobileVerified',
                'route' => 'contact.change',
                'route_params' => ['mobile'],
                'point' => 10,
            ],
            [
                'title' => 'Business Category',
                'fn' => 'hasBusinessInfo',
                'route' => 'supplier.profile',
                'route_params' => ['business-info'],
                'point' => 10,
            ],
            [
                'title' => 'Company Information',
                'fn' => 'hasCompanyInfo',
                'route' => 'supplier.profile',
                'route_params' => ['company-basic-info'],
                'point' => 10,
            ],
            [
                'title' => 'Export Capabilities',
                'fn' => 'hasExportCapabilities',
                'route' => 'supplier.profile',
                'route_params' => ['company-export-capabilities'],
                'point' => 10,
            ],
            [
                'title' => 'Communication',
                'fn' => 'hasCommunication',
                'route' => 'supplier.profile',
                'route_params' => ['communication'],
                'point' => 10,
            ],
            [
                'title' => 'Common Certificates',
                'fn' => 'hasCommonCertificates',
                'route' => 'supplier.profile',
                'route_params' => ['company-common-certificates'],
                'point' => 10,
            ],
            [
                'title' => 'Compliance Certificates',
                'fn' => 'hasComplianceCertificates',
                'route' => 'supplier.profile',
                'route_params' => ['company-compliance-certificates'],
                'point' => 10,
            ],
        ],
    ],
    'payment_types' => [
        'sight_lc',
        'defered_lc_(60_days)',
        'defered_lc_(90_days)',
        'defered_lc_(120_days)',
        'tt',
        // 'contract',
        'cash_payment',
    ],
    'delivery_terms' => ['fob', 'c&f', 'cif', 'cift'],
    'payment_currency' => ['usd', 'eur', 'jpy', 'cad', 'aud', 'hkd', 'gbp', 'cny', 'chf'],
    'measurement_units' => ['cm', 'inch'],
    'size_ranges' => ['xs', 's', 'm', 'l', 'xl', 'xxl', 'xxl'],
    'shipping_modes' => ['sea', 'air', 'land', 'sea and air', 'air and sea'],

    'bidding_start_duration' => 2 * 24 * 60 * 60,
    'bidding_end_duration' => 5 * 24 * 60 * 60,
    'ready_product_auction_duration' => 3 * 24 * 60 * 60,

    'auction_order_duration' => 30 * 60,
    'max_bid_attempt' => 5,
    'max_auction_bid_attempt' => 200,
    'buying_commission' => 1.1,
    'rfq_allowed_file_types' => ['.jpg', '.jpeg', '.png', '.pdf', '.xls', '.xlsx', '.doc', '.docx'],
    'per_page' => 12,
    'image_size' => [
        'thumb' => 60,
        'small' => 600,
    ],
    'page_banner' => '60px 0',
    'ready_stock_categories' => [
        'non_shipped' => 'Non Shipped Commodities',
        'surplus' => 'Surplus Commodities',
    ],
    'kl_service_type' => [
        'rfq' => 'RFQ',
        'gallery' => 'Gallery',
        'auction' => 'Auction',
    ],
    'kl_processing_fee_rate' => 1.8,
    'coupon_type' => [
        'subscription' => 'Subscription',
    ],
    'google_analytics' => 'RVHVBV5C2H',
    'types_of_factory' => [
        'compliance' => 'Compliance',
        'non_compliance' => 'Non Compliance',
    ],
    'max_reauction_attempt' => 1,
];

$conf['rfq_event_alert_time'] = (int) $conf['bidding_end_duration'] - (4 * 60 * 60);
$conf['auction_event_alert_time'] = (int) $conf['ready_product_auction_duration'] - (4 * 60 * 60);

return $conf;
