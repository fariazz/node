$(document).ready(function () {
    
    $(".to_main_page").click(function() {
        
        $(location).attr('href', '/');
    }); 
    
    $(function() {
	
	$(".date").datepicker({dateFormat: "yy-mm-dd"});
    });
    
    $('#show_more_info').click(function() {
        
        $('#more_info').fadeIn(); 
    }); 
    
    $('.delete_link').click(function() {
        
        return confirm('Are you sure?'); 
    }); 
    
    $('#reset_player_filter').click(function() {
        
        $(location).attr('href', '/playerList');
    }); 
    
    $('.other_location_radio').click(function() {

        $('.other_location').fadeIn(); 
    }); 
    
    
    
    
    
    
    
    
    
    
    
    $("#category_reselect").click(function() {
        
        $(".category_icon").fadeOut(); 
        $(".part_icon").fadeIn(); 
    }); 
    
    $("#show_search_fields").click(function() {
        
        $("#qr_list").fadeOut(); 
        $("#show_search_fields").fadeOut(); 
        $("#search_fields").fadeIn(); 
    }); 
    
    $('.deactivate').click(function() {
        
        return confirm('The page will not be public any more. Are you sure?');
    }); 
    
    $('.delete').click(function() {
        
        return confirm('The page will be delete forewer. Are you sure?');
    }); 
    
    $('.part_icon').click(function() {
        
        id = this.id; 
        
        $.ajax({

            url: "/ajax/getCategoryList/" + id,
            //type: "POST",
            //cache: false,
            dataType: "json",
            async: true, 

            success: function(msg) {

                $('.part_icon').fadeOut(); 
                //$('#' + id).fadeIn(); 
                $('#category_list').html(msg); 
            }
        }); 
    }); 
       
    $('#tryit').click(function() {
        
        $('.add_qr_invitation').fadeOut('fast'); 
        $('#add_qr_test').fadeIn('fast'); 
    }); 
    
    $('.paginationspan').click(function() {
        
        $('.paginationspan').fadeOut(); 
    }); 
        
    $('#country_list').change(function() {
        
        id = this.value; 

        $.ajax({

            url: "/ajax/getCountryCities/" + id,
            //type: "POST",
            //cache: false,
            dataType: "json",
            async: true, 

            success: function(msg) {

                if (msg == 'false') {
                    
                    $('#city_div').fadeOut(); 
                    $('#city_options').html(); 
                }
                else {

                    $('#city_options').html(msg); 
                    $('#city_div').fadeIn();  
                }
            }
        }); 
    }); 
    
    $('.category').change(function() {
        
        // all subcategory hide and disable 
        $('.subcategory').fadeOut(); 
        $('.subcategory_select').attr('disabled', 'disabled'); 
        
        // the selected subcategory show and enable 
        $('#list' + this.value).fadeIn(); 
        $('#select' + this.value).removeAttr('disabled'); 
    }); 
    
    //setTimeout(fade_out, 4000);

    function fade_out() {
        
        $("#saved").fadeOut().empty();
    }
}); 