<x-guest-layout>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1><a href="#"><span><i>ServisKita</i></span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/">About</a></li>
                    <li><a class="nav-link scrollto" href="/">Services</a></li>
                    <li><a class="nav-link scrollto" href="/">Contact</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    </li>
                    @else
                    <li>
                        <a class="nav-link" href="{{ route('login') }}" class="nav-link scrollto active">
                            Log in
                        </a>
                    </li>
                    @if (Route::has('register'))
                    <li>
                        <a class="nav-link" href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <section id="hero">
        <!-- Hero section content goes here -->
    </section>

    <main id="main">
        <section id="register" class="register py-20 bg-gray-100">
            <div class="container mx-auto">
                <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
                    <div class="md:flex">
                        <div class="w-full p-4 px-6 py-10">
                            <h2 class="text-center font-semibold text-2xl mb-6">{{ __('Register') }}</h2>
                            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                                @csrf

                                <div>
                                    <label for="name" class="block text-gray-700">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-input mt-1 block w-full rounded-md border-gray-300" name="name" :value="old('name')" required autofocus autocomplete="name">
                                </div>

                                <div class="mt-4">
                                    <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-input mt-1 block w-full rounded-md border-gray-300" name="email" :value="old('email')" required autocomplete="username">
                                </div>

                                <div class="mt-4">
                                    <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-input mt-1 block w-full rounded-md border-gray-300" name="password" required autocomplete="new-password">
                                </div>

                                <div class="mt-4">
                                    <label for="password_confirmation" class="block text-gray-700">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" type="password" class="form-input mt-1 block w-full rounded-md border-gray-300" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <label for="terms" class="block text-gray-700">
                                        <input class="form-checkbox rounded text-indigo-600" type="checkbox" name="terms" id="terms" required>
                                        <span class="ml-2">{!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                            ]) !!}</span>
                                    </label>
                                </div>
                                @endif

                                <div class="flex items-center justify-end mt-4">
                                    <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Already registered?') }}</a>
                                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>PT. Asia Makmur Abadi</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
</x-guest-layout>