
<?php
session_start();
require_once('CreateDb.php');
  if(isset($_GET['orders'])){
    $orders=$_GET['orders'];
    $id = $_GET['id'];
    $_SESSION['orders']=$orders;
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Seed Store - Payment</title>
  <link rel="stylesheet" type="text/css" href="payment.css">
</head>
<body>
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  text-align: center;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  margin-top: 0;
  color: #333;
}

.form-group {
  text-align: left;
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

.hidden {
  display: none;
}

    </style>
  <div class="container">
    <h1>Payment Details</h1>
    <form id="paymentForm">
      <div class="form-group">
        <label for="paymentMethod">Payment Method</label>
        <select id="paymentMethod" required>
          <option value="" selected disabled>Select Payment Method</option>
          <option value="card">Credit/Debit Card</option>
          
          <option value="cod">Cash on Delivery</option>
        </select>
      </div>
      
      <button type="submit">Pay Now</button>
    </form>
  </div>

<script>
document.getElementById('paymentMethod').addEventListener('change', function(event) {
  var paymentMethod = event.target.value;
  var cardDetails = document.getElementById('cardDetails');
  var upiDetails = document.getElementById('upiDetails');

  if (paymentMethod === 'card') {
    cardDetails.classList.remove('hidden');
    upiDetails.classList.add('hidden');
  } 
   else {
    cardDetails.classList.add('hidden');
    upiDetails.classList.add('hidden');
  }
});

document.getElementById('paymentForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  var paymentMethod = document.getElementById('paymentMethod').value;

  if (paymentMethod === 'card') {
    window.location.href = 'pay.php'; 
    }
    if(paymentMethod === 'cod'){
        window.location.href = 'captchaFront.php'; 
    }
    })
    

    
     
</script>

</body>
</html>