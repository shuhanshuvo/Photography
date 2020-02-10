@extends('layouts.user')
@section('user')

<br><br><br>



<!-- bkash -->
<form action="{{route('checkout')}}" method="POST" id="form" onsubmit="return validateForm();">
    @csrf
    <input type="hidden" name="amount" value="{{ $service->price }}">
    <!-- rocket -->
      <div class="form-check-inline">
         <label class="form-check-label" for="radio2">
          <input type="hidden" name="service_id" value="{{ $service->id }}">
         <input type="radio" class="form-check-input payment bkashCheck1" id="radio2" name="paymentMethod" value="bkash"  required="required"> 
         <button type="button" data-toggle="collapse" class="bkashCheck1" data-target="#bkash_rocket"> <img src="https://lh3.googleusercontent.com/t_AmjRLX3-4Aoss0ABhG28QvdQ760Fl3h3TLicJYWjQQutrgaZXfxD8ih1K3MeF6fA" class="img-responsive" class="" height="50px" width="50px"></button>
         </label>
      </div>
      <!-- rocket -->
      <div class="form-check-inline">
         <label class="form-check-label" for="radio3">
         <input type="radio" class="form-check-input payment bkashCheck2" id="radio3" name="paymentMethod" value="rocket" required="required">
         <button type="button" data-toggle="collapse" class="bkashCheck2" data-target="#bkash_rocket"> <img src="https://is4-ssl.mzstatic.com/image/thumb/Purple113/v4/c6/42/53/c642539e-b5ce-22a0-51f8-f356aae38606/source/512x512bb.jpg" class="img-responsive" height="50px" width="50px"></button>
         </label>
      </div>
      <!-- bank -->
      <div class="form-check-inline">
         <label class="form-check-label" for="radio4">
         <input type="radio" class="form-check-input payment bankCheck1" id="radio4" name="paymentMethod" value="bank" required="required">
         <button type="button" data-toggle="collapse" class="bankCheck1" data-target="#bank"> <img src="https://cdn0.iconfinder.com/data/icons/elasto-online-store/26/00-ELASTOFONT-STORE-READY_bank-512.png" class="img-responsive" height="50px" width="50px"></button>
         </label>
      </div>
      <!-- bank data-target -->
      <br><br>
  <!-- bkash data-target -->
      <div id="bkash_rocket" class="collapse card text-light bg-dark bkashdiv">
         <div class="card-footer text-muted">
            <p align="justify">Fillup below form."SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }}</b></p>
         </div>
         <div class="card-body bg-light text-info">
            <label class="" for="debit"> Sender Number</label>
            <input name="sender_number" class="number"  type="number" class="">&nbsp;&nbsp;&nbsp;
            <label class=""> Transaction ID</label>
            <input name="trx_id" class="trx" value="" type="text" class="">
         </div>
         <div class="card-footer text-muted">
            Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
         </div>
      </div>
   <!--    rocket -->
   <div id="bkash_rocket" class="collapse card text-light bg-dark rocketdiv">
         <div class="card-footer text-muted">
            <p align="justify">Fillup below form."SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }}</b></p>
         </div>
         <div class="card-body bg-light text-info">
            <label class="" for="debit"> Sender Number</label>
            <input name="sender_number"   type="number" class="">&nbsp;&nbsp;&nbsp;
            <label class=""> Transaction ID</label>
            <input name="trx_id" value="" type="text" class="">
         </div>
         <div class="card-footer text-muted">
            Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
         </div>
      </div>
    <div id="bank" class="collapse card text-light bg-dark bankDiv">
     <div class="card-footer text-muted">
        <p align="justify">Fillup below form.Also note that 5% Bank "SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }}</b></p>
     </div>
     <div class="card-body bg-light text-info">
        <p align="justify">Bank Account Number:<b>5415645641</b></p>
        <label class="">Bank Received No:</label>
        <input name="bank_number"  type="text">
     </div>
     <div class="card-footer text-muted">
        Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
     </div>
    </div>
      <br><br>
      <div class="submit">
         <button type="submit" id="submitbtn" class="btn btn-primary" >PLACE ORDER</button>
      </div>
   </form>
                        
<!-- <div id="paypal-button"></div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(document).ready(function()
{

   $('#submitbtn').click(function(e){
    e.preventDefault();
    var pay_data = $('.payment:checked').val();
    if (pay_data == "bkash") {

        var number = $('.number').val();
        var trx = $('.trx').val();

          if (number == "" && trx == "") {
           alert("Bank number must be filled out");
          }elseif(number == ""){

          }elseif(trx == ""){
            
          }else{
            
          }
    }

  })

});


  //   $('.bkashdiv').hide();
  //   $('.rocketdiv').hide();
  //   $('.bankDiv').hide();

  //     $('.bkashCheck1').click(function(){
  //       $('.bkashdiv').show();
  //       $('.rocketdiv').hide();
  //       $('.bankDiv').hide();
  //     })

  //     $('.bkashCheck2').click(function(){
  //       $('.bkashdiv').hide();
  //       $('.rocketdiv').show();
  //       $('.bankDiv').hide();
  //     })

  //     $('.bankCheck1').click(function(){
  //       $('.bankDiv').show();
  //       $('.bkashdiv').hide();
  //       $('.rocketdiv').hide();
        
  //     })
  // })
     
      // function bkashFunction() {
      //     var x = document.getElementById("bkashDiv");
      //     if (x.style.display === "none") {
      //       x.style.display = "block";
      //     }else{
      //       x.style.display = "none";
      //     }
      //   } 
      // function rocketFunction() {
      //   var x = document.getElementById("rocketDiv");
      //     if (x.style.display === "none") {
      //       x.style.display = "block";
      //     }else{
      //       x.style.display = "none";
      //     }
      // }  
      // function bankFunction() {
      //   var x = document.getElementById("bankhDiv");
      //     if (x.style.display === "none") {
      //       x.style.display = "block";
      //     }else{
      //       x.style.display = "none";
      //     }
      // } 




//  function validateForm() {
//    var bkash = document.forms["form"]["sender_number"].value;
//    var b_tran_id = document.forms["form"]["trx_id"].value;
//    var rocket = document.forms["form"]["sender_number"].value;
//    var r_tran_id = document.forms["form"]["trx_id"].value;
//    var bank = document.forms["form"]["bank_number"].value;

//    if (bkash == "") {
//     alert("sender number must be filled out");
//     if(paymentMethod==bkash){
//       return true;
//     }
//   }
//    if (b_tran_id == "") {
//     alert("transaction id must be filled out");
    
//   }

//     if (rocket == "") {
//     alert("sender number must be filled out");
//     if(paymentMethod==rocket){
//       return true;
//     }
    
//   }
//    if (r_tran_id == "") {
//     alert("transaction id must be filled out");
    
//   }

//    if (bank == "") {
//     alert("Bank number must be filled out");
    
//   }
//   return false;
// }


  // $(document).ready(function(){
  //   $('.bkashdiv').hide();
  //   $('.rocketdiv').hide();
  //   $('.bankDiv').hide();

  //     $('.bkashCheck1').click(function(){
  //       $('.bkashdiv').show();
  //       $('.rocketdiv').hide();
  //       $('.bankDiv').hide();
  //     })

  //     $('.bkashCheck2').click(function(){
  //       $('.bkashdiv').hide();
  //       $('.rocketdiv').show();
  //       $('.bankDiv').hide();
  //     })

  //     $('.bankCheck1').click(function(){
  //       $('.bankDiv').show();
  //       $('.bkashdiv').hide();
  //       $('.rocketdiv').hide();
        
  //     })
  // })
     
  //     function bkashFunction() {
  //         var x = document.getElementById("bkashDiv");
  //         if (x.style.display === "none") {
  //           x.style.display = "block";
  //         }else{
  //           x.style.display = "none";
  //         }
  //       } 
  //     function rocketFunction() {
  //       var x = document.getElementById("rocketDiv");
  //         if (x.style.display === "none") {
  //           x.style.display = "block";
  //         }else{
  //           x.style.display = "none";
  //         }
  //     }  
  //     function bankFunction() {
  //       var x = document.getElementById("bankhDiv");
  //         if (x.style.display === "none") {
  //           x.style.display = "block";
  //         }else{
  //           x.style.display = "none";
  //         }
  //     }    
</script>

@endsection
