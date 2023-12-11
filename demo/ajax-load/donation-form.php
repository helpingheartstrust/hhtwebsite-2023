<section class="">
  <div class="container" style="max-width: 700px;">
    <h3 class="bg-theme-colored p-15 mb-0 text-white text-center">Donate us</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
          <form id="popup_paypal_donate_form_onetime_recurring">
            <div class="row">
              <div class="col-md-12">
                <img src="images/payment-card-logo-sm.html" alt="">                
              </div>             
              <div class="col-sm-12">
                <div class="form-group mb-20">
                  <label><strong class="text-center">Account Name:</strong> Helping Hearts Trust</label>                  
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-20">
                  <label><strong class="text-center">Account No:</strong> 500101011512871</label>                 
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-20">                 
                  <label><strong class="text-center">Bank Name:</strong> City Union Bank</label>                         
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-20">                  
                  <label><strong class="text-center">Branch Name:</strong> Gudiyatham Branch</label>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-20">                  
                  <label><strong class="text-center">IFSC Code:</strong> CIUB0000247</label>                  
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">Donate Now</button>
                </div>
              </div>
            </div>
          </form>
          
          <!-- Script for Donation Form Custom Amount -->
          <script type="text/javascript">
            $(document).ready(function(e) {
              var $donation_form = $("#popup_paypal_donate_form_onetime_recurring");
              //toggle custom amount
              var $custom_other_amount = $donation_form.find("#custom_other_amount");
              $custom_other_amount.hide();
              $donation_form.find("[name='amount']").change(function() {
                  var $this = $(this);
                  if ($this.val() == 'other') {
                    $custom_other_amount.show().append('<div class="input-group"><span class="input-group-addon">$</span> <input id="input_other_amount" type="text" name="amount" class="form-control" value="100"/></div>');
                  }
                  else{
                    $custom_other_amount.children( ".input-group" ).remove();
                    $custom_other_amount.hide();
                  }
              });

              //toggle donation_type_choice
              var $donation_type_choice = $donation_form.find("#donation_type_choice");
              $donation_type_choice.hide();
              $("input[name='payment_type']").change(function() {
                  if (this.value == 'recurring') {
                      $donation_type_choice.show();
                  }
                  else {
                      $donation_type_choice.hide();
                  }
              });


              // submit form on click
              $donation_form.on('submit', function(e){
                  //$( "#popup_paypal_donate_form-onetime" ).submit();
                  var item_name = $donation_form.find("select[name='item_name'] option:selected").val();
                  var currency_code = $donation_form.find("select[name='currency_code'] option:selected").val();
                  var amount = $donation_form.find("[name='amount']:checked").val();
                  var t3 = $donation_form.find("input[name='t3']:checked").val();

                  if ( amount == 'other') {
                    amount = $donation_form.find("#input_other_amount").val();
                  }

                  // submit proper form now
                  if ( $("input[name='payment_type']:checked", $donation_form).val() == 'recurring' ) {
                      var recurring_form = $('#popup_paypal_donate_form-recurring');

                      recurring_form.find("input[name='item_name']").val(item_name);
                      recurring_form.find("input[name='currency_code']").val(currency_code);
                      recurring_form.find("input[name='a3']").val(amount);
                      recurring_form.find("input[name='t3']").val(t3);

                      recurring_form.find("input[type='submit']").trigger('click');

                  } else if ( $("input[name='payment_type']:checked", $donation_form).val() == 'one_time' ) {
                      var onetime_form = $('#popup_paypal_donate_form-onetime');

                      onetime_form.find("input[name='item_name']").val(item_name);
                      onetime_form.find("input[name='currency_code']").val(currency_code);
                      onetime_form.find("input[name='amount']").val(amount);

                      onetime_form.find("input[type='submit']").trigger('click');
                  }
                  return false;
              });

            });
          </script>

          <!-- Paypal Onetime Form -->
          <form id="popup_paypal_donate_form-onetime" class="hidden" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="accounts@thememascot.com">

            <input type="hidden" name="item_name" value="Educate Children"> <!-- updated dynamically -->
            <input type="hidden" name="currency_code" value="USD"> <!-- updated dynamically -->
            <input type="hidden" name="amount" value="20"> <!-- updated dynamically -->

            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="cn" value="Comments...">
            <input type="hidden" name="tax" value="0">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="bn" value="PP-DonationsBF">
            <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html">
            <input type="hidden" name="cancel_return" value="http://www.yoursite.com/paymentcancel.html">
            <input type="hidden" name="notify_url" value="http://www.yoursite.com/notifypayment.php">
            <input type="submit" name="submit">
          </form>
          
          <!-- Paypal Recurring Form -->
          <form id="popup_paypal_donate_form-recurring" class="hidden" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick-subscriptions">
            <input type="hidden" name="business" value="accounts@thememascot.com">

            <input type="hidden" name="item_name" value="Educate Children"> <!-- updated dynamically -->
            <input type="hidden" name="currency_code" value="USD"> <!-- updated dynamically -->
            <input type="hidden" name="a3" value="20"> <!-- updated dynamically -->
            <input type="hidden" name="t3" value="D"> <!-- updated dynamically -->


            <input type="hidden" name="p3" value="1">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">
            <input type="hidden" name="no_shipping" value="0">
            <input type="hidden" name="no_note" value="1">                     
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="bn" value="PP-DonationsBF">
            <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html">
            <input type="hidden" name="cancel_return" value="http://www.yoursite.com/paymentcancel.html">
            <input type="hidden" name="notify_url" value="http://www.yoursite.com/notifypayment.php">
            <input type="submit" name="submit">
          </form>
          <!-- ===== END: Paypal Both Onetime/Recurring Form ===== -->
        </div>
      </div>
    </div>
  </div>
</section>