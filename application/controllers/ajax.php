<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct() {
        
        parent::__construct(); 
    }
    
    /*public function getCountryCities($id) {

        $cityList = $this->city_model->getCountryCities($id); 
        //printit($cityList); exit(); 
        
        if (empty($cityList)) { 
            
            echo json_encode('false'); exit(); 
        }
        else { 
        
            // build html 
            $html = citylist($cityList); 
            echo json_encode($html); exit(); 
        }
    }

    public function getCategoryList($id) {

        $categoryList = $this->category_model->getCategoryByPart($id); 
        //printit($categoryList); exit(); 
        
        $html = "
            <script>
                $('.category_icon').click(function() {
                    id = this.id; 
                    $('.category_icon').fadeOut(); 
                    $('#' + id).fadeIn(); 
                    $('#find').fadeIn(); 
                    $('#category_id').val(id); 
                }); 
            </script>"; 
        $i = 0; 
        foreach ($categoryList as $item) {

            $html .= "<div class='category_icon' id='cat_{$item['id']}'><div class='category_icon2'><img src='".base_url()."www/img/menu_icon_example.png' /><br />{$item['name']}</div></div>"; 
            $i++; 
            if ($i == 4) {
                
                $html .= "<div style='clear: both; '></div>"; 
                $i = 0; 
            }
        }

        echo json_encode($html); exit(); 
    }*/
}