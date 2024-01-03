<div class="" style='width:22rem'>
    <div class=" my-3 fs-4 "> <!-- head -->
        {{ __('Website settings' )}}
    </div>

    <form method="POST" action="{{ route('webpageset') }}" id='webpageset'>
        @csrf
        <!-- Colorstyle -->
        <div class="pristine-form d-flex justify-content-between align-items-start w-100 mt-4">
            <div class=" d-inline-block flex-grow-1 flex-shrink-1 pt-0 mt-0" style="">
                <x-input-label class="" for="colorstyle" :value="__('Website color style')" />
            </div>
           <?php $datas = array('Default', 'Green', 'Yellow/Red');           /*behúzni adatbázisból*/ ?>
            <div class=" d-inline-block flex-grow-0 flex-shrink-0" style="width: 8rem">
                <x-input-dropdown class="" id="colorstyle" type="text" name="colorstyle" :value="old('colorstyle')" :width="8" autofocus
                :datas="$datas" :active="session('userstyle', ' ')" />
            </div>
        </div>
        <div class=" d-flex ">
            <x-input-error :errorid="'webpageset_color_error'"/>
            <x-tooltip :id='"webpageset_color"' :d_none='"d-inline-block"' :color="'info'"
                    :tooltiptext=" __('Website color style') " />
        </div>

        <!-- Site language -->
        <div class="pristine-form d-flex justify-content-between align-items-start w-100 mt-4 ">
            <div class=" d-inline-block flex-grow-1 flex-shrink-1 pt-0 mt-0" style="">
                <x-input-label class="" for="sitelang" :value="__('Website language')" />
            </div>
            <div class=" d-inline-block flex-grow-0 flex-shrink-0" style="width: 8rem">
                <x-input-dropdown class="" id="sitelang" type="text" name="sitelang" :value="old('sitelang')" :width="8"
                    :datas="session('activelangs', ' ')" :active="session('userlangtext', ' ')" />   <!-- beírni defaultba lap nyelvét -->
            </div>
        </div>
        <div class=" d-flex ">
            <x-input-error :errorid="'webpageset_sitelang_error'"/>
            <x-tooltip :id='"webpageset_sitelang"'  :d_none='"d-inline-block"' :color="'info'"
                    :tooltiptext=" __('Website language') " />
        </div>


        <!-- Openpage -->
        <div class="pristine-form d-flex justify-content-between align-items-start w-100 mt-4">
            <div class=" d-inline-block flex-grow-1 flex-shrink-1 pt-0 mt-0" style="">
                <x-input-label class="" for="openpage" :value="__('Openpage')" />
            </div>
            <?php $datas = array('Learning', 'Dictionaries', 'Settings', 'Help'); /* --------------*/  ?>
            <div class=" d-inline-block flex-grow-0 flex-shrink-0" style="width: 8rem">
                <x-input-dropdown class="" id="openpage" type="text" name="openpage" :value="old('openpage')" :width="8"
                :datas="$datas" :active="session('useropenpage', 'Learning')" />
            </div>
        </div>
        <div class=" d-flex ">
            <x-input-error :errorid="'webpageset_openpage_error'"/>
            <x-tooltip :id='"webpageset_openpage"'  :d_none='"d-inline-block"' :color="'info'" :tooltiptext=" __('After login this page apper') " />
        </div>


        <!-- Statistic apper -->
        <div class="pristine-form d-flex justify-content-between align-items-start w-100 mt-4">
            <div class=" d-inline-block flex-grow-1 flex-shrink-1 pt-0 mt-0" style="">
                <x-input-label class="" for="pagestatseen" :value="__('Learning statistic on page')" />
            </div>
            <?php
                if (session()->has('statonpage') && session('statonpage'))  { $checked = 'checked'; } else { $checked = ''; }
            ?>
            <div class=" d-inline-block flex-grow-0 flex-shrink-0 d-flex justify-content-end" style="width: 8rem">
                <x-slide-tick :id='"pagestatseen"' :checked='$checked'/>
            </div>
        </div>
        <div class=" d-flex ">
            <x-input-error :errorid="'webpageset_pagestatseen_error'"/>
            <x-tooltip :id='"webpageset_pagestatseen"'  :d_none='"d-inline-block"' :color="'info'"
                    :tooltiptext=" __('If yes, the learning statistic seen on headline width the words number by learning stage. Eg: all/under learning/learned') " />
        </div>

        <!-- Big learning box -->
        <div class="pristine-form d-flex justify-content-between align-items-start w-100 mt-4">
            <div class=" d-inline-block flex-grow-1 flex-shrink-1 pt-0 mt-0" style="">
                <x-input-label class="" for="biglearnbox" :value="__('Full page learning')" />
            </div>
            <?php
                if (session()->has('fullpagelearn') && session('fullpagelern'))  { $checked = 'checked'; } else { $checked = ''; }
            ?>
            <div class=" d-inline-block flex-grow-0 flex-shrink-0 d-flex justify-content-end" style="width: 8rem">
                <x-slide-tick :id='"biglearnbox"'  :checked='$checked' />
            </div>
        </div>
        <div class=" d-flex ">
            <x-input-error :errorid="'webpageset_biglearnbox_error'"/>
            <x-tooltip :id='"webpageset_biglearnbox"'  :d_none='"d-inline-block"' :color="'info'"
                    :tooltiptext=" __('If yes, your learning box apper withouth other part of site.') " />
        </div>




        <!-- Button -->
        <div class=" mt-4 ">
            <x-input-button :formname="'webpageset'" :buttontext="__('Send')"/>
        </div>
    </form>
</div>

