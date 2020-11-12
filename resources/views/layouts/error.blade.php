@if ($errors->any())
    <div class="alert alert-danger help-block">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span><br>
        @endforeach
    </div>
@endif