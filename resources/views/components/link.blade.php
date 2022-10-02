@php
    $classes = "underline text-sm text-gray-600 hover:text-gray-900"
@endphp

{{-- Los componetes tiene atributosl le añadimos al atributo class todas la clases que estan
    dentro de la variable $classes y el href se coloca tambien por lo estamos pasando como 
    atributo
    Si pasaramos el atributo enlace debemos especificar
    'href' => $enlace
    --}}

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>