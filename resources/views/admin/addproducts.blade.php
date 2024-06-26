@extends('admin.layouts.template')

@section('page_title')
Add Product - ClickLock
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Add New Product</h5>
                      <small class="text-muted float-end">Input information</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="cellphone" />
                          </div>
                        </div>

                        
                      <form action="" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" placeholder="1200" />
                          </div>
                        </div>

                          <form action="" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" cols="20" rows="5" id="description" name = "description" placeholder="secondhand" >
                            </textarea>
                          </div>


                          <div class="row mb-3">
                         <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                        <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
                          <option selected>Select Product Category</option>
                          @foreach ( $categories as $category )
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                          @endforeach

                        </select>
                      </div>
                        
                     
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Product Image</label>
                        <div class="col-sm-10">
                        <input class="form-control" type="file" id="product_img" name="product_img"/>
                        </div>
                      </div>
                   

                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</div>
@endsection