<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .contain {
	display: flex;
	justify-content: center;
	margin-top: 100px;
}
#capt {
	width: 170px;
	height: 72px;
	font-size: 37px;
	background-color: #2C31CF;
	padding: 5px;
	border: none;
	letter-spacing: 1px;
	float: left;
	color: #E9E91D;
	border-radius: 5px 0 0 5px;
}
#refresh {
	float: left;
	background-color: #2C31CF;
	height: 82px;
	border-radius: 0 5px 5px 0;
}
#refresh img {
	margin-top: 20px;
	cursor: pointer;
}
#textinput {
	width: 170px;
	height: 70px;
	font-size: 37px;
	background-color: #252521;
	border: none;
	margin-left: 10px;
	border-radius: 5px;
	padding: 5px;
	color: #D58A1E;
}
.contain button {
	padding: 8px 20px;
	height: 35px;
	cursor: pointer;
	border: none;
	border-radius: 5px;
	margin-left: 10px;
	margin-top: 25px;
	background-color: #764D11;
	color: #CED4F0;
	transition: .5s;
}
.contain button:hover {
	background-color: #976216;
}
    </style>
    <div class="contain">

        <input type="text" id="capt" readonly="readonly">

        <div id="refresh"> <img src="images/reload.png" width="50px" onclick="cap()"> </div>

        <input type="text" id="textinput" placeholder="enter..">

        <button onclick="validcap()">Check</button>
    </div>

    <script type="text/javascript">
        window.addEventListener('load', function() {
    cap()
})
		function cap() {

			var alpha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
			           ,'W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i',
			           'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

			var a=alpha[Math.floor(Math.random()*62)];
			var b=alpha[Math.floor(Math.random()*62)];
			var c=alpha[Math.floor(Math.random()*62)];
			var d=alpha[Math.floor(Math.random()*62)];
			var e=alpha[Math.floor(Math.random()*62)];
			var f=alpha[Math.floor(Math.random()*62)];

			var sum=a + b + c + d + e + f;

			document.getElementById("capt").value=sum;
		}

		function validcap() {
			var string1 = document.getElementById('capt').value;
			var string2 = document.getElementById('textinput').value;
			if (string1 == string2){
                var isConfirmed = confirm("Form is validated Succesfully");

                if (isConfirmed) {
                    console.log('Order placed successfully!');
                    alert('Order placed successfully!');
                    window.location.href = 'success.php'; 
                }
			
			}
			else {
				alert("Please enter a valid captcha");
				return false;
			}
		}


	</script>
</body>

</html>