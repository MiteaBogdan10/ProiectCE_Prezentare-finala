<?php 

include('functions/userfunctions.php'); 
include('includes/header.php'); 
include('authenticate.php');
?>
  
<div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">
      <a href="index.php" class="text-white">
          Home / 
      </a> 
      <a href="checkoutphp" class="text-white">
          Checkout
      </a>
    </h6>
  </div>
</div>

<div class="py-5">
   <div class="container">
       <div class="card">
        <div class="card-body shadow">
              <form action="functions/placeorder.php" method="POST">
          <div class="row">
            <div class = "col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                  <label class="fw-bold ">Name</label>
                                  <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                  <label class="fw-bold">E-mail</label>
                                  <input type="email" name="email" required placeholder="Enter your email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                  <label class="fw-bold ">Phone</label>
                                  <input type="text" name="phone" required placeholder="Enter your phone number" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                  <label class="fw-bold ">Pin Code</label>
                                  <input type="text" name="pincode" required placeholder="Enter your pin code" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                  <label class="fw-bold ">Address</label>
                                  <textarea name="address" required class="form-control" rows="5"></textarea>
                            </div>
                        </div>
              </div>
              <div class="col-md-5">
                <h5>Order Details</h5>
                <hr>

                          <?php $items = getCartItems();  
                          $totalPrice = 0;
                          foreach($items as $citem)
                          {
                            ?>
                            <div class="mb-1 border">
                                <div class="row align-items-center">
                                      <div class="col-md-2">
                                            <img src="uploads/<?= $citem ['image'] ?>" alt="Image" width="60px">
                                      </div>
                                      <div class="col-md-5">
                                            <label><?= $citem ['name'] ?></label>
                                      </div>
                                      <div class="col-md-3">
                                            <label>$ <?= $citem ['selling_price'] ?></label>
                                      </div>
                                      <div class="col-md-2">
                                          <label>x <?= $citem['prod_qty'] ?></label>
                                      </div>
                                  </div>
                            </div>
                            <?php
                              $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                          }
                          ?>
                      <hr>
                      <h5>Total Price : <span class="float-end">$ <?=$totalPrice?> </span></h5>
                      <div class="">
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" name="placeOrderBtn" class="btn btn-primary">Confirm and place order</button>
                      <div id="paypal-button-container" class="mt-3"></div>
                      </div>
              </div>
              
          </div>
       </div>
   </div>   
</div>
    
    
<?php include('includes/footer.php'); ?>


<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AYMiTThPBFTaMIXZgqupM4IJFXHj9XqZTqIAXE-fH_1fg7pNdDZ6BDWwv-NrtlOiSOQZkWQ2GcEdJb-_&currency=USD"></script>


<script>
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?= $totalPrice ?> ' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>