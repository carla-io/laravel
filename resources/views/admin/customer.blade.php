@extends('admin.layouts.template')

@section('page_title')
Customer - ClickLock
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Customers </h4>
                <h5 class="card-header">All Customers</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>id</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <!-- <th>description</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                             <td>1</td>
                             <td>Cellphone</td>
                             <td>1</td>
                             <!-- <td>100</td> -->
                             <td>
                              <a href="" class="btn btn-primary">Edit</a>
                              <a href=""  class="btn btn-warning">Delete</a>
                            </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
@endsection