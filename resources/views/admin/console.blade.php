<form action="{{route('exec')}}" method="post">
    @csrf
    <label for="command">Command:</label>
    <div>
       php artisan <input type="text" value="{{old('command')}}" name="command">
        <button type="submit">Execute</button>
    </div>
</form>

@if(session('message'))
<p style="font-size: x-large; color: red">{{session('message')}}</p>
@endif