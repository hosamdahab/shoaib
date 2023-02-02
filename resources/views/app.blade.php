<script>
$( document ).ready(function() {
    $('#login').on('submit',function(e){
         e.preventDefault();
         var email= $('#email').val();
         var password= $('#password').val();
         if(password !== '' && email!==''){
            $.ajax({
                url: "{{ Route('post.login') }}",
                method:'post',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'email':email,
                    'password':password,
                },
                success:function(rsp){
                    $('#button').html(`<div class="loader">Loading...</div>`);
                    if(rsp.status=='error'){
                        $('#button').html(`Login`);
                        Swal.fire(
                            'Incorrect data',
                            '',
                            'info'
                        )
                    }else if (rsp.status=='success'){
                        window.setTimeout(function(){
                            window.location.href = "{{ Route('dashboard.index') }}";
                        }, 1000);

                    }
                }
            });
        }
    });
 });
</script>