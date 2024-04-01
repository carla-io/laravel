@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
    <div class="col-lg-4">
        <div class="box_main">
        <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
</div>
</div>
<div class="col-lg-8">
   <div class="box_main">
   <div class="product-info">
    <h4 class="shirt_text text-left">{{ $product -> product_name}}</h4>
      <p class="price_text text-left">Price  <span style="color: #262626;">Php {{$product -> price}}</span></p>
    </div>
    <div class="my-3 product-details">
       <p class="lead">{{$product->description }} </p>
     <ul class="py-2 bg-light">
       <li> Category - {{$product->product_category_name }} </li>
    </ul>
    </div>

    <div class="btn_main">
         <form action="{{ route('addproducttocart', $product -> id ) }}" method="POST"> 
            @csrf 
            <input type="hidden" value="{{$product -> id}}" name="product_id">
            <div class="form-group">
                <label for="product_quantity">How many pieces</label>
                <input class="form-control" type="number"  min='1' placeholder="1" name="product_qunatity">
            </div>
            <br>
            <input class="btn btn-warning" type="submit" value="Add To Cart">
         </form>
         <!-- <div class="btn btn-warning"><a href="#">Add To Cart</a></div> -->
         <!-- <div class="seemore_bt"><a href="{{route('singleproduct',$product->id)}}">See More</a></div> -->
   </div>


   </div>
</div>
</div>

</div>
@endsection()