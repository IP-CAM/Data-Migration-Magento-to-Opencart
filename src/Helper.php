<?php

class Helper
{
    /***
     * @param Config $config
     * @param string $src
     *
     * @return string
     */
    public static function getProductImage(Config $config, $src)
    {
        if (!$src) {
            return $src;
        }
        $source = $config->get('magento_url_source') . $config->get('image_magento_product_path') . $src;
        $destination = $config->get('image_oc_product_path') . basename($src);

        return self::downloadSource($config, $source, $destination);
    }

    /***
     * @param Config $config
     * @param string $src
     *
     * @return string
     */
    public static function getCategoryImage(Config $config, $src)
    {
        if (!$src) {
            return $src;
        }
        $source = $config->get('magento_url_source') . $config->get('image_magento_category_path') . $src;
        $destination = $config->get('image_oc_category_path') . basename($src);

        return self::downloadSource($config, $source, $destination);
    }

    /**
     * @param Config $config
     * @param string $url
     * @param string $path
     * @param bool $overwrite
     * @return string
     */
    public static function downloadSource($config, $url, $path, $overwrite = false)
    {
        //return $path;
        $base_path = self::updateFileName($config->get('oc_base_path_image') . $path);

        $image_name= basename($url);
        if(file_exists($base_path.$image_name) && !$overwrite) {
            return $path.$image_name;
        }
        $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
        $headers[] = 'Connection: Keep-Alive';
        $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
        $user_agent = 'php';
        $process = curl_init($url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_HEADER, 0);
        curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
        $image = curl_exec($process);
        curl_close($process);

        $dir_name = dirname($base_path);
        if (!is_dir($dir_name))
        {
            mkdir($dir_name, 0755, true);
        }

        file_put_contents($base_path, $image);

        return $path;
    }

    private static function updateFileName($file)
    {
        $name = basename($file);
        $dir = dirname($file) .'/';
        $actual_name = pathinfo($name,PATHINFO_FILENAME);
        $original_name = $actual_name;
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        if (file_exists($file)) {
            $actual_name = (string)$original_name . microtime();
            $name = $actual_name.".".$extension;
        }

        return $dir . $name;

    }

    /**
     * @param Config $config
     * @param $text
     * @return mixed|string
     */
    public static function updateDescription($config, $text) {

        $text = stripslashes($text);
        foreach ($config->get('unwanted_strings') as $find => $replace) {
            $text = str_replace($find, $replace, $text);
        }
        $text = addslashes($text);

        return trim(preg_replace('/\s\s+/', ' ', $text));
    }

    /**
     * @param string $string
     * @return string
     */
    public static function stringToMethod($string)
    {
        $array = explode("_", $string);
        $new_values = array();
        foreach ($array as $item) {
            $new_values[] = ucfirst($item);
        }

        return 'get' . implode('', $new_values);
    }
}
