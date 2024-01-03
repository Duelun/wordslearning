@props([
    'errorid' => '',
    'messages' => '',
    'd_none' => 'd-none',
    'errortext' => '',
    'tooltiptext' => ''
])

<div class="pristine-message mb-1 flex-grow-1 flex-shrink-1 d-flex ">
    <!-- textmessage -->
    <div class=" d-block flex-grow-1 flex-shrink-1 d-flex me-auto w-75 ">
        @if ($messages)
            <?php 
                $errortext = $messages[0];
                $d_none = 'd-inline-block';
                foreach ($messages as $message) {
                    $tooltiptext = $tooltiptext.$message.'<br>';
                }
            ?>
        @endif
        <span id="{{ $errorid }}" class="pristine-error d-block overflow-hidden text-nowrap text-truncate h-100 flex-grow-1 flex-shrink-1" >
                {{ $errortext }} </span>
    </div>
    <!-- Tooltip error -->
    <x-tooltip :id="$errorid" :tooltiptext="$tooltiptext" :d_none="$d_none" :color="'danger'"/>
</div>
