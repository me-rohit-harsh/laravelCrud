<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product || Laravel CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Edit Modal HTML -->
    @if($message= Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/{{$product->id}}/update" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <a type="button" class="close btn" href="{{route('products.allproduct')}}">&times;</a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$product->name)}}">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control"
                            name="description">{{old('description',$product->description)}}</textarea>
                        @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="image">Product Image</label>
                                <input type="file" class="form-control" name="image">
                                @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label>Old Upload : </label>
                                <img src="/products/{{$product->image}}" alt="product-img" class="rounded-circle"
                                    width="100px" height="100px" style="border: 1px solid black">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" value="Cancel" href="{{route('products.allproduct')}}">Cancle</a>
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>

</body>

</html>