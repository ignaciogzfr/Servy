<!DOCTYPE html>
<html>
<head>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<title>pruebas de captcha</title>
</head>
<body>

<button class="g-recaptcha" 
        data-sitekey="6Lcjm60ZAAAAABkchFUpteOIqoBaYD0GeifbgNku" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>


</body>

 <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>


</html>