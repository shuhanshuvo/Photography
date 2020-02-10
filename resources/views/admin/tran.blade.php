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
                  
                  <th class="th-sm">Payment Method
                  </th>
                  </th>
                  <th class="th-sm">Sender Number

                  </th>
                  <th class="th-sm">Transaction ID

                  </th>
                 
                  <th class="th-sm">Bank Number

                  </th>
                  <th class="th-sm">Amount

                  </th>
              
                
                   
            </tr>
        </thead>
        <tbody>
            @foreach ($trans as $tran)
            <tr>
                  
                  <td>{{ $tran->paymentMethod}}</td>
                  <td>{{ $tran->sender_number}}</td>
                  <td>{{ $tran->trx_id}}</td>
                  <td>{{ $tran->bank_number}}</td>
                  <td>{{ $tran->amount}}</td>
                 
                 
                  
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
