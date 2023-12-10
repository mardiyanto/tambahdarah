<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.email.value == "")
{
   alert("Isi dulu username !");
   text_form.email.focus();
   return (false);
}
if (text_form.password.value == "")
{
   alert("Isi dulu password !");
   text_form.password.focus();
   return (false);
}
return (true);
}
-->
</script>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Pakar - Chirexs 1.0</title>
      <link rel="stylesheet" href="aset/login/css/style.css">
</head>
  <body>
<div class="ayaem">
  <div class="hand"></div>
  <div class="hand hand-r"></div>
  <div class="arms">
    <div class="arm"></div>
    <div class="arm arm-r"></div>
  </div>
</div>

<div class="formku">
   <div class="info">
    <h4><i class="fa fa-paper-plane"></i> Login member</h4><br>
  </div>
  <form class="login-form" action="loginmember.php" method="post" name="text_form" onsubmit="return Blank_TextField_Validator()">
<input type="text" name="email" id="email" placeHolder="&#xf007;  Username" style="font-family:Arial, FontAwesome" />
<input type="password" name="password" id="password" placeHolder="&#xf023;  Password" style="font-family:Arial, FontAwesome" />
<input class='btn btn-success margin' type="submit" name="submit" id="submitku" value="   Login   " /><br>
 <p class="message">Ingin mendaftar? <a href="daftar/tambahdata" >Daftar</a></p>
  </form>
   <a class='btn btn-success margin' href=''> <i class="fa fa-user-plus" ></i>Lupa Password</a>
</div>
</body>

</html><script>
$('input[type="password"]').on('focus', () => {
  $('*').addClass('password');
}).on('focusout', () => {
  $('*').removeClass('password');
});;
</script>
<script>
var d = document.getElementById("pakarayam");
d.className += " sidebar-collapse";
</script>