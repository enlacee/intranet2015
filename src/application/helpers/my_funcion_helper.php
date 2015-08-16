<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('getPublicUrl'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function getPublicUrl()
    {   
            return base_url(PUBLIC_URL);
        }
    }
