<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Product</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>
    <h1 class = "margin-top: 20px">Create a Product</h1>
    <br>

<!-- ... -->
<div class="error-container">
    @if($errors->any())
    <ul class="error-list">
        @foreach($errors->all() as $error)
            <li class="error-item">{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
<!-- ... -->

<!-- ... -->
<div class="success-notification">
    @if(session()->has('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
</div>
<!-- ... -->




   
    <form method="post" action="{{route('product.store')}}">
    @csrf
    @method('post')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" />
    </div>
    <div class="form-group">
        <label for="qty">Qty</label>
        <input type="text" id="qty" name="qty" placeholder="Qty" />
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" id="price" name="price" placeholder="Price" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" placeholder="Description" />
    </div>
    <div class="form-group">
        <input type="submit" value="Save a New Product" class="btn btn-submit" />
    </div>

    <div class="form-group">
        <a href="{{ route('product.index') }}" class="btn btn-back">Go Back</a>
    </div>

</form>

    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>