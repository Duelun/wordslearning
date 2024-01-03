
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-input-text id="email" type="text" name="email" :value="old('email', $request->email)" autofocus/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-input-text id="password" type="password" name="password"/>
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
            <x-input-text id="password_confirmation" type="password" name="password_confirmation"/>
            <x-input-error :messages="$errors->get('password_confirmation')"/>
        </div>

        <div>
            <x-input-button>
                {{ __('Reset Password') }}
            </x-input-button>
        </div>
    </form>

