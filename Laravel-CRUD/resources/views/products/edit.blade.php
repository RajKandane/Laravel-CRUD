<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update a Product</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <h1 >Edit a Product</h1>
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


    <form method="post" action="{{route('product.update', ['product' => $product])}}">
        @csrf 
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />
        </div>
        <div class="form-group">
            <label>Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}" />
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}" />
        </div>
        <div class="form-group">
            <input type="submit" value="Update"  class="btn btn-edit" />
        </div>

        <div class="form-group">
            <a href="{{ route('product.index') }}" class="btn btn-back">Go Back</a>
        </div>

    </form>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>