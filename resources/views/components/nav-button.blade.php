@props([
    'text' => 'x',
    'active' => '',
    'z' => '',
    'hrefrole' => 'a',
    'href' => '#'
])
@if (Session::get('page'))
    <?php 
        if($href == Session::get('page')){
            $active = 'active';
        } else {
            $active = '';
        };
    ?>
@endif

<?php 
    $borderbot = '';
    if ($active == 'active'){
        $z = 100;
        $borderbot = 'border-bottom-0';
    }
    $href = $hrefrole.$href;
?>

<a type="button" class="navbarbutton btn btn-light border border-1 border-black rounded-top-3 rounded-bottom-0 {{ $borderbot }} {{ $active }}" 
    style="padding-left: 2rem; padding-right: 2rem; margin-right: -1rem; z-index: {{ $z }}" 
    href="{{ route($href) }}">{{ $text }}
</a>
