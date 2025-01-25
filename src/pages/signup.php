<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Signup</title>
</head>
<body class="bg-gray-100">

  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
      <h1 class="text-3xl font-semibold text-center mb-6">Sign Up</h1>

      <form action="../includes/signup.inc.php" method="post">
        <!-- Username -->
        <div class="mb-4">
          <label for="username" class="block text-gray-700 font-medium">Username</label>
          <input type="text" id="username" name="uid" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-medium">Email</label>
          <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-medium">Password</label>
          <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
          <label for="confirmPassword" class="block text-gray-700 font-medium">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" name="submit" class="w-full bg-green-500 text-white py-2 rounded-md mt-4 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
          Sign Up
        </button>
      </form>

      <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Already have an account? <a href="../../index.php" class="text-blue-600 hover:underline">Login</a></p>
      </div>
    </div>
  </div>

</body>

</html>