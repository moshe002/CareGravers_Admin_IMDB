
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Admin</title>
</head>
<body>
    <div class="flex flex-col relative items-center justify-center h-screen">
        <h1 class="absolute top-0 left-5 font-bold ml-5 mt-5 text-lg">CareGraver</h1> 
        <div class="flex flex-col justify-center w-1/4 gap-5">
            <h1 class="font-semibold text-2xl">Sign In</h1>
            <form class="flex flex-col gap-5 relative" method="POST" action="../server-side-process/login-process.php">
                <input name="email" class="h-10 p-5 bg-gray-100 rounded-md text-black outline-none placeholder-black" type="text" placeholder="Enter email or username" />
                <input name="password" class="h-10 p-5 bg-gray-100 rounded-md text-black outline-none placeholder-black" type="password" placeholder="Password" />
                <!-- <button type="button" class="absolute mt-2 top-24 right-0 text-gray-400 text-sm">Forgot Password?</button> -->
                <button name="submit" class="p-3 bg-blue-400 rounded-md text-white mt-5 hover:cursor-pointer" type="submit" value="submit">Login</button>
            </form>
        </div>   
    </div>
</body>
</html>