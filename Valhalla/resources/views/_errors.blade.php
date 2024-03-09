<div class="flash-error">
    <b>There are some errors in your submission:</b>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
