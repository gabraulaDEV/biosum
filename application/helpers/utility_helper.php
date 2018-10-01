<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( ! function_exists('asset_url()'))
     {
       function asset_url()
       {
          return base_url().'assets/';
       }
     }

     if ( ! function_exists('asset_url_home()'))
     {
       function asset_url_home()
       {
          return base_url().'/assets/user/';
       }
     }
  ?>