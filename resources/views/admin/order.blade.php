@extends('admin.layouts.template')

@section('page_title')
Order - ClickLock
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Orders </h4>
                <h5 class="card-header">All Products Available</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>id</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <!-- <th>Actions</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                           <td>1</td>
                           <td>asd</td>
                           <td>sad</td>
                           <td>12</td>
                           <td>12</td>
                           <td>24</td>
                           <td>malayq jan</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
@endsection