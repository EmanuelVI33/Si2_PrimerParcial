import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const radios = document.getElementsByName('tipo');
const duracion = document.querySelector('#duracion');


radios.forEach(radio => {
    if (radio.checked && radio.value == 1)
        duracion.classList.add('hidden');
    if (radio.checked && radio.value == 2)
        duracion.classList.remove('hidden');   
});

radios.forEach(radio => {
    radio.addEventListener('change', () => {
        if (radio.checked && radio.value == 1)
            duracion.classList.add('hidden');
        if (radio.checked && radio.value == 2)
            duracion.classList.remove('hidden');    
    });
});




