<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .inputBox {
            margin-bottom: 20px;
        }

        .inputBox span {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .inputBox input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>

<div class="container">

    <form id="otpForm">

        <div class="row">

            <div class="col">

                <h3 class="title">OTP Verification</h3>

                <div class="inputBox">
                    <span>Enter OTP:</span>
                    <input type="text" placeholder="Enter the 6-digit OTP" required>
                </div>

            </div>
    
        </div>

        <button type="submit" class="submit-btn" onclick="pay()">Submit</button>

    </form>

    <script>
        document.getElementById('otpForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  
            alert('Otp verification success!!!');
            window.location.href = 'success.php'; 
        }
    )
        
    </script>

</div>    

</body>
</html>
