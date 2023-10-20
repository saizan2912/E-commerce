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

            <form id="demo-form2" action="{{route('product.extraDetailsStore',$id)}}" method="post" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="title" name="title" value="{{@$product->ProductDetail->title}}" required=""  class="form-control col-md-7 col-xs-12">


                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_items">Total Items<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="total_items" value="{{@$product->ProductDetail->total_items}}"  name="total_items" required="" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3  col-sm-3 col-xs-12" for="description">Description<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="description" class="form-control col-md-7 col-xs-12" id="description" cols="" rows="5">{{@$product->ProductDetail->description}}</textarea>
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
