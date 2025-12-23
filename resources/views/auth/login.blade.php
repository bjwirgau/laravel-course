<x-layout>
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-2xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <x-inputs.text id="email" name="email" label="Email" type="email" placeholder="Email Address" />
            <x-inputs.text id="password" name="password" label="Password" type="password" placeholder="Password" />
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Login</button>

            <p class="mt-4 text-center text-gray-500">Don't have an account? <a class="text-blue-900"
                    href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</x-layout>
