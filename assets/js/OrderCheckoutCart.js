$(document).ready(function() {
    // Function to calculate the total
    function calculateTotal() {
      let total = 0;
  
      // Iterate through each product row
      $('.product-row').each(function() {
        const price = parseFloat($(this).find('.product-price').text());
        const quantity = parseInt($(this).find('.product-quantity').val(), 10);
        const subtotal = (price * quantity).toFixed(2);
        $(this).find('.product-subtotal').text('₱' + subtotal);
       
        total += parseFloat(subtotal);
      
  
        $(this).find('.subtotal-input').val(subtotal);
      });
  
      // Check if the "Cash on Delivery" checkbox is checked
      if ($('#cod-checkbox').is(':checked')) {
        total += 10; // Add a shipping fee of 10 if the checkbox is checked
      }
      if ($('#gcash-checkbox').is(':checked')) {
        total += 10; // Add a shipping fee of 10 if the checkbox is checked
      }
  
      $('#totalInput').val(total);
   
      // Update the total in the HTML
      $('#total').text('₱' + total.toFixed(2));
    }
  
    // Calculate and display the total when the page loads
    calculateTotal();
  
    // Add an event listener to listen for changes to the input (quantity)
    $('.product-quantity').on('input', calculateTotal);
    $('#cod-checkbox').on('change', calculateTotal);
    $('#gcash-checkbox').on('change', calculateTotal);
    
  });
  
  function selectOnlyOne(checkbox) {
    const shippingFeeElement = $("#shippingFee");
  
    // Uncheck other checkboxes
    $('input[name="group"]').not(checkbox).prop('checked', false);
  
    // Update the visibility of the shipping fee based on the selected checkbox
    if (checkbox.checked) {
      shippingFeeElement.css('display', 'inline');
    } else {
      shippingFeeElement.css('display', 'none');
    }
  
    // Recalculate the total when a checkbox is selected/unselected
    calculateTotal();
  }
  
  