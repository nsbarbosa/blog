<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $.ajax({
        url:'http://localhost:8000/public/oauth/token',
        type:'POST' ,
        data:{
            'grant_type' => 'password',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
            'username' => 'taylor@laravel.com',
            'password' => 'my-password',
        },
        sucess:function(data){
            window.localstorage.setItem('token',data.access_token);
            window.localstorage.setItem('refresh_token',data.refresh_token);
        }
    });
</script>
</head>
</html>