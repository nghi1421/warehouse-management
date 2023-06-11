<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex min-h-full">
          <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
              <div>
                <img class="h-60 items-center w-auto m-auto" src="{{ asset('assets/images/bewama-logo.png') }}" alt="Your Company">
                <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
                <p class="mt-2 text-sm leading-6 text-gray-500">
                  Not a member?
                  <a href="{{ route('register') }}" class="font-semibold text-primary hover:text-primary-700 hover:underline">Sign-up</a>
                </p>
              </div>

              <div class="mt-10">
                <div>
                  <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                      <label for="email" class="block  text-sm font-medium leading-6 text-gray-900">Email address</label>
                      <div class="mt-2">
                        <x-bewama::form.input.text name="email" type="email" placeholder="Please fill your email"></x-bewama::form.input.text>
                      </div>
                    </div>
                    <div>
                      <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                      <div class="mt-2">
                        <x-bewama::form.input.text name="password" type="password" placeholder="Please fill your password"></x-bewama::form.input.text>
                      </div>
                    </div>

                    <div class="flex items-center justify-between">
                      <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="remember-me" class="ml-3 block text-sm leading-6 text-gray-700">Remember me</label>
                      </div>

                      <div class="text-sm leading-6">
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                      </div>
                    </div>

                    <div>
                      <x-bewama::form.button.primary type="submit"> 
                         <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="white" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        Sign in
                    </x-bewama::form.button.primary>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <div class="relative hidden w-0  flex-1 lg:block">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
          </div>
        </div>

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
