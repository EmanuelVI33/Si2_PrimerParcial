@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Ha ocurrido un error.') }}
        </div>

        <ul class="mt-3 list-none text-sm">
            @foreach ($errors->all() as $error)
                <li class="bg-red-100 border-l-4 border-red-600 text-red-600 p-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
