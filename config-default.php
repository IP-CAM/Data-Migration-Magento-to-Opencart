<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Database OpenCat Information
    |--------------------------------------------------------------------------
    |
    */
    'db' => array(
        'opencart' => array(
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'ocpencart',
        ),
        'magento' => array(
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'magento',
        ),
    ),

    'unwanted_strings' => array(),
    /*
    |--------------------------------------------------------------------------
    | Opencart Information
    |--------------------------------------------------------------------------
    |
    */
    'oc_base_path_image' => '/www/opencart/image/',
    'image_oc_product_path' => 'catalog/product/',
    'image_oc_category_path' => 'catalog/',
    /*
    |--------------------------------------------------------------------------
    | Magento Information
    |--------------------------------------------------------------------------
    |
    */
    'magento_url_source' => 'http://www.magento.dev',
    'image_magento_product_path' => '/media/catalog/product/',
    'image_magento_category_path' => '/media/catalog/',

    /*
    |--------------------------------------------------------------------------
    | Product Attribute
    |--------------------------------------------------------------------------
    |
    */
    'product_attribute' => array(
        1 => 'kh_content_amount',
        2 => 'kh_displayed_eta_date',
        3 => 'kh_eta_date',
        4 => 'kh_expiration_date',
        5 => 'kh_ingredients',
    ),
    /*
    |--------------------------------------------------------------------------
    | Oder Total Opencart
    |--------------------------------------------------------------------------
    |
    */
    'order_total_codes' => array(
        1 => array(
            'code' => 'sub_total',
            'title' => '小計',
            'method' => 'getSubtotal'
        ),
        3 => array(
            'code' => 'shipping',
            'title' => '配送 (送料)',
            'method' => 'getShippingAmount'
        ),
        9 => array(
            'code' => 'total',
            'title' => '合計金額',
            'method' => 'getGrandTotal'
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | SQL Data
    |--------------------------------------------------------------------------
    | Example :
    |    'sql_data' => array(
    |       'order_status' => 'order_status.sql'
    |   )
    |
    | place order_status.sql inside sql folder
    */
    'sql_data' => array(
    ),
    /*
    |--------------------------------------------------------------------------
    | Mapping Data
    |--------------------------------------------------------------------------
    */
    'mapping_data' => array(
        'order_status' => array(
        ),
    ),
);
