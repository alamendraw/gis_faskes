<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
 
class Cloudinarylib {
    public function __construct()
    {
        // require APPPATH.'third_party/Cloudinary/vendor/autoload.php';
        require APPPATH.'third_party/Cloudinary/src/Cloudinary.php';
        require APPPATH.'third_party/Cloudinary/src/Uploader.php';
        require APPPATH.'third_party/Cloudinary/src/Api.php';
        require APPPATH.'third_party/Cloudinary/src/Error.php';

        \Cloudinary::config(array(
            "cloud_name" => "dwohvljcs",
            "api_key" => "746974453281849",
            "api_secret" => "UGeHhIuQV9PKjYTw9LbSinrVU48",
            "secure" => true 
        )); 
    }
}
