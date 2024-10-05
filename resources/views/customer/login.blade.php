<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Customer</title>

    <!-- Tambahkan Tailwind CSS dan Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.0/dist/flowbite.min.js"></script>

    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // SweetAlert untuk menampilkan error
        @if ($errors->any())
            window.onload = function() {
                Swal.fire({
                    title: 'Error!',
                    html: 
                        '<ul>' +
                        @foreach ($errors->all() as $error)
                            '<li>{{ $error }}</li>' +
                        @endforeach
                        '</ul>',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            };
        @endif

        // Function untuk switch form login & register
        function toggleForm(formType) {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            
            if (formType === 'login') {
                loginForm.classList.remove('hidden');
                loginForm.classList.add('animate__fadeIn');
                registerForm.classList.add('hidden');
            } else {
                registerForm.classList.remove('hidden');
                registerForm.classList.add('animate__fadeIn');
                loginForm.classList.add('hidden');
            }
        }
    </script>

    <!-- Tambahkan animasi dengan Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-gray-100">
    <div class="w-full h-screen flex">
        <!-- Kolom kiri untuk form login/register -->
        <div class="w-5/12 bg-white flex justify-center items-center">
            <div class="p-8 rounded-lg shadow-lg w-full max-w-sm animate__animated animate__fadeIn">
                <h1 class="text-2xl font-bold text-center mb-6">Customer Portal</h1>

                <!-- Tab untuk Login dan Register -->
                <div class="flex justify-around mb-6">
                    <button onclick="toggleForm('login')" 
                        class="text-blue-500 font-bold focus:outline-none">Login</button>
                    <button onclick="toggleForm('register')" 
                        class="text-gray-500 font-bold focus:outline-none">Register</button>
                </div>

                <!-- Form Login -->
                <div id="loginForm">
                    <form method="POST" action="{{ route('customer.login') }}">
                        @csrf

                        <!-- Input Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email:</label>
                            <input type="email" id="email" name="email" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Input Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Password:</label>
                            <input type="password" id="password" name="password" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                                Login
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Form Register -->
                <div id="registerForm" class="hidden">
                    <form method="POST" action="{{ route('customer.register') }}">
                        @csrf

                        <!-- Input Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input type="text" id="name" name="name" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Input Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email:</label>
                            <input type="email" id="email" name="email" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Input Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Password:</label>
                            <input type="password" id="password" name="password" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirm Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom kanan untuk banner -->
        <div id="Banner" class="w-7/12 bg-cover bg-right text-white flex flex-col justify-center items-center font-sans" style="background-image: url('https://c0.wallpaperflare.com/preview/301/940/932/amusement-park-blue-candy-floss-cotton-candy.jpg');">
            <div class="text-center">
                <h2 class="text-4xl font-bold mb-4">TOLONG AKU STRESSS</h2>
                <p class="text-lg">KEPALA AKU SAKIT</p>
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non dignissimos nam optio eius delectus possimus nostrum dolores amet maiores corporis!</p>
            </div>
        </div>
    </div>
</body>
</html>
