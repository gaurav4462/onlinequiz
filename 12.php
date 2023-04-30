<form>
  <input type="text" name="name" placeholder="Name">
  <input type="email" name="email" placeholder="Email">
  <input type="number" name="amount" placeholder="Amount">
  <input type="text" name="upi_id" placeholder="UPI ID">
  <button type="button" id="upi-button">Pay with UPI</button>
</form>

<script>
  document.getElementById('upi-button').addEventListener('click', function(e) {
    var name = document.getElementsByName('name')[0].value;
    var email = document.getElementsByName('email')[0].value;
    var amount = document.getElementsByName('amount')[0].value;
    var upi_id = document.getElementsByName('upi_id')[0].value;
    var transaction_id = Math.floor(Math.random() * 1000000000); // Generate a random transaction ID
    var payment_url = 'upi://pay?pa=' + upi_id + '&pn=' + name + '&tn=Test payment&am=' + amount + '&cu=INR&tr=' + transaction_id; // Construct the payment URL
    window.location.href = payment_url; // Redirect the user to the payment app
  });
</script>