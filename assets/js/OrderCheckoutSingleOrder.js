$(document).ready(function() {
    // Get references to the quantity input, price, and subtotal elements
    const quantityInput = $("#quantity");
    const addonsInput = $("#addonsPrice"); // Assuming this is the element displaying addons price
    const priceElement = $("#price");
    const subtotalElement = $("#subtotal");
    const totalElement = $("#total");
  
    // Function to calculate subtotal
    function calculateSubtotal() {
      const quantity = parseInt(quantityInput.val(), 10);
      let total = 0;
  
      if (quantity < 1 || isNaN(quantity)) {
        quantityInput.val(1); // Reset to 1 if less than 1 or empty
      }
  
      const price = parseFloat(priceElement.text());
  
      let addonsTotal = 0;
      if (addonsInput !== null) {
        addonsTotal = parseFloat(addonsInput.text());
      }
  
      total = (quantity * price + addonsTotal).toFixed(2);
      totalElement.text(total);
      subtotalElement.text(total);
      $("#subtotalInput").val(total);
      $("#totalInput").val(total);
  
      if ($('#cod-checkbox').is(':checked')) {
        total = (parseFloat(total) + 10).toFixed(2); // Add a shipping fee of 10 if the checkbox is checked
      }
      if ($('#gcash-checkbox').is(':checked')) {
        total = (parseFloat(total) + 10).toFixed(2); // Add a shipping fee of 10 if the checkbox is checked
      }
  
      // Update the total again after adding shipping fees
      totalElement.text(total);
    }
  
    // Calculate and display subtotal when the page loads
    calculateSubtotal();
  
    // Add event listeners to listen for changes to the inputs
    quantityInput.on("input", calculateSubtotal);
    $('#cod-checkbox').on('change', calculateSubtotal);
    $('#gcash-checkbox').on('change', calculateSubtotal);
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
    
    }