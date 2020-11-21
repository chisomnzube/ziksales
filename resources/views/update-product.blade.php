<?php
  use App\Category;
  $categories = Category::all();
?>
@extends('layouts.app')
@section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Update product | {{config('app.name')}}</title>
    <script>
        function _(el)
          {
            return document.getElementById(el);
          }
        function uploadFile()
          {
              var file = _("file1").files[0];
              var formdata = new FormData();
              formdata.append("file1", file);
              var ajax = new XMLHttpRequest();

              ajax.upload.addEventListener("progress", progressHandler, false);
              ajax.addEventListener("load", completeHandler, false);
              ajax.addEventListener("error", errorHandler, false);
              ajax.addEventListener("abort", abortHandler, false);

              ajax.open("post", "{{ route('product.update', $product->id) }}");
              ajax.send(formdata);
          }  

        function progressHandler(event)
          {
              _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;

              var percent = (event.loaded / event.total) * 100;

              _("progressBar").value = Math.round(percent);
              _("status").innerHTML = Math.round(percent)+"% Uploaded please wait...";
          } 

        function completeHandler(event)
          {
              _("status").innerHTML = event.target.responseText;
              _("progressBar").value = 0;
          }

        function errorHandler(event)
          {
              _("status").innerHTML = "Upload Failed";
          }

        function abortHandler(event)
          {
              _("status").innerHTML = "Upload Aborted";
          }        
    </script>
  </head>
@endsection  
  
@section('main-content')

        <div class="col" id="main-content">
          @include('inc.messages')

          <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-12">
              <nav class="d-flex justify-content-center mb-4">
                
              </nav>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <form method="POST" action="{{ route('product.update', $product->id) }}" aria-label="" enctype="multipart/form-data"            id="upload_form">
                          @csrf
                        <div class="form-row">
                          @if($product->image != NULL)
                            <div class="form-group col-sm-6">
                              <label for="registerFirstName">Product Image</label>
                              <img src="{{ productImage($product->image) }}" alt="{!! $product->name !!}" class="card-img-top" width="200px" height="200px">
                            </div>
                          @endif 
                          @if($product->images != NULL)
                            <div class="form-group col-sm-6">
                              <label for="registerFirstName">Product Image</label>
                              @foreach( json_decode($product->images, true) as $image)
                                <img src="{{ productImage($image) }}" alt="{!! $product->name !!}" class="card-img-top">
                              @endforeach  
                            </div>
                          @endif  

                          <div class="form-group col-sm-12">
                            <label for="registerFirstName">Name of product</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="registerFirstName" name="name" value="{{ $product->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerConfirmPassword">Category</label>
                            <select name="category" class="form-control dynamic" id="category_id" data-dependent="name">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{ $category->id == $productCat->category_id ? 'selected' : '' }}> {{ $category->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerLastName">Sub-category</label>
                             <select name="subcategory" class="form-control" id="name" >
                                @foreach($subcategories as $subcategory)
                                  <option value="{{ $subcategory->id }}" {{ $subcategory->id == $productCat->categorySub_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                @endforeach  
                            </select>
                                
                          </div>
                          {{ csrf_field() }}
                          <div class="form-group col-sm-12">
                            <label for="registerFirstName">Short Details</label>
                            <input type="text"  class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" id="registerFirstName" name="details" value="{{ $product->details }}" required autofocus>
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                          </div>
                          
                          <div class="form-group col-sm-12">
                            <label for="registerprice">Price</label>
                            <input type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="registerprice" name="price" value="{{ $product->price }}" required>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="registerdescription">Description</label>
                             <textarea type="text"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="registerdescription" name="description" required autofocus>{{ $product->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="registerquantity">Quantity</label>
                            <input type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" id="registerquantity" name="quantity" value="{{$product->quantity}}" required>
                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="file1">Image</label>
                            <img src="" style="display: none;" height="150px" width="150px" id="image">
                            <input type="file" name="image" onchange="showImage.call(this)" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="file1"  >
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerimages">Image(<small>Optional</small>)</label>
                            <img src="" style="display: none;" height="150px" width="150px" id="preview">
                            <input type="file" name="images" onchange="showPreview.call(this)" class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" id="registerimages" >
                                @if ($errors->has('images'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                @endif
                          </div>

                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-success btn-block" onclick="uploadFile()">Upload Product</button>
                          </div>

                          <div class="form-group col-12">
                            <label>Progress Bar</label>
                            <progress id="progressBar" value="0" max="100" style="width:100%"></progress>
                              <h4 id="status"></h4>
                              <p id="loaded_n_total"></p>
                          </div>

                        </div>
                      </form>



                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

        </div>

        @endsection
      
@section('required-js')


    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
  <script>
    $(document).ready(function(){

      $('.dynamic').change(function(){
          if($(this).val() != '')
          {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{ route('dynamicdependent.fetch') }}",
              method:"POST",
              data:{select:select, value:value, _token:_token, dependent:dependent},
              success:function(result)
                {
                     $('#'+dependent).html(result);
                }

            })
          }
      });

    });



  function showImage()
    {
        if(this.files && this.files[0])
          {
              var obj = new FileReader();
              obj.onload = function(data){
                  var image = document.getElementById("image");
                  image.src = data.target.result;
                  image.style.display = "block";
                  
              }

              obj.readAsDataURL(this.files[0]);
          }
    }

     function showPreview()
      {
          if(this.files && this.files[0])
            {
                var objx = new FileReader();
                objx.onload = function(data){
                    var preview = document.getElementById("preview");
                    preview.src = data.target.result;
                    preview.style.display = "block";
                    
                }

                objx.readAsDataURL(this.files[0]);
            }
      }
  </script>

@endsection