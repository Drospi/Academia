<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="/dist/output.css" rel="stylesheet">
</head>
<body>
<div class="bg-image-login flex items-center w-full justify-center h-screen">
    <div class="container-login p-8 rounded shadow-md w-80">
        <h2 class="text-md text-white font-semibold mb-6 text-center">Bienvenido Ingresa con tu cuenta</h2>

        <form action="/login" method="post">
            <div class="mb-4">
            <div class="flex bg-white items-center border border-gray-300 p-2 rounded">
                    <input required type="text" placeholder="Correo" id="email" name="email" class="w-full focus:outline-none">
                    <i class="fas fa-envelope text-gray-500"></i>
                </div>
            </div>
            <div class="mb-4">
            <div class="flex bg-white items-center border border-gray-300 p-2 rounded">
                    <input required type="password" placeholder="Contrasena" id="password" name="password" class="w-full focus:outline-none">
    <i id="eyeIcon" class="fa fa-eye-slash text-gray-500 cursor-pointer hover:text-gray-400"></i>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-300">Ingresar</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('eyeIcon').addEventListener('click',togglePassword);
    function togglePassword() {
  var passwordField = document.getElementById("password");
  var eyeIcon = document.getElementById("eyeIcon");

  if (passwordField.type === "password") {
    passwordField.type = "text";
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  } else {
    passwordField.type = "password";
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  }
}

</script>
</body>
</html>
