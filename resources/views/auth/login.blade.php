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
        <!-- <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg> -->
    </section>

    <main id="main">
        <section id="login" class="login py-20 bg-gray-100">
            <div class="container mx-auto">
                <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
                    <div class="md:flex">
                        <div class="w-full p-4 px-6 py-10">
                            <h2 class="text-center font-semibold text-2xl mb-6">{{ __('Log in') }}</h2>
                            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                                @csrf

                                <div>
                                    <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-input mt-1 block w-full rounded-md border-gray-300 @error('email') border-red-500 @enderror" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="email">
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-input mt-1 block w-full rounded-md border-gray-300 @error('password') border-red-500 @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center mt-4">
                                    <input class="form-checkbox rounded text-indigo-600" type="checkbox" name="remember" id="remember">
                                    <label class="ml-2 text-gray-700" for="remember">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>

                                <div class="mt-4">
                                    @if (Route::has('password.request'))
                                    <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                                        {{ __('Log in') }}
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