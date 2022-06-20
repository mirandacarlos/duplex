<div id="login_wrapper">
    @if (session('login'))
    <p>{{ session('login') }}</p>
    @endif
    <form action="/login" method="POST" id="login_form">
        @csrf
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>
<script>
    $('#login_form').submit(function(){
        let form = $('#login_form');
        $.ajax({
            complete: function(response){
                $('#login_wrapper').html(response.responseText);
            },
            data: form.serialize(),
            method: 'POST',
            url: '/login'
        });
        return false;
    })
</script>