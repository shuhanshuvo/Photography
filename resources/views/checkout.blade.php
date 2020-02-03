@extends('layouts.user')
@section('user')

<style type="text/css">
      #paypalDiv {
        display: none;
      }
      #bkashDiv {
        width: 100%;
        padding: 10px 0;
        text-align: center;
        background-color: lightblue;
        margin-top: 8px;
        display: none;
      }
      #rocketDiv {
        width: 100%;
        padding: 10px 0;
        text-align: center;
        background-color: lightblue;
        margin-top: 8px;
        display: none;
      } 
      #bankhDiv {
        width: 100%;
        padding: 10px 0;
        text-align: center;
        background-color: lightblue;
        margin-top: 8px;
        display: none;
      }
    </style>
 <!-- Bkash -->


 <div>
     <!-- <p><strong>Service Name:<strong>&nbsp;{{ $service->service_name }}</strong></p> -->
     <!-- <p><strong>Price:</strong>&nbsp;{{ $service->price }}</p> -->
 </div>

  <form action="{{route('checkout')}}" method="POST">
    @csrf
           <div class="custom-control custom-radio ">
              <input id="debit" name="paymentMethod" value="b2" onclick="bkashFunction()" type="radio" class="custom-control-input" required="">
              <input type="hidden" name="service_id" value="{{ $service->id }}">
              <label class="custom-control-label" for="debit">Bkash</label>
              <div class="card text-center" id="bkashDiv">
                 <div class="card-header">
                    <p align="justify">Fillup below form.Also note that 2% bKash "SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }} </b></p>
                 </div>
                 <div class="card-body">
                    <label class="" for="debit">Bkash Sender Number</label>
                    <input name="bik_sender_num" type="number" class="">&nbsp;&nbsp;&nbsp;
                    <label class="">Bkash Transaction ID</label>
                    <input name="bkash_tran_id" value=""  type="text" class="">
                 </div>
                    <input type="hidden" name="amount"  value="{{ $service->price }}">
                 <div class="card-footer text-muted">
                    Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
                 </div>
              </div>
           </div>
           <!-- Rocket -->
           <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" value="r3" onclick="rocketFunction()" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="paypal">Rocket</label>
              <div class="card text-center" id="rocketDiv">
                 <div class="card-header">
                    <p align="justify">Fillup below form.Also note that 3% Rocket "SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk 1253.52</b></p>
                 </div>
                 <div class="card-body">
                    <label class="" for="debit">Rocket Sender Number</label>
                    <input name="roc_sender_num" type="number" class="">&nbsp;&nbsp;&nbsp;
                    <label class="">Rocket Transaction ID</label>
                    <input name="rocket_tran_id" value=""  type="text" class="">
                 </div>
                    <input type="hidden" name="amount"  value="{{ $service->price }}">
                 <div class="card-footer text-muted">
                    Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
                 </div>
              </div>
           </div>
           <!-- Bank -->
           <div class="custom-control custom-radio">
              <input id="bank" name="paymentMethod" value="b4" onclick="bankFunction()" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="bank">Bank</label>
              <div class="card text-center" id="bankhDiv">
                 <div class="card-header">
                    <p align="justify">Fillup below form.Also note that 5% Bank "SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk 1253.52</b></p>
                 </div>
                 <div class="card-body">
                    <p align="justify">Bank Account Number:<b>5415645641</b></p>
                    <label class="">Bank Received No:</label>
                    <input name="bank_rec_num" type="text">
                 </div>
                 <div class="card-footer text-muted">
                    Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
                 </div>
              </div>
           </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to Checkout</button>

</form>


<script>
     
      function bkashFunction() {
          var x = document.getElementById("bkashDiv");
          if (x.style.display === "none") {
            x.style.display = "block";
          }else{
            x.style.display = "none";
          }
        } 
      function rocketFunction() {
        var x = document.getElementById("rocketDiv");
          if (x.style.display === "none") {
            x.style.display = "block";
          }else{
            x.style.display = "none";
          }
      }  
      function bankFunction() {
        var x = document.getElementById("bankhDiv");
          if (x.style.display === "none") {
            x.style.display = "block";
          }else{
            x.style.display = "none";
          }
      }    
</script>

@endsection
