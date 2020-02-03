@extends('layouts.user')
@section('user')


<h1 style="text-align: center; padding: 15px 15px;">Our Services</h1>

   
<div class="card-deck">
	@foreach($services as $service)
  <div class="card">
    <img class="card-img-top" src="https://data.whicdn.com/images/65785511/original.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $service->service_name }}</h5>
      <p><strong>Price:</strong>&nbsp; {{ $service->price }}</p>
      <p class="card-text">{{ $service->description }}</p>
    </div>
    <div class="card-footer">
    	<a href="{{route('payment.checkout',$service->id)}}" class="btn btn-primary">Hire Photographer</a>
      
    </div>
  </div>

   @endforeach
  
  
</div>



<div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure want to hire photographer with pay?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <p><strong>Price:</strong>&nbsp; {{ $service->price }}</p>
                            <input type="hidden" name="deleteuser" class="deleteuser">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">pay</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


@endsection
