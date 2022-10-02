<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-teal-700 hover:bg-teal-600 hover:font-bold  p-1 rounded-md']) }}>
    <i class="fa-solid fa-pen-to-square"></i> {{ $slot }}
</button>
