
    <form method="POST" action="{{ route('register') }}" id="{{{ $id }}}">
        @csrf

        <!-- Name -->
        <div class="pristine-form">
            <x-input-label for="name" :value="__('Name')" />
            <x-input-text id="name" type="text" name="name" :value="old('name')" autofocus data-pristine-required data-pristine-minlength="3"/>
            <x-input-error :messages="$errors->get('name')"/>
        </div>

        <!-- Email Address -->
        <div class="pristine-form">
            <x-input-label for="email" :value="__('Email')" />
            <x-input-text id="email" type="text" name="email" :value="old('email')" data-pristine-required data-pristine-type="email"/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <!-- Login Name-->

        <!-- Password -->
        <?php $passid = 'password-'.$id; ?>
        <div class="pristine-form">
            <x-input-label for="password" :value="__('Password')" />
            <x-input-text id='{{ $passid }}' type="password" name="password" data-pristine-required data-pristine-minlength="3"/>
            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <!-- Confirm Password -->
        <div class="pristine-form">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input-text id="password_confirmation" type="password" name="password_confirmation" data-pristine-equals="#password-regform"/>
            <x-input-error :messages="$errors->get('password_confirmation')"/>
        </div>

        <!-- Agree -->
        <div class="pristine-form">
            <x-input-tick :messages="$errors->get('agree')"
                    :text="__('I agre the terms and conditions!')" :id="'agree'" 
                    :req=" __('You must accept the terms and conditions')"/>
        </div>

        <!-- Button -->
        <x-input-button data-bs-dismiss="modal" :buttontext="__('Register')"/>

        <!-- Links -->
        <div cclass="d-block">
            <a href="#"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#login">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
