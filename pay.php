<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="pay.css">

</head>
<body>

<div class="container">

    <form id="pay">

        <div class="row">

            

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo" required>
                </div>
                <div class="inputBox">
                    <span>Credit card / Debit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" required>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="123" required>
                    </div>
                </div>

            </div>
    
        </div>
        <button type="submit" class="submit-btn">Pay Now</button>

    </form>

</div>    

<script>
    document.getElementById('pay').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

            window.location.href = 'otp.php'; 
        }
    )
    
</script>
    
</body>
</html>