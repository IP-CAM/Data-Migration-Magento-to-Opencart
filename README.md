# Data Migration from Magento to OpenCart

## What data can be migrated from Magento to OpenCart?

 1. Products, product images, product extra fields, product attributes
 2. Categories, category images
 3. Customers, customer shipping address, customer billing address
 4. Orders, order statuses, order products
 5. Additional: SEO URLs, currencies, manufacturers, taxes

    
## How it works

 1. copy config-default.php to config.php
 2. Update config.php
 3. Run migration Command
     ```javascript
     php index.php --module=migration --action=all
  
     ```
