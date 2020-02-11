@extends('layouts.user')
@section('user')

   <br><br><br>
     
          <h5 class="section__heading card-header info-color white-text text-center py-4" style="
            background-color: #3ec396; !important; padding: .84rem 2.14rem;font-size: 2rem;">
            <strong style="" class="text-light"><i class="fas fa-user"></i> Payment info</strong>
          </h5>
          <hr class="mb-4">
          <form action="{{route('checkout')}}" method="post">
            @csrf
            
             <!-- bkash -->

            <input type="hidden" name="amount" value="{{ $service->price }}">
            <div class="form-check-inline">
               <label class="form-check-label" for="radio2">
               <input type="hidden" name="service_id" value="{{ $service->id }}">
               <input type="radio" class="form-check-input payment bkashCheck1" id="radio2" name="paymentMethod" value="bkash"  required="required"> 
               <button type="button" data-toggle="collapse" class="bkashCheck1" data-target="#bkash"> <img src="https://lh3.googleusercontent.com/t_AmjRLX3-4Aoss0ABhG28QvdQ760Fl3h3TLicJYWjQQutrgaZXfxD8ih1K3MeF6fA" class="img-responsive" class="" height="50px" width="50px"></button>
               </label>
            </div>

            <!-- rocket -->

            <div class="form-check-inline">
               <label class="form-check-label" for="radio3">
               <input type="radio" class="form-check-input payment rocketCheck2" id="radio3" name="paymentMethod" value="rocket" required="required">
               <button type="button" data-toggle="collapse" class="rocketCheck2" data-target="#rocket"> <img src="https://is4-ssl.mzstatic.com/image/thumb/Purple113/v4/c6/42/53/c642539e-b5ce-22a0-51f8-f356aae38606/source/512x512bb.jpg" class="img-responsive" class="img-responsive" height="50px" width="50px"></button>
               </label>
            </div>

            <!-- bank -->

            <div class="form-check-inline">
               <label class="form-check-label" for="radio4">
               <input type="radio" class="form-check-input payment bankCheck1" id="radio4" name="paymentMethod" value="bank" required="required">
               <button type="button" data-toggle="collapse" class="bankCheck1" data-target="#bank"> <img src="https://cdn0.iconfinder.com/data/icons/elasto-online-store/26/00-ELASTOFONT-STORE-READY_bank-512.png" class="img-responsive" height="50px" width="50px"></button>
               </label>
            </div>
            <br><br>


            <!-- bkash collaps -->


            <div id="bkash" class="collapse card text-light bg-dark formdiv">
               <div class="card-footer text-muted">
                  <p align="justify">Fillup below form."SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }} in Bkash</b></p>
               </div>
               <div class="card-body bg-light text-info">
                  <label class="" for="debit"> Sender Number</label>
                  <input name="sender_number"  type="number" class="number">&nbsp;&nbsp;&nbsp;
                  <label class=""> Transaction ID</label>
                  <input name="trx_id" value="" type="text" class="trx">
               </div>
               <div class="card-footer text-muted">
                  Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
               </div>
            </div>

            <!--rocket collaps-->

            <!-- <div id="rocket" class="collapse card text-light bg-dark rocketdiv">
               <div class="card-footer text-muted">
                  <p align="justify">Fillup below form."SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }} in Rocket</b></p>
               </div>
               <div class="card-body bg-light text-info">
                  <label class="" for="debit"> Sender Number</label>
                  <input name="sender_number"  type="number" class="rocnumber">&nbsp;&nbsp;&nbsp;
                  <label class=""> Transaction ID</label>
                  <input name="trx_id" value="" type="text" class="roctrx">
               </div>
               <div class="card-footer text-muted">
                  Your personal data will be used to process your order,support your experience throughout this website,and  for other purposes described in yopu <strong>privacy policy</strong>.
               </div>
            </div> -->


            <!-- bank collaps-->

            <div id="bank" class="collapse card text-light bg-dark bankDiv">
               <div class="card-footer text-muted">
                  <p align="justify">Fillup below form.Also note that 5% Bank "SEND MONEY" cost will be added with net price.Total amount you need to send us at <b>Tk {{ $service->price }}</b></p>
               </div>
               <div class="card-body bg-light text-info">
                  <p align="justify">Bank Account Number:<b>5415645641</b></p>
                  <label class="">Bank Received No:</label>
                  <input name="bank_number"  type="text" class="banknumber">
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
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>

    // validation
      $(document).ready(function(){
        $('#submitbtn').click(function(event) {
          // value atkano as like return value
        // event.preventDefault(); 
         var payment_type = $('.payment:checked').val();
         // console.log(payment_type); check value
         // bkash
         if(payment_type == "bkash") 
         {
          var bnumber = $('.number').val();
          var btrx = $('.trx').val();
          if(bnumber == "" && btrx == "") {
            alert('Please enter your Bkash/Trx number');
            return false;
          } else if(bnumber == "") {
            alert('Plese enter your Bkash No');
            return false;
          } else if(btrx == "") {
            alert('Plese enter your Trx No');
            return false;
          } else {
            return true;
          }
         }
         // rocket
         if(payment_type == "rocket") 
         {
          var bnumber = $('.number').val();
          var btrx = $('.trx').val();
          if(bnumber == "" && btrx == "") {
            alert('Please enter your Bkash/Trx number');
            return false;
          } else if(bnumber == "") {
            alert('Plese enter your Bkash No');
            return false;
          } else if(btrx == "") {
            alert('Plese enter your Trx No');
            return false;
          } else {
            return true;
          }
         }
         // bank
         if(payment_type == "bank") 
         {
          var number = $('.banknumber').val();
          if(number == "") {
            alert('Please enter your Bank receive number');
            return false;
          } else if(number == "") {
            alert('Plese enter your Bkash No');
            return false;
          } else {
            return true;
          }
         }
        });
      });

   // hide/show
   $(document).ready(function(){
     $('.formdiv').hide();
     // $('.rocketdiv').hide();
     $('.bankDiv').hide();
   
       $('.bkashCheck1').click(function(){
         $('.formdiv').show();
         // $('.rocketdiv').hide();
         $('.bankDiv').hide();
       })
   
       $('.rocketCheck2').click(function(){
         // $('.bkashdiv').hide();
         $('.formdiv').show();
         // $('.rocketdiv').show();
         $('.bankDiv').hide();
       })
   
       $('.bankCheck1').click(function(){
         $('.bankDiv').show();
          $('.formdiv').hide();
         // $('.bkashdiv').hide();
         // $('.rocketdiv').hide();
         
       })
   });   
</script>


@endsection
