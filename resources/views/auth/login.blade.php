

    <form method="POST" action="{{ route('login') }}" id="{{{ $id }}}" name="{{{ $id }}}">
        @csrf

        <!-- Email Address -->
        <div class="pristine-form">
            <x-input-label for="email" :value="__('Email')" />
            <x-input-text id="email"  type="text" name="email" :value="old('email')" autofocus data-pristine-required data-pristine-type="email"/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <!-- Password -->
        <?php $passid = 'password_'.$id; ?>
        <div class="pristine-form">
            <x-input-label for="password" :value="__('Password')" />
            <x-input-text id='{{ $passid }}' type="password" name='password' data-pristine-required data-pristine-minlength="3"/>
            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <!-- Remember Me -->
        <div class="pristine-form">
            <x-input-tick :text="__('Remember me')"/>
        </div>

        <!-- Button -->
        <x-input-button data-bs-dismiss="modal" :buttontext="__('Log in')"/>

        <!-- links -->
        <div class="d-block">
            <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#askpass">
                {{ __('Forgot your password?') }}
            </a>
        </div>
        <div class=" py-1 ">
            {{ __('Or') }}
        </div>
        <div>
            <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#reg">
                {{ __('New registration') }}
            </a>
        </div>
    </form>

