@extends('admin.layout.layout')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Design <small>different form elements</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success"><strong>{{$message}}</strong>
            </div>
            @endif

            <form id="demo-form2" action="{{route('product.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Name<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="category_id" id="category_id" class="form-control com-sm-7 col-xs-12">
                            <option value="">Category Name</option>
                            @foreach ($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Product Price <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Product Image<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <div class="text-center">
                            
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>





            </form>
        </div>
    </div>
@endsection
