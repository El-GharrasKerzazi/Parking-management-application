@if ($errors->any())

<div class="row">
    <div class="col-6-md mx-auto">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
            
        @endforeach
    </div>
</div>

    
@endif