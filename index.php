<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/output.css">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Login</title>
</head>

<body class="bg-gray-100">

  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
      <h1 class="text-3xl font-semibold text-center mb-6">Login</h1>

      <form action="./src/includes/login.inc.php" method="post">
        <div class="mb-4">
          <label for="username" class="block text-gray-700 font-medium">Username</label>
          <input type="text" id="username" name="uid" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >
        </div>

        <div class="mb-6">
          <label for="password" class="block text-gray-700 font-medium">Password</label>
          <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >
        </div>

        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600">
            <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
          </div>
          <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
        </div>

        <button type="submit" name="login" class="w-full bg-blue-500 text-white py-2 rounded-md mt-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Login
        </button>
      </form>

      <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Don't have an account? <a href="./src/pages/signup.php" class="text-blue-600 hover:underline">Sign up</a></p>
      </div>

      <p class="text-center my-4">Or continue with</p>

      <div class="external-provider flex justify-center items-center border-t border-gray-300 pt-4 gap-2">
        <img src="./src/assets/img/facebook_img.png" alt="" class="cursor-pointer h-12 w-auto shadow-md p-2 border border-gray-300">
        <img src="./src/assets/img/google_img.png" alt="" class="cursor-pointer h-12 w-auto shadow-md p-2 border border-gray-300">
        <img src="./src/assets/img/github_img.png" alt="" class="cursor-pointer h-12 w-auto shadow-md p-2 border border-gray-300">
      </div>
    </div>
  </div>

</body>

</html>
