$(document).ready(function(){
        $(document).on('submit', '#login_form', function(e){
            e.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();
            var isValid = true;
        
            $.ajax({
                type:"POST",
                url: $('#url').val() + 'admin/login',
                data: new FormData(this),
                contentType:false,  
                processData:false, 
                beforeSend: function() {                    
                    $empty = $('form#login_form').find("input").filter(function() {
                        return this.value === "";
                    });
                    if($empty.length) {
                        $('#loginresponse').html('You must fill out all fields').fadeIn().delay(3000).fadeOut("slow");
                        return false;
                    }
                }, 
                success: function(data){
                    if(data){	
                       window.location ='product';
                    }else{
                        $('#login_form')[0].reset();
                        swal("Login Failed!", "Incorect Username or Password!", "error");
                        $('#loginresponse').html('Incorrect Username or Password').fadeIn().delay(3000).fadeOut("slow");
                    }
                }
            });
        });   
});    