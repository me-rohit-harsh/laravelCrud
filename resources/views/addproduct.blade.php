<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product || Laravel Crud</title>
    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    @if($message= Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
    @endif
    <div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card p-5 mt-5 shadow">
                    <form method="POST" action="/store" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Add Product</h4>
                            <a href="{{route('products.allproduct')}}" class="btn btn-success"><i
                                    class="material-icons">&#xE147;</i>
                                <span>View All
                                    Employee</span></a>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label>Product Description</label>

                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" class="form-control" name="image">
                                @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif


                            </div>
                        </div>
                        <div class="modal-footer mt-2">
                            <input type="reset" class="btn btn-default" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    {{-- Bootstrap Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>