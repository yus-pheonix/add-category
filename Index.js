$(document).ready(function () {
    $('#categoryAdd').on('submit',function(e){
        e.preventDefault();
        var err = true;
        var category = $('#inputCategory').val();
        var regex = /^[a-zA-Z ]*$/;
        if(!regex.test(category) || category === ""){
            $('#categoryErr').removeClass('d-none');
            $('#categoryErr').html('Please Enter valid Category');
            err = false;
        }else{
            $('#categoryErr').addClass('d-none');
            $('#categoryErr').html('');
        }

        if(err == true){
            $.ajax({
                url: "dataEnter.php",
                contentType: false,
                cache: false,
                processData:false,
                type: "post",
                data: new FormData(this),
            
                success: function(responce){
                  if(responce === '1'){
                    $('#success').removeClass('d-none');
                      $('#success').html('Data Entered Successfully');
                  }else{
                    $('#success').removeClass('d-none');
                    $('#success').html(responce);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
    
                    $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                    console.log('jqXHR:');
                    console.log(jqXHR);
                    console.log('textStatus:');
                    console.log(textStatus);
                    console.log('errorThrown:');
                    console.log(errorThrown);
                }
            });
        }
    });
});