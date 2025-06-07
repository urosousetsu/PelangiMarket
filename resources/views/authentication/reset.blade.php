<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password | Pelangi Market</title>
    <!-- Tailwind CSS & Flowbite CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Laravel Notify -->
    @notifyCss
</head>

<body class="bg-gray-50">
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Reset Password</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('email') border-red-500 @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="you@email.com">
                    
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password Baru</label>
                    <input id="password" type="password" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('password') border-red-500 @enderror" 
                        name="password" required autocomplete="new-password"
                        placeholder="••••••••">
                    
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" 
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Reset Password
                </button>
            </form>
            
            <p class="mt-4 text-sm text-center text-gray-600">
                Kembali ke
                <a href="{{ route('login') }}" class="text-red-600 hover:underline">Login</a>
            </p>
        </div>
        <x-notify::notify />
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @notifyJs
</body>

</html>