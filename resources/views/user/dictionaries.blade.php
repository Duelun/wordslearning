
<div class="d-flex justify-content-center w-100">
    <div class="d-inline-block w-50 m-0 p-0">

        @include('scripts.userdictsets')

        <!-- Dictionaries list/delete/new/amend -->
        <x-user-general-box>
            <x-slot:title>
                {{ __('Dictionaries') }}
            </x-slot:title>
            <x-slot:content>
                @include('user.modules.dictionary-list', ['a' => 'b'])
            </x-slot:content>
        </x-user-general-box>

        <!-- Words list/delete/new/amend -->
        <x-user-general-box>
            <x-slot:title>
                {{ __('Words') }}
            </x-slot:title>
            <x-slot:content>
                @include('user.modules.word-list', ['a' => 'b'])
            </x-slot:content>
        </x-user-general-box>

        <!-- Dictionary's words -->
        <x-user-general-box>
            <x-slot:title>
                {{ __('Words in a Dictionary') }}
            </x-slot:title>
            <x-slot:content>
                @include('user.modules.dictionary-words', ['a' => 'b'])
            </x-slot:content>
        </x-user-general-box>

        <!-- New words -->
        <x-user-general-box>
            <x-slot:title>
                {{ __('New word') }}
            </x-slot:title>
            <x-slot:content>
                @include('user.modules.new-word', ['a' => 'b'])
            </x-slot:content>
        </x-user-general-box>

    </div>
</div>
