@extends('layouts.admin')
@section('admin')

@section('css')

  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
@endsection
 

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                  <th class="th-sm">Order ID

                  </th>
                  <th class="th-sm">Service

                  </th>
                  <th class="th-sm">User Name

                  </th>
                  <th class="th-sm">Order status
                  </th>
                  <th class="th-sm">Payment Method

                  </th>
                  
                  <th class="th-sm">Amount

                  </th>
                      <th class="th-sm">Action

                  </th>
                   
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
            	@if($order->order_status =='2')
            		<td>{{ $order->id }}</td>
                  <td>{{ $order->service_name }}</td>
                  <td>{{ $order->first_name }}&nbsp;{{ $order->last_name }}</td>
                  <td>{{ $order->payment_method }}</td>
                  <td>
                  	{{ "Rejected" }}
                  </td>
                  <td>{{ $order->amount }}</td>
                  <td>
                    @if($order->order_status == 1)
                      <a href="{{url('admin/reject',$order->id)}}" class="btn btn-primary" ><i class="fas fa-times"></i></a>

                      @else
                      <a href="{{url('admin/approve',$order->id)}}" class="btn btn-primary" ><i class="fas fa-check"></i></a>
                      @endif
                      <a href="#" class="btn btn-primary" ><i class="fas fa-trash-alt"></i></a>
                  </td>
            	@endif
                 
            </tr>
            @endforeach
     
        </tbody>
        
    </table>



@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
