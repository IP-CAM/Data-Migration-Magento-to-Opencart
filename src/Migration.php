<?php

/**
 * Class Migration
 */
class Migration extends Model
{

    /**
     * @var int
     */
    const QUERY_LIMIT = 1000;

    /**
     * @var string
     */
    const M_PREFIX = '';
    /**
     * @var int
     */
    const LIMIT = 1;
    /**
     * @var int
     */
    const STORE_ID = 0;
    /**
     * @var int
     */
    const PRODUCT_TYPE_ID = 4;
    /**
     * @var int
     */
    const PRODUCT_ATTRIBUTE_SET_ID = 9;
    /**
     * @var int
     */
    const CATEGORY_TYPE_ID = 3;
    /**
     * @var int
     */
    const CATEGORY_ATTRIBUTE_SET_ID = 3;
    /**
     * @var int
     */
    const CUSTOMER_TYPE_ID = 1;
    /** @var int
     *
     */
    const ADDRESS_TYPE_ID = 2;
    /**
     * @var int
     */
    const CUSTOMER_ATTRIBUTE_SET_ID = 0;

    /**
     * @var int
     */
    const DEFAULT_LANGUAGE_ID = 1;
    /**
     * @var int
     */
    const DEFAULT_LAYOUT_ID = 0;
    /**
     * @var int
     */
    const DEFAULT_CUSTOMER_GROUP_ID = 1;
    /**
     * @var int
     */
    const DEFAULT_PRIORITY = 1;
    /**
     * @var string
     */
    const DATE_DEFAULT = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    const ATTRIBUTE_ID = 'attribute_id';

    /**
     * @var string
     */
    const VALUE = 'value';

    /**
     * @var string
     */
    const VALUE_ID = 'value_id';

    /**
     * @var string
     */
    const ATTRIBUTE_CODE = 'attribute_code';

    /**
     * @var string
     */
    const OC_PREFIX = "oc_";

    /**
     * @var string
     */
    const QUANTITY = "qty";

    /**
     * @var string
     */
    const IS_IN_STOCK = "is_in_stock";

    /**
     * @var int
     */
    const IN_STOCK = 7;

    /**
     * @var int
     */
    const OUT_OF_STOCK = 5;

    /**
     * @var int
     */
    const IS_SHIPPING = 1;

    /**
     * @var string
     */
    const PRODUCT_ATTRIBUTE_CODE = 'productAttributeCode';
    /**
     * @var string
     */
    const CATALOG_ATTRIBUTE_CODE = 'catalogAttributeCode';
    /**
     * @var string
     */
    const CUSTOMER_ATTRIBUTE_CODE = 'customerAttributeCode';
    /**
     * @var string
     */
    const ADDRESS_ATTRIBUTE_CODE = 'addressAttributeCode';

    /**
     * @var int
     */
    const VISIBILITY_NOT_VISIBLE    = 1;
    /**
     * @var int
     */
    const VISIBILITY_IN_CATALOG     = 2;
    /**
     * @var int
     */
    const VISIBILITY_IN_SEARCH      = 3;
    /**
     * @var int
     */
    const VISIBILITY_BOTH           = 4;

    /**
     * @var array
     */
    private $manufacturer = array();

    /**
     * @var array
     */
    private $last_order_id = 0;

    private $magento_regions = array();
    private $zones = array();
    private $order_status = array();
    private $currency = array();

    /**
     * Migration constructor.
     *
     * @param Config $config
     * @param bool $print
     */
    public function __construct(Config $config, $print = false)
    {
        parent::__construct($config, $print);
        $this->setAttributeCode(static::PRODUCT_TYPE_ID, self::PRODUCT_ATTRIBUTE_CODE);
        $this->setAttributeCode(static::CATEGORY_TYPE_ID, self::CATALOG_ATTRIBUTE_CODE);
        $this->setAttributeCode(static::CUSTOMER_TYPE_ID, self::CUSTOMER_ATTRIBUTE_CODE);
        $this->setAttributeCode(static::ADDRESS_TYPE_ID, self::ADDRESS_ATTRIBUTE_CODE);
        $this->regions();
    }

    private function regions()
    {
        $this->updateOcRegion();

        $sql = sprintf(
            "SELECT attribute_id, backend_type FROM eav_attribute WHERE attribute_code = '%s' AND entity_type_id = %d",
            'region',
            self::ADDRESS_TYPE_ID
        );

        $result = $this->singleQueryM($sql);

        if (isset($result['backend_type'])) {
            $sql = sprintf(
                "SELECT `value` from customer_address_entity_%s  where `attribute_id` = %d group by `value`;",
                $result['backend_type'],
                $result['attribute_id']
            );

            foreach ($this->queryM($sql) as $region) {
                $this->magento_regions[$region['value']] = $this->insertRegion($region['value']);
            }
        }
    }

    private function updateOcRegion()
    {
        $zones = array(
            'Aichi' => 'Aichi (愛知県)',
            'Akita' => 'Akita (秋田県)',
            'Aomori' => 'Aomori (青森県)',
            'Chiba' => 'Chiba (千葉県)',
            'Ehime' => 'Ehime (愛媛県)',
            'Fukui' => 'Fukui (福井県)',
            'Fukuoka' => 'Fukuoka (福岡県)',
            'Fukushima' => 'Fukushima (福島県)',
            'Gifu' => 'Gifu (岐阜県)',
            'Gumma' => 'Gumma (群馬県)',
            'Hiroshima' => 'Hiroshima (広島県)',
            'Hokkaido' => 'Hokkaido (北海道)',
            'Hyogo' => 'Hyogo (兵庫県)',
            'Ibaraki' => 'Ibaraki (茨城県)',
            'Ishikawa' => 'Ishikawa (石川県)',
            'Iwate' => 'Iwate (岩手県)',
            'Kagawa' => 'Kagawa (香川県)',
            'Kagoshima' => 'Kagoshima (鹿児島県)',
            'Kanagawa' => 'Kanagawa (神奈川県)',
            'Kochi' => 'Kochi (高知県)',
            'Kumamoto' => 'Kumamoto (熊本県)',
            'Kyoto' => 'Kyoto (京都府)',
            'Mie' => 'Mie (三重県)',
            'Miyagi' => 'Miyagi (宮城県)',
            'Miyazaki' => 'Miyazaki (宮崎県)',
            'Nagano' => 'Nagano (長野県)',
            'Nagasaki' => 'Nagasaki (長崎県)',
            'Nara' => 'Nara (奈良県)',
            'Niigata' => 'Niigata (新潟県)',
            'Oita' => 'Oita (大分県)',
            'Okayama' => 'Okayama (岡山県)',
            'Okinawa' => 'Okinawa (沖縄県)',
            'Osaka' => 'Osaka (大阪府)',
            'Saga' => 'Saga (佐賀県)',
            'Saitama' => 'Saitama (埼玉県)',
            'Shiga' => 'Shiga (滋賀県)',
            'Shimane' => 'Shimane (島根県)',
            'Shizuoka' => 'Shizuoka (静岡県)',
            'Tochigi' => 'Tochigi (栃木県)',
            'Tokushima' => 'Tokushima (徳島県)',
            'Tokyo' => 'Tokyo (東京都)',
            'Tottori' => 'Tottori (鳥取県)',
            'Toyama' => 'Toyama (富山県)',
            'Wakayama' => 'Wakayama (和歌山県)',
            'Yamagata' => 'Yamagata (山形県)',
            'Yamaguchi' => 'Yamaguchi (山口県)',
            'Yamanashi' => 'Yamanashi (山梨県)',
        );

        foreach ($zones as $key => $value)
        {
            $sql = "SELECT * FROM oc_zone WHERE `name` like '%{$key}%' AND country_id = 107";
            $region = $this->singleQueryOc($sql);
            if ($region['zone_id']) {
                $sql = "UPDATE oc_zone set `name` = '{$value}' WHERE zone_id = {$region['zone_id']}";
                $this->queryOC($sql);
                $this->zones[$region['zone_id']] = $value;
            }
        }
    }

    private function insertRegion($region_name)
    {
        if (isset($this->magento_regions[$region_name]) && $this->magento_regions[$region_name] > 0) {
            return $this->magento_regions[$region_name];
        }

        $region_id = 0;
        $match = 0;
        foreach ($this->zones as $zone_id => $zone) {
            similar_text($zone, $region_name, $percent);
            if ($percent > $match) {
                $match = $percent;
                $region_id = $zone_id;
            }
        }

        return $region_id;
    }

    /**
     * php index.php --module=migration --action=all
     */
    public function all()
    {
        $this->importProducts();
        $this->importCustomers();
        $this->importOrder();
        $this->importPage();
    }

    /**
     * php index.php --module=migration --action=importOrder
     */
    public function importOrder()
    {
        $orders = $this->getOrders();
        $this->setOrderStatus();
        $this->setCurrency();

        $tables = array(
            'order' => static::OC_PREFIX . 'order',
            'order_product' => static::OC_PREFIX . 'order_product',
            'order_total' => static::OC_PREFIX . 'order_total',
            'order_history' => static::OC_PREFIX . 'order_history',
        );

        $this->truncate($tables);
        while(count($orders->getItems()) > 0) {
            $this->insertOrder($tables, $orders);
            $orders = $this->getOrders();
        }
    }

    /**
     * php index.php --module=migration --action=importCustomers
     */
    public function importCustomers()
    {
        $customers = $this->getCustomers();
        $addresses = $this->getAddresses();
        $this->insertCustomer($customers);
        $this->insertAddress($addresses);
    }

    /**
     * php index.php --module=migration --action=importProducts
     */
    public function importProducts()
    {
        $products = $this->getProducts();
        $categories = $this->getCategories();
        $this->insertCategory($categories);
        $this->insertProduct($products);
    }

    /**
     * php index.php --module=migration --action=importPage
     */
    public function importPage()
    {
        $pages = $this->getPage();
        $this->insertPage($pages);
    }

    /**
     * @param $table
     * @param $type_id
     * @param $attribute_set_id
     * @return mixed
     */
    private function getEntity($table, $type_id, $attribute_set_id)
    {
        $sql = sprintf(
            "SELECT * FROM %s WHERE %s AND %s",
            $table,
            'entity_type_id = ' .  $type_id,
            'attribute_set_id = ' .  $attribute_set_id
        );
        return $this->queryM($sql);
    }

    /**
     * @return CategoryCollection
     */
    private function getCategories()
    {
        $type_id = static::CATEGORY_TYPE_ID;
        $attribute_set_id = static::CATEGORY_ATTRIBUTE_SET_ID;
        $entities =  $this->getEntity('catalog_category_entity', $type_id, $attribute_set_id);
        $collection = new CategoryCollection();
        foreach ($entities as $data) {
            $item = new Category($data);
            $attribute = $this->getAttributeType(
                'catalog_category',
                $item->getEntityId(),
                $type_id,
                self::CATALOG_ATTRIBUTE_CODE
            );
            $item->setAttribute($attribute);
            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     * @return ProductCollection
     */
    private function getProducts()
    {
        $type_id = static::PRODUCT_TYPE_ID;
        $attribute_set_id = static::PRODUCT_ATTRIBUTE_SET_ID;
        $entities = $this->getEntity('catalog_product_entity', $type_id, $attribute_set_id);
        $collection = new ProductCollection();
        foreach ($entities as $data) {
            $item = new Product($data);
            $attribute = $this->getAttributeType(
                'catalog_product',
                $item->getEntityId(),
                $type_id,
                self::PRODUCT_ATTRIBUTE_CODE
            );
            $item->setAttribute($attribute);
            list($quantity, $quantity_status) = $this->getQuantity($item->getEntityId());
            $item->setStock($quantity, $quantity_status);
            $collection->addItem($item, $item->getEntityId());
        }

        return $collection;
    }

    /**
     * @param $product_id
     * @return array
     */
    private function getQuantity($product_id) {
        $quantity = array(0, 0);
        $sql = sprintf(
            "SELECT %s, %s FROM cataloginventory_stock_item WHERE product_id = %d",
            self::QUANTITY,
            self::IS_IN_STOCK,
            $product_id
        );
        if ($result = $this->singleQueryM($sql)) {
            $quantity = array($result[self::QUANTITY], $result[self::IS_IN_STOCK]);
        }
        return $quantity;
    }

    /**
     * @param CategoryCollection $collection
     */
    private function insertCategory(CategoryCollection $collection) {
        $table = array(
            'category' => static::OC_PREFIX . 'category',
            'category_description' => static::OC_PREFIX . 'category_description',
            'category_path' => static::OC_PREFIX . 'category_path',
            'category_to_layout' => static::OC_PREFIX . 'category_to_layout',
            'category_to_store' => static::OC_PREFIX . 'category_to_store',
            'url_alias' => static::OC_PREFIX . 'url_alias',
        );
        $this->truncate($table);
        /** @var Category $item */
        foreach ($collection->getItems() as $item) {
            /**
             * Insert Category
             */
            $image = Helper::getCategoryImage($this->config, $item->getImage());
            $fields = "category_id, image, parent_id, top, `column`, sort_order, status, date_added, date_modified";
            $values = sprintf(
                "%d, '%s', %d, %d, %d, %d, %d, '%s', '%s'",
                $item->getEntityId(),
                $image,
                $item->getParentId(),
                ($item->getParentId()) ? 0: 1,
                0,
                $item->getPosition(),
                $item->getIsActive(),
                $item->getCreatedAt(),
                $item->getUpdatedAt()
            );
            $this->insert($table['category'], $values, $fields);

            /**
             * Insert Category Description
             */
            $fields = "category_id, language_id, name, description, meta_title, meta_description, meta_keyword";
            $values = sprintf(
                "%d, %d, '%s', '%s', '%s', '%s', '%s'",
                $item->getEntityId(),
                static::DEFAULT_LANGUAGE_ID,
                $item->getName(),
                $item->getDescription(),
                $item->getMetaTitle(),
                $item->getDescription(),
                $item->getMetaKeywords()
            );
            $this->insert($table['category_description'], $values, $fields);

            /**
             * Insert Category Path
             */
            $fields = "category_id, path_id, level";
            $values = sprintf(
                "%d, %d, %d",
                $item->getEntityId(),
                $item->getEntityId(),
                1
            );
            $this->insert($table['category_path'], $values, $fields);

            /**
             * Insert Category Layout
             */
            $fields = "category_id, store_id, layout_id";
            $values = sprintf(
                "%d, %d, %d",
                $item->getEntityId(),
                0,
                0
            );
            $this->insert($table['category_to_layout'], $values, $fields);

            /**
             * Insert Category Store
             */
            $fields = "category_id, store_id";
            $values = sprintf(
                "%d, %d",
                $item->getEntityId(),
                0
            );
            $this->insert($table['category_to_store'], $values, $fields);

            /**
             * Insert category url alias
             */
            if ($item->getUrlPath()) {
                $fields = "query, keyword";
                $values = sprintf(
                    "'%s', '%s'",
                    'category_id=' . $item->getEntityId(),
                    $item->getUrlPath()
                );
                $this->insert($table['url_alias'], $values, $fields);
            }
        }
    }

    /**
     * @param ProductCollection $productCollection
     */
    private function insertProduct(ProductCollection $productCollection) {
        /** @var  Product $product */
        $table = array(
            'product' => static::OC_PREFIX . 'product',
            'product_description' => static::OC_PREFIX . 'product_description',
            'product_image' => static::OC_PREFIX . 'product_image',
            'product_to_store' => static::OC_PREFIX . 'product_to_store',
            'product_to_layout' => static::OC_PREFIX . 'product_to_layout',
            'product_reward' => static::OC_PREFIX . 'product_reward',
            'product_special' => static::OC_PREFIX . 'product_special',
            'product_discount' => static::OC_PREFIX . 'product_discount',
            'product_related' => static::OC_PREFIX . 'product_related',
            'product_to_category' => static::OC_PREFIX . 'product_to_category',
            'review' => static::OC_PREFIX . 'review',
            'product_attribute' => static::OC_PREFIX . 'product_attribute',
        );
        $this->truncate($table);
        $this->createAttribute();
        $this->createManufacture($productCollection);
        foreach ($productCollection->getItems() as $product) {
            $stock_status_id = ($product->getIsInStock()) ? self::IN_STOCK : self::OUT_OF_STOCK;
            $is_shipping = self::IS_SHIPPING;
            $subtract = 1;
            $minimum = 1;
            //$manufacturer = ($product->getManufacturer()) ? $product->getManufacturer() : 0;
            $manufacturer = 0;
            if ($short_des = $product->getShortDescription()) {
                $manufacturer = isset($this->manufacturer[$short_des]) ?
                    $this->manufacturer[$short_des] : 0;
            }

            $price = ($product->getPrice()) ? $product->getPrice() : 0;
            $status = ($product->getStatus()) ? $product->getStatus() : 0;

            $image = Helper::getProductImage($this->config, $product->getImage());
            $views = $this->getProductViews($product->getEntityId());
            /**
             * Insert product
             */
            $fields = "product_id, model, sku, quantity, stock_status_id, manufacturer_id, shipping, price, points," .
                "subtract,minimum,status,date_added,date_modified, width, image, viewed";
            $values = "{$product->getEntityId()}, '{$product->getEntityId()}', '{$product->getSku()}', " .
                "{$product->getQuantity()}, {$stock_status_id}, {$manufacturer}, " .
                "{$is_shipping}, {$price}, {$price}, {$subtract}, {$minimum}, " .
                "{$status}, '{$product->getCreatedAt()}', '{$product->getUpdatedAt()}', {$product->getWeight()},
                '{$image}', {$views}";
            $this->insert($table['product'], $values, $fields);

            /**
             * Insert Product Desc
             */
            $language_id = self::DEFAULT_LANGUAGE_ID;
            $fields = "product_id, language_id, name, description, tag, meta_title, meta_description, meta_keyword";
            $description = Helper::updateDescription($this->config, $product->getDescription());
            $values = "{$product->getEntityId()}, {$language_id}, '{$product->getName()}', '{$description}',".
                "'', '{$product->getMetaTitle()}', '{$product->getMetaDescription()}', '{$product->getMetaKeyword()}'";
            $this->insert($table['product_description'], $values, $fields);

            /**
             * Insert product images
             */
            $product_images = $this->getProductImage($product->getEntityId());
            /** @var  ProductImage $product_image */
            foreach ($product_images->getItems() as $product_image) {
                $position = ($product_image->getPosition()) ? $product_image->getPosition() : 0;
                $image = Helper::getProductImage($this->config, $product_image->getValue());
                $fields = "product_id, image, sort_order";
                $values = "{$product->getEntityId()}, '{$image}', {$position}";
                $this->insert($table['product_image'], $values, $fields);
            }

            /**
             * Insert product to store
             */
            $fields = "product_id, store_id";
            $values = "{$product->getEntityId()}, " . static::STORE_ID;
            $this->insert($table['product_to_store'], $values, $fields);

            /**
             * Insert product to layout
             */
            $fields = "product_id, store_id, layout_id";
            $values = "{$product->getEntityId()}, " . static::STORE_ID . ", " . static::DEFAULT_LAYOUT_ID;
            $this->insert($table['product_to_layout'], $values, $fields);

            /**
             * Insert product reward
             */
            $reward = ROUND(($product->getPrice()/100), 0);
            $fields = "product_id, customer_group_id, points";
            $values = "{$product->getEntityId()}, " . static::DEFAULT_CUSTOMER_GROUP_ID . ", " . $reward;
            $this->insert($table['product_reward'], $values, $fields);

            /**
             * Insert special price
             */
            if ( $product->getSpecialPrice() > 0) {
                $start = ($product->getSpecialFromDate()) ? $product->getSpecialFromDate() : static::DATE_DEFAULT;
                $fields = "product_id, customer_group_id, priority, price, date_start, date_end";
                $values = sprintf(
                    "%d, %d, %d, '%s', '%s', '%s'",
                    $product->getEntityId(),
                    static::DEFAULT_CUSTOMER_GROUP_ID,
                    static::DEFAULT_PRIORITY,
                    $product->getSpecialPrice(),
                    $start,
                    $product->getSpecialToDate()
                );
                $this->insert($table['product_special'], $values, $fields);
            }

            /**
             * Insert product discount
             */
            $tier_prices  = $this->getTierPrices($product->getEntityId());
            /** @var TierPrice $item */
            foreach ($tier_prices->getItems() as $item) {
                $start_date = static::DATE_DEFAULT;
                $end_date = static::DATE_DEFAULT;
                $fields = "product_id, customer_group_id, quantity, priority, price, date_start, date_end";
                $values = sprintf(
                    "%d, %d, %d, %d, '%s', '%s', '%s'",
                    $product->getEntityId(),
                    static::DEFAULT_CUSTOMER_GROUP_ID,
                    $item->getQty(),
                    $item->getQty(),
                    $item->getValue(),
                    $start_date,
                    $end_date
                );
                $this->insert($table['product_discount'], $values, $fields);
            }

            /**
             * Insert product related
             */
            $product_links  = $this->getProductLink($product->getEntityId());
            /** @var ProductLink $item */
            foreach ($product_links->getItems() as $item) {
                $fields = "product_id, related_id";
                $values = sprintf(
                    "%d, %d",
                    $item->getProductId(),
                    $item->getLinkedProductId()
                );
                $this->insert($table['product_related'], $values, $fields);
            }

            /**
             * Insert product url alias
             */
            if ($product->getUrlPath()) {
                $fields = "query, keyword";
                $values = sprintf(
                    "'%s', '%s'",
                    'product_id=' . $product->getEntityId(),
                    $product->getUrlPath()
                );
                $this->insert(static::OC_PREFIX . 'url_alias', $values, $fields);
            }

            /**
             * Insert product category
             */
            $product_categories  = $this->getProductCategory($product->getEntityId());
            /** @var ProductCategory $item */
            foreach ($product_categories->getItems() as $item) {
                $fields = "product_id, category_id";
                $values = sprintf(
                    "%d, %d",
                    $item->getProductId(),
                    $item->getCategoryId()
                );
                $this->insert($table['product_to_category'], $values, $fields);
            }
            /**
             * Insert product review
             */
            $product_review  = $this->getProductReview($product->getEntityId());
            /** @var ProductReview $item */
            foreach ($product_review->getItems() as $item) {
                $fields = "product_id, customer_id, author, text, rating, status, date_added, date_modified";
                $values = sprintf(
                    "%d, %d, '%s', '%s', %d, %d, '%s', '%s'",
                    $item->getEntityPkValue(),
                    $item->getCustomerId(),
                    $item->getNickname(),
                    $item->getDetail(),
                    0,
                    $item->getStatusId(),
                    $item->getCreatedAt(),
                    static::DATE_DEFAULT
                );
                $this->insert($table['review'], $values, $fields);
            }

            foreach ($this->config->get('product_attribute') as $key => $attr) {
                $method = Helper::stringToMethod($attr);
                if (method_exists(get_class($product), $method) && $product->{$method}()) {
                    $fields = "product_id, attribute_id, language_id, text";
                    $values = sprintf(
                        "%d, %d, %d, '%s'",
                        $product->getEntityId(),
                        $key,
                        1,
                        $product->{$method}()
                    );
                    $this->insert($table['product_attribute'], $values, $fields);
                }
            }

            //update manufacture/brand
        }
    }

    /**
     * @param $product_id
     * @return ProductCategoryCollection
     */
    private function getProductCategory($product_id)
    {
        $collection = new ProductCategoryCollection();
        $sql = sprintf(
            "SELECT * FROM %s WHERE `product_id` = %d",
            "catalog_category_product",
            $product_id
        );

        $result = $this->queryM($sql);

        foreach ($result as $v) {
            $item = new ProductCategory($v);
            $collection->addItem($item);

        }

        return $collection;
    }

    /**
     * @param $product_id
     * @return ProductLinkCollection
     */
    private function getProductLink($product_id)
    {
        $collection = new ProductLinkCollection();
        $sql = sprintf(
            "SELECT * FROM %s WHERE `product_id` = %d",
            "catalog_product_link",
            $product_id
        );

        $result = $this->queryM($sql);

        foreach ($result as $v) {
            $item = new ProductLink($v);
            $collection->addItem($item);

        }

        return $collection;
    }

    /**
     * @param $product_id
     * @return int
     */
    private function getProductViews($product_id)
    {
        $sql = sprintf(
            "SELECT %s FROM %s WHERE product_id = %d",
            'COUNT(*) views',
            'report_viewed_product_index',
            $product_id
        );

        $result = $this->singleQueryM($sql);


        return isset($result['views']) ? $result['views'] : 0;

    }

    /**
     * @param $product_id
     * @return ProductImageCollection
     */
    private function getProductImage($product_id)
    {
        $product_image_collection = new ProductImageCollection();

        $sql = sprintf(
            "SELECT %s FROM %s LEFT JOIN %s ON %s WHERE m.entity_id = %d AND v.store_id = %d",
            'm.value_id, m.value, v.position',
            'catalog_product_entity_media_gallery m',
            'catalog_product_entity_media_gallery_value v',
            'm.value_id = v.value_id',
            $product_id,
            0
        );

        $result = $this->queryM($sql);
        foreach ($result as $v) {
            $product_image = new ProductImage($v);
            $product_image_collection->addItem($product_image);
        }

        return $product_image_collection;

    }

    /**
     * @param $product_id
     * @return TierPriceCollection
     */
    private function getTierPrices($product_id)
    {
        $tier_prices_collection = new TierPriceCollection();
        $sql = sprintf(
            "SELECT %s, %s, %s FROM %s WHERE `entity_id` = %d",
            self::VALUE_ID,
            self::QUANTITY,
            self::VALUE,
            "catalog_product_entity_tier_price",
            $product_id
        );

        $result = $this->queryM($sql);

        foreach ($result as $v) {
            $tier_price = new TierPrice($v);
            $tier_prices_collection->addItem($tier_price);

        }

        return $tier_prices_collection;
    }

    /**
     * @param $prefix
     * @param $product_id
     * @param $type_id
     * @param $attribute_code
     * @param bool $is_store_id
     * @return array|mixed
     */
    private function getAttributeType($prefix, $product_id, $type_id, $attribute_code, $is_store_id = true)
    {
        $types = array(
            'datetime',
            'decimal',
            'gallery',
            'group_price',//does't have entity_type_id
            'int',
            'media_gallery',//does't have entity_type_id
            'text',
            'varchar',
        );
        $attributes = array();
        $attributes = $this->getAttribute($prefix, $product_id, $type_id, $types, $attributes, $attribute_code, $is_store_id);

        return $attributes;
    }

    /**
     * @param $type_id
     * @param $attribute_code
     */
    private function setAttributeCode($type_id, $attribute_code)
    {
        $sql = sprintf(
            "SELECT %s, %s FROM eav_attribute WHERE entity_type_id = %d",
            self::ATTRIBUTE_ID,
            self::ATTRIBUTE_CODE,
            $type_id
        );

        foreach ($this->queryM($sql) as $value) {
            $this->{$attribute_code}[$value[self::ATTRIBUTE_ID]] = $value[self::ATTRIBUTE_CODE];
        }
    }

    /**
     * @param $prefix
     * @param $product_id
     * @param $type_id
     * @param $types
     * @param $attributes
     * @return mixed
     */
    private function getAttribute($prefix, $product_id, $type_id, $types, $attributes, $attribute_code, $is_store_id)
    {
        foreach ($types as $type) {
            $sql = sprintf(
                "SELECT %s, %s, %s FROM %s WHERE entity_type_id = %d AND `entity_id` = %d",
                self::VALUE_ID,
                self::ATTRIBUTE_ID,
                self::VALUE,
                $prefix . "_entity_" . $type,
                $type_id,
                $product_id
            );

            if ($is_store_id) {
                $sql = sprintf(
                    "SELECT %s, %s, %s FROM %s WHERE entity_type_id = %d AND `entity_id` = %d AND store_id = %d",
                    self::VALUE_ID,
                    self::ATTRIBUTE_ID,
                    self::VALUE,
                    $prefix . "_entity_" . $type,
                    $type_id,
                    $product_id,
                    static::STORE_ID
                );
            }

            if ($result = $this->queryM($sql)) {
                foreach ($result as $v) {
                    $attribute_id = $v[self::ATTRIBUTE_ID];
                    if (isset($this->{$attribute_code}[$attribute_id])) {
                        $attributeKey = $this->{$attribute_code}[$attribute_id];
                        $attributes[$attributeKey][$v[self::VALUE_ID]] = $v[self::VALUE];
                    }
                }
            }
        }
        return $attributes;
    }

    /**
     * @param $product_id
     * @return ProductReviewCollection
     */
    private function getProductReview($product_id)
    {
        $sql = sprintf(
            "SELECT %s FROM %s r LEFT JOIN %s d ON %s WHERE entity_id = 1 AND `entity_pk_value` = %d",
            'r.review_id, r.created_at, d.title, d.detail, d.customer_id, d.nickname, r.status_id, r.entity_pk_value ',
            'review',
            'review_detail',
            'd.review_id = r.review_id',
            $product_id
        );

        $result = $this->queryM($sql);

        $collection = new ProductReviewCollection();
        foreach ($result as $v) {
            $item = new ProductReview($v);
            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     *
     */
    private function createAttribute()
    {
        $table = array(
            'attribute_group' => static::OC_PREFIX . 'attribute_group',
            'attribute_group_description' => static::OC_PREFIX . 'attribute_group_description',
            'attribute' => static::OC_PREFIX . 'attribute',
            'attribute_description' => static::OC_PREFIX . 'attribute_description',
        );

        $this->truncate($table);

        $fields = "attribute_group_id, sort_order";
        $values = "1, 1";
        $this->insert($table['attribute_group'], $values, $fields);

        $fields = "attribute_group_id, language_id, name";
        $values = "1, 1, '商品情報'";
        $this->insert($table['attribute_group_description'], $values, $fields);

        foreach ($this->config->get('product_attribute') as $key => $attr) {
            $fields = "attribute_id, attribute_group_id, sort_order";
            $values = "{$key}, 1, {$key}";
            $this->insert($table['attribute'], $values, $fields);

            $fields = "attribute_id, language_id, name";
            $values = "{$key}, 1, '{$attr}'";
            $this->insert($table['attribute_description'], $values, $fields);
        }
    }

    /**
     * @param ProductCollection $collection
     */
    private function createManufacture(ProductCollection $collection)
    {
        $table = array(
            'manufacturer' => static::OC_PREFIX . 'manufacturer',
            'manufacturer_to_store' => static::OC_PREFIX . 'manufacturer_to_store',
        );

        $this->truncate($table);
        $i = 0;
        /** @var Product $item */
        foreach ($collection->getItems() as $item) {
            if ($item->getShortDescription() && !isset($this->manufacturer[$item->getShortDescription()])) {
                $name = $item->getShortDescription();
                $i++;
                $fields = "manufacturer_id, name, image, sort_order";
                $values = "{$i}, '{$name}', '', 0";
                $this->insert($table['manufacturer'], $values, $fields);

                $fields = "manufacturer_id, store_id";
                $values = "{$i}, " . static::STORE_ID;
                $this->insert($table['manufacturer_to_store'], $values, $fields);

                $this->manufacturer[$name] = $i;
            }
        }
    }

    /**
     * @return CustomerCollection
     */
    private function getCustomers()
    {
        $type_id = static::CUSTOMER_TYPE_ID;
        $attribute_set_id = static::CUSTOMER_ATTRIBUTE_SET_ID;
        $entities = $this->getEntity('customer_entity', $type_id, $attribute_set_id);
        $collection = new CustomerCollection();
        foreach ($entities as $data) {
            $item = new Customer($data);
            $attribute = $this->getAttributeType(
                'customer',
                $item->getEntityId(),
                $type_id,
                self::CUSTOMER_ATTRIBUTE_CODE
            );
            $item->setAttribute($attribute);
            $collection->addItem($item, $item->getEntityId());
        }

        return $collection;
    }


    /**
     * @param int $customer_id
     * @return Customer
     */
    private function getCustomer($customer_id)
    {
        $sql = "SELECT entity_id FROM customer_entity WHERE entity_id = {$customer_id}";
        $result =  $this->singleQueryM($sql);
        $customer =  new Customer(array());
        $type_id = static::CUSTOMER_TYPE_ID;
        if ($result) {

            $customer =  new Customer($result);
            $attribute = $this->getAttributeType(
                'customer',
                $customer->getEntityId(),
                $type_id,
                self::CUSTOMER_ATTRIBUTE_CODE
            );

            $customer->setAttribute($attribute);
        }

        return $customer;
    }

    /**
     * @return CustomerAddress
     */
    private function getAddress($address_id)
    {
        $sql = "SELECT entity_id FROM customer_address_entity WHERE entity_id = {$address_id}";
        $result =  $this->singleQueryM($sql);
        $address =  new CustomerAddress(array());
        $type_id = static::ADDRESS_TYPE_ID;
        if ($result) {
            $address =  new CustomerAddress($result);
            $attribute = $this->getAttributeType(
                'customer_address',
                $address->getEntityId(),
                $type_id,
                self::ADDRESS_ATTRIBUTE_CODE,
                false
            );

            $address->setAttribute($attribute);
        }

        return $address;
    }



    /**
     * @param CustomerCollection $collection
     */
    private function insertCustomer(CustomerCollection $collection)
    {
        /** @var  Product $product */
        $table = array(
            'customer' => static::OC_PREFIX . 'customer',
            'customer_reward' => static::OC_PREFIX . 'customer_reward',
        );
        $this->truncate($table);

        /** @var Customer $item */
        foreach ($collection->getItems() as $item)
        {
            /**
             * Insert customer
             */
            $fields = "customer_id, customer_group_id, store_id, language_id, firstname, lastname, email, telephone," .
                "fax, password, salt, cart, wishlist, newsletter, address_id, custom_field, ip, status, approved," .
                "safe, token, code, date_added";
            $values = sprintf(
                "%d, %d, %d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, '%s'," .
                    "'%s', %d, %d, %d, '%s', '%s', '%s'",
                $item->getEntityId(),
                $item->getGroupId(),
                $item->getStoreId(),
                static::DEFAULT_LANGUAGE_ID,
                $item->getFirstname(),
                $item->getLastname(),
                $item->getEmail(),
                $item->getTelephone(),
                $item->getFax(),
                $item->getPasswordHash(),
                '',
                '',
                '',
                $item->getNewsletter(),
                '',
                '',
                '',
                $item->getIsActive(),
                1,
                1,
                '',
                '',
                $item->getCreatedAt()
            );
            $this->insert($table['customer'], $values, $fields);

            $rewardPoints = $this->getRewardPoints($item->getEntityId());
            /** @var RewardPointsTransaction $reward */
            foreach ($rewardPoints->getItems() as $reward) {
                $oder_id = ($reward->getOrderId()) ? $reward->getOrderId() : 0;
                $fields = 'customer_id, order_id, description, points, date_added';
                $values = "{$reward->getCustomerId()}, {$oder_id}, '{$reward->getTitle()}', 
                    {$reward->getPointAmount()}, '{$reward->getCreatedTime()}'";
                $this->insert($table['customer_reward'], $values, $fields);
            }
        }
    }

    private function getRewardPoints($customer_id)
    {
        $sql = sprintf(
            "SELECT * FROM %s WHERE customer_id = %d",
            'rewardpoints_transaction',
            $customer_id
        );

        $result = $this->queryM($sql);

        $collection = new RewardPointsTransactionCollection();
        foreach ($result as $v) {
            $item = new RewardPointsTransaction($v);
            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     * @return CustomerAddressCollection
     */
    private function getAddresses()
    {
        $type_id = static::ADDRESS_TYPE_ID;
        $attribute_set_id = static::CUSTOMER_ATTRIBUTE_SET_ID;
        $entities = $this->getEntity('customer_address_entity', $type_id, $attribute_set_id);
        $collection = new CustomerAddressCollection();
        foreach ($entities as $data) {
            $item = new CustomerAddress($data);
            $attribute = $this->getAttributeType(
                'customer_address',
                $item->getEntityId(),
                $type_id,
                self::ADDRESS_ATTRIBUTE_CODE,
                false
            );
            $item->setAttribute($attribute);
            $collection->addItem($item, $item->getEntityId());
        }

        return $collection;
    }

    /**
     * @param CustomerAddressCollection $collection
     */
    private function insertAddress(CustomerAddressCollection $collection)
    {
        /** @var  Product $product */
        $table = array(
            'address' => static::OC_PREFIX . 'address',
        );
        $this->truncate($table);

        /** @var CustomerAddress $item */
        foreach ($collection->getItems() as $item)
        {
            /**
             * Insert customer
             */
            $zone_id = 0;
            if (isset($this->magento_regions[$item->getRegion()])) {
                $zone_id = $this->magento_regions[$item->getRegion()];
            }

            $fields = "address_id, customer_id, firstname, lastname, company, address_1, address_2, city, postcode, " .
                "country_id, zone_id, custom_field";
            $values = sprintf(
                "%d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d, '%s'",
                $item->getEntityId(),
                $item->getParentId(),
                $item->getFirstname(),
                $item->getLastname(),
                $item->getCompany(),
                $item->getStreet(),
                $item->getRegion(),
                $item->getCity(),
                $item->getPostcode(),
                $item->getCountryId(),
                $zone_id,
                ''
            );

            $this->insert($table['address'], $values, $fields);
        }
    }

    private function getOrders()
    {
        $sql = sprintf(
            "SELECT * FROM %s WHERE entity_id > %d ORDER by entity_id ASC LIMIT %d",
            "sales_flat_order",
            $this->last_order_id,
            static::QUERY_LIMIT
        );

        $result = $this->queryM($sql);

        $collection = new SalesFlatOrderCollection();
        foreach ($result as $v) {
            $item = new SalesFlatOrder($v);
            $collection->addItem($item);
            $this->last_order_id = $item->getEntityId();
        }

        return $collection;
    }

    /**
     * @param array $tables
     * @param SalesFlatOrderCollection $collection
     */
    private function insertOrder($tables, SalesFlatOrderCollection $collection)
    {
        /** @var SalesFlatOrder $order */
        foreach ($collection->getItems() as  $order )
        {

            $customer = $this->getCustomer($order->getEntityId());
            $payment = $this->getAddress($order->getBillingAddressId());
            $shipping = $this->getAddress($order->getShippingAddressId());
            /**
             * Insert customer
             */

            $payment_zone_id = 0;
            if (isset($this->magento_regions[$payment->getRegion()])) {
                $payment_zone_id = $this->magento_regions[$payment->getRegion()];
            }
            $payment_zone = '';
            if (isset($this->zones[$payment_zone_id])) {
                $payment_zone =$this->zones[$payment_zone_id];
            }

            $shipping_zone_id = 0;
            if (isset($this->magento_regions[$shipping->getRegion()])) {
                $shipping_zone_id = $this->magento_regions[$shipping->getRegion()];
            }
            $shipping_zone = '';
            if (isset($this->zones[$shipping_zone_id])) {
                $shipping_zone =$this->zones[$shipping_zone_id];
            }

            $order_status_id = 0;
            if (isset($this->order_status[$order->getStatus()])) {
                $order_status_id = $this->order_status[$order->getStatus()];
            }

            $currency_id = 0;
            if (isset($this->currency[$order->getOrderCurrencyCode()])) {
                $currency_id = $this->currency[$order->getOrderCurrencyCode()];
            }

            $data = array(
                "order_id" => $order->getEntityId(),
                "invoice_no" => '',
                "invoice_prefix" => '',
                "store_id" => $order->getStoreId(),
                "store_name" => $order->getStoreName(),
                "store_url" => "https://www.genkipet.co/",
                "customer_id" => $order->getCustomerId(),
                "customer_group_id" => $order->getCustomerGroupId(),
                "firstname" => $order->getCustomerFirstname(),
                "lastname" => $order->getCustomerLastname(),
                "email" => $order->getCustomerEmail(),
                "telephone" => $customer->getTelephone(),
                "fax" => $customer->getFax(),
                "custom_field" => '',
                "payment_firstname" => $payment->getFirstname(),
                "payment_lastname" => $payment->getLastname(),
                "payment_company" => $payment->getCompany(),
                "payment_address_1" => $payment->getStreet(),
                "payment_address_2" => $payment->getRegion(),
                "payment_city" => $payment->getCity(),
                "payment_postcode" => $payment->getPostcode(),
                "payment_country" => $payment->getCountryId(),
                "payment_country_id" => $payment->getCountryId(),
                "payment_zone" => $payment_zone,
                "payment_zone_id" => $payment_zone_id,
                "payment_address_format" => "",
                "payment_custom_field" => "",
                "payment_method" => "",
                "payment_code" => "",
                "shipping_firstname" => $shipping->getFirstname(),
                "shipping_lastname" => $shipping->getLastname(),
                "shipping_company" => $shipping->getCompany(),
                "shipping_address_1" => $shipping->getStreet(),
                "shipping_address_2" => $shipping->getRegion(),
                "shipping_city" => $shipping->getCity(),
                "shipping_postcode" => $shipping->getPostcode(),
                "shipping_country" => $shipping->getCountryId(),
                "shipping_country_id" => $shipping->getCountryId(),
                "shipping_zone" => $shipping_zone,
                "shipping_zone_id" => $shipping_zone_id,
                "shipping_address_format" => "",
                "shipping_custom_field" => "",
                "shipping_method" => "",
                "shipping_code" => "",
                "comment" => "",
                "total" => $order->getGrandTotal(),
                "order_status_id" => $order_status_id,
                "affiliate_id" => '',
                "commission" => $order->getAffiliateCredit(),
                "marketing_id" => "",
                "tracking" => "",
                "language_id" => static::DEFAULT_LANGUAGE_ID,
                "currency_id" =>  $currency_id,
                "currency_code" =>  $order->getOrderCurrencyCode(),
                "currency_value" =>  1,
                "ip" =>  $order->getRemoteIp(),
                "forwarded_ip" =>  "",
                "user_agent" =>  "",
                "accept_language" =>  "",
                "date_added" =>  $order->getCreatedAt(),
                "date_modified" =>  $order->getUpdatedAt()
            );

            $this->insertArray($tables['order'], $data);


            /*
             * Insert order order
             */

            $order_items = $this->getOrderItems($order->getEntityId());

            $this->insertOrderProduct($tables['order_product'], $order_items);

           foreach ($this->config->get('order_total_codes') as $key => $value) {
               $data = array(
                   'order_id' => $order->getEntityId(),
                   'code' => $value['code'],
                   'title' => $value['title'],
                   'value' => $order->{$value['method']}(),
                   'sort_order' => $key
               );
               $this->insertArray($tables['order_total'], $data);
           }

           $order_history = $this->getOrderHistory($order->getEntityId());
           $this->insertOrderHistory($tables['order_history'], $order_history);
        }
    }

    /**
     * @param string $table
     * @param SalesFlatOrderStatusHistoryCollection $collection
     */
    private function insertOrderHistory($table, SalesFlatOrderStatusHistoryCollection $collection)
    {
        /** @var SalesFlatOrderStatusHistory $item */
        foreach ($collection->getItems() as $item) {
            $order_status_id = 0;
            if (isset($this->order_status[$item->getStatus()])) {
                $order_status_id = $this->order_status[$item->getStatus()];
            }
            $data = array(
                "order_id" => $item->getParentId(),
                "order_status_id" => $order_status_id,
                "notify" => $item->getIsCustomerNotified(),
                "comment" => $item->getEntityName(),
                "date_added" => $item->getCreatedAt(),
            );
            $this->insertArray($table, $data);
        }
    }
    /**
     * @param int $order_id
     * @return SalesFlatOrderStatusHistoryCollection
     */
    private function getOrderHistory($order_id)
    {
        $sql = sprintf(
            "SELECT * FROM %s WHERE parent_id = %d",
            "sales_flat_order_status_history",
            $order_id
        );

        $result = $this->queryM($sql);

        $collection = new SalesFlatOrderStatusHistoryCollection();
        foreach ($result as $v) {
            $item = new SalesFlatOrderStatusHistory($v);
            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     * @param int $order_id
     * @return SalesFlatOrderItemCollection
     */
    private function getOrderItems($order_id)
    {
        $sql = sprintf(
            "SELECT * FROM %s WHERE order_id = %d",
            "sales_flat_order_item",
            $order_id
        );

        $result = $this->queryM($sql);

        $collection = new SalesFlatOrderItemCollection();
        foreach ($result as $v) {
            $item = new SalesFlatOrderItem($v);
            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     * @param strin $table
     * @param SalesFlatOrderItemCollection $collection
     */
    private function insertOrderProduct($table, SalesFlatOrderItemCollection $collection)
    {
        /** @var SalesFlatOrderItem $item */
        foreach ($collection->getItems() as $item) {
            $data = array(
                "order_id" => $item->getOrderId(),
                "product_id" => $item->getProductId(),
                "name" => $item->getName(),
                "model" => $item->getSku(),
                "quantity" => $item->getQtyOrdered(),
                "price" => $item->getPrice(),
                "total" => $item->getRowTotal(),
                "tax" => $item->getTaxAmount(),
                "reward" => $item->getRewardpointsSpent(),
            );
            $this->insertArray($table, $data);
        }
    }

    private function getPage()
    {
        $sql = "SELECT * FROM cms_page";

        $result = $this->queryM($sql);

        $collection = new CmsPageCollection();
        foreach ($result as $v) {
            $item = new CmsPage($v);
            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     * @param CmsPageCollection $collection
     */
    private function insertPage(CmsPageCollection $collection)
    {

        $tables = array(
            'information' => static::OC_PREFIX . 'information',
            'information_description' => static::OC_PREFIX . 'information_description',
        );

        $this->truncate($tables);

        /** @var CmsPage $item */
        foreach ($collection->getItems() as $item) {
            $data = array(
                "information_id" => $item->getPageId(),
                "bottom" => 1,
                "sort_order" => $item->getSortOrder(),
                "status" => $item->getIsActive(),
            );
            $this->insertArray($tables['information'], $data);

            $data = array(
                "information_id" => $item->getPageId(),
                "language_id" => static::DEFAULT_LANGUAGE_ID,
                "title" => $item->getTitle(),
                "description" => $item->getContent(),
                "meta_title" => $item->getTitle(),
                "meta_description" => $item->getMetaDescription(),
                "meta_keyword" => $item->getMetaKeyword(),
            );

            $this->insertArray($tables['information_description'], $data);

            /**
             * Insert product url alias
             */
            $fields = "query, keyword";
            $values = sprintf(
                "'%s', '%s'",
                'information_id=' . $item->getPageId(),
                trim($item->getTitle()) . '.html'
            );

            $this->insert(static::OC_PREFIX . 'url_alias', $values, $fields);
        }
    }

    private function setOrderStatus()
    {
        $sql_data = $this->config->get('sql_data');

        if (isset($sql_data['order_status'])) {
            $this->truncate(array(static::OC_PREFIX . 'order_status'));
            $sql = file_get_contents('sql/' . $sql_data['order_status']);
            $this->queryOC($sql);
        }


        $sql = "SELECT * FROM " . static::OC_PREFIX . "order_status group by `name`";
        $result = $this->queryOC($sql);

        foreach ($result as $status) {
            $this->order_status[$status['name']] = $status['order_status_id'];
        }

        $mapping_data = $this->config->get('mapping_data');
        if (isset($mapping_data['order_status'])) {
            foreach ($mapping_data['order_status'] as $magento_status => $opencart_status) {
                if (isset($this->order_status[$opencart_status]) && !isset($this->order_status[$magento_status])) {
                    $this->order_status[$magento_status] = $this->order_status[$opencart_status];
                }
            }
        }
    }

    private function setCurrency()
    {
        $sql_data = $this->config->get('sql_data');

        if (isset($sql_data['currency'])) {
            $this->truncate(array(static::OC_PREFIX . 'currency'));
            $sql = file_get_contents('sql/' . $sql_data['currency']);
            $this->queryOC($sql);
        }

        $sql = "SELECT * FROM " . static::OC_PREFIX . "currency";
        $result = $this->queryOC($sql);

        foreach ($result as $currency) {
            $this->currency[$currency['code']] = $currency['currency_id'];
        }
    }
}
