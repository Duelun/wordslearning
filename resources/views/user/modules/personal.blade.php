
<div class="" style='width:22rem'>
    <div class=" my-3 fs-4 "> <!-- head -->
        {{ __('Personal details' )}}
    </div>

    <form method="POST" action="{{ route('userpersonal') }}" id='userpersonal'>
        @csrf
        <!-- name -->
        <div class="pristine-form">
            <x-input-label for="name" :value="__('Name')" />
            <x-input-text id="name" type="text" name="name" :value="old('name')" autofocus/>
            <x-input-error :errorid="'userpersonal_name_error'"/>
        </div>

        <!-- Email Address -->
        <div class="pristine-form">
            <x-input-label for="email" :value="__('Email')" />
            <x-input-text id="email" type="text" name="email" :value="old('email')"/>
            <x-input-error :errorid="'userpersonal_email_error'"/>
        </div>

        <!-- Old Password -->
        <div class="pristine-form">
            <x-input-label for="password_old" :value="__('Old Password')" />
            <x-input-text id='passwordPersonal_old' type="password" name="password_old"/>
            <x-input-error :errorid="'userpersonal_password_old_error'"/>
        </div>

        <!-- Password -->
        <div class="pristine-form">
            <x-input-label for="password" :value="__('New Password')" />
            <x-input-text id='passwordPersonal' type="password" name="password"/>
            <x-input-error :errorid="'userpersonal_password_error'"/>
        </div>

        <!-- Confirm Password -->
        <div class="pristine-form">
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
            <x-input-text id="password_confirmation" type="password" name="password_confirmation"/>
            <x-input-error :errorid="'userpersonal_password_confirmation_error'"/>
        </div>

        <!-- Agree -->
        <div class="pristine-form">
            <x-input-tick :errorid="'userpersonal_agree_error'"
                    :text="__('Yes, I want the changes!')" :id="'agree'"/>
        </div>

        <!-- Button -->
        <div>
            <x-input-button :formname="'userpersonal'" :buttontext="__('Send')"/>
        </div>
    </form>
</div>
