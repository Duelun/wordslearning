<!-- Forms -->
@auth
    <x-user-form-box>
        <x-slot:boxid>
            'logout'
        </x-slot>
        <x-slot:contentpach>
            @include('auth.logout', ['id' => 'logoutform'])
        </x-slot>
    </x-user-form-box>
@endauth
@guest
    <!-- Validation -->
    @include('scripts.validate-pristin')

    <!-- Reset error message at form closing -->
    @include('scripts.reset-errors-startpage')

    <!-- Autovisible form -->
    @if (Session::get('form'))
        @include('scripts.open-invalid-form')
    @endif

    <!-- Forms -->
    <x-user-form-box>
        <x-slot:boxid>
            'login'
        </x-slot>
        <x-slot:contentpach>
            @include('auth.login', ['id' => 'loginform'])
        </x-slot>
    </x-user-form-box>
    <x-user-form-box>
        <x-slot:boxid>
            'reg'
        </x-slot>
        <x-slot:contentpach>
            @include('auth.register', ['id' => 'regform'])
        </x-slot>
    </x-user-form-box>
    <x-user-form-box>
        <x-slot:boxid>
            'askpass'
        </x-slot>
        <x-slot:contentpach>
            @include('auth.forgot-password', ['id' => 'askpassform'])
        </x-slot>
    </x-user-form-box>
@endguest
