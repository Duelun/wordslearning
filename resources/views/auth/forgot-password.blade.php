<div class=" mb-5 ">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</div>

<form method="POST" action="{{ route('password.email') }}" id="{{{ $id }}}">
    @csrf

    <!-- Email Address -->
    <div class="pristine-form">
        <x-input-label for="email" :value="__('Email')" />
        <x-input-text id="email"  type="email" name="email" :value="old('email')" autofocus data-pristine-required data-pristine-type="email"/>
        <x-input-error :messages="$errors->get('email')"/>
    </div>

    <!-- Button -->
    <x-input-button :buttontext="__('Send')"/>

    <div style="height: 1rem"></div>
</form>

