<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $.ajax({
        url:'http://localhost:8000/api/posts',
        type:'GET' ,
        success: function(data){
            $('h1').html('Bem vindo!');            
        },
        error:function(){
            alert('nao autorizado');
        }
    });
</script>
</head>
</html>