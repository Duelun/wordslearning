<div class=" mb-5">
    {{ __('You will log out from your account.') }}
</div>

<form method="POST" action="{{ route('logout') }}" id="{{{ $id }}}">
    @csrf

    <!-- Button -->
    <x-input-button :buttontext="__('Log out')"/>

    <div style="height: 1rem"></div>
</form>

