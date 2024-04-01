@extends('admin.layouts.template')

@section('page_title')
Feedback - ClickLock
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Feedback </h4>
                <h5 class="card-header">Feedbacks</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>id</th>
                        <th>Order id</th>
                        <th>Customer Name</th>
                        <th>Comment</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                           <td>1</td>
                           <td>Cp</td>
                           <td>12</td>
                           <td>Cp</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
@endsection