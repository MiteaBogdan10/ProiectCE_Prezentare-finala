$(document).ready(function () {

     $(document).on('click','.increment-btn', function(e) {
            e.preventDefault();

            var qty = $(this).closest('.product-data').find('.input-qty').val();
            
            var value = parseInt(qty, 10);
            value - isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $(this).closest('.product-data').find('.input-qty').val(value);
            }
     });

     $(document).on('click','.decrement-btn', function(e) {
            e.preventDefault();

            var qty = $(this).closest('.product-data').find('.input-qty').val();
            
            var value = parseInt(qty, 10);
            value - isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $(this).closest('.product-data').find('.input-qty').val(value);
            }
     });
 
      $(document).on('click','.addToCartBtn', function(e) {
            e.preventDefault();

            var prod_qty = $('.input-qty').val();
            var prod_id = $(this).val();
            console.log(prod_qty, prod_id);

            $.ajax({
                method: "POST",
                url: "functions/handlecart.php",
                data: {
                  "prod_id": prod_id,
                  "prod_qty" : prod_qty,
                  "scope": "add"
                },
                success: function (response) {
                     
                      if(response == 201)
                      {
                         alertify.success("Product added to cart");
                      }
                      else if(response == "existing")
                      {
                         alertify.success("Product already in cart");
                      }
                      else if(response == 401)
                      {
                         alertify.success("Login to continue");
                      }
                      else if(response == 500)
                      {
                         alertify.success("Something went wrong");
                      }
                }
          });

     });

     $(document).on('click','.updateQty', function()
     { 
      var prod_qty = $(this).closest('.product-data').find('.input-qty').val();
      var prod_id = $(this).closest('.product-data').find('.prodId').val();
            console.log(prod_qty, prod_id);
            var prod_qty = $('.input-qty').val();

      $.ajax({
         method: "POST",
         url: "functions/handlecart.php",
                data: {
                  "prod_id": prod_id,
                  "prod_qty" : prod_qty,
                  "scope": "update"
                },
         dataType:"dataType",
         succes : function (response)
            {
               // alert(response);

            }
      })
   });

   $(document).on('click', 'deleteItem', function (){
      var cart_id = $(this).val();
      alert();

      $.ajax({
         method: "POST",
         url: "functions/handlecart.php",
                data: {
                  "cart_id": cart_id,
                  "scope": "delete"
                },
         dataType:"dataType",
         succes : function (response)
            {
               if(response == 200)
                      {
                         alertify.success("Item delete successfully");
                         $('#mycart').load(location.href + " #mycart");
                      }
                      else
                      {
                        alertify.success(response);
                      }

            }
      })
   });

});