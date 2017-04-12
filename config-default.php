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
            'database' => 'opencart',
            'prefix' => 'oc_'
        ),
        'magento' => array(
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'magento',
            'prefix' => ''
        ),
    ),
    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    |
    */
    'language' => array(
        1 => "english",
        2 => "japan"
    ),

    'store' => array(
        'url' => 'https://www.store.dev',
        'name' => 'Store Name',
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
    'magento_url_source' => 'https://www.magento.dev',
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
            'title' => 'Sub Total',
            'method' => 'getSubtotal'
        ),
        3 => array(
            'code' => 'shipping',
            'title' => 'Shipping',
            'method' => 'getShippingAmount'
        ),
        9 => array(
            'code' => 'total',
            'title' => 'Total',
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
        'stock_status' => array(
            'in_stock' => 7,
            'out_of_stock' => 5,
            'is_shipping' => 1,
        ),
        'custom_field' => array(),
    ),
    /*
    |--------------------------------------------------------------------------
    | Store ID
    |--------------------------------------------------------------------------
    | This is not applicable for all magento, this is only want to solve my case.
    | My case is I want to use product attributes from store_id 2 if they have
    | attributes in store_id = 2
    |
    */
    'store_id' => 0,

   /*
   |--------------------------------------------------------------------------
   | Custom Field
   |--------------------------------------------------------------------------
   | Defined Magento attribute for opencart custom field
   |
   */
    'custom_field' => array(
        'customer' => array()
    ),
);
