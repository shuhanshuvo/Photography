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
                  
                  </th>
                  <th class="th-sm">Bkash Number

                  </th>
                  <th class="th-sm">Bkash Transaction ID

                  </th>
                  <th class="th-sm">Rocket Number
                  </th>
                  <th class="th-sm">Rocket Transaction ID

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
                  
                  <td>{{ $tran->bik_sender_num }}</td>
                  <td>{{ $tran->bkash_tran_id}}</td>
                  <td>{{ $tran->roc_sender_num}}</td>
                  <td>{{ $tran->rocket_tran_id}}</td>
                  <td>{{ $tran->bank_rec_num}}</td>
                  <td>{{ $tran->amount }}</td>
                  
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
