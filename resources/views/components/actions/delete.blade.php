<button
    x-data
    x-on:click="$dispatch('open-modal', 'delete-modal');document.querySelector('#delete-modal').setAttribute('action', '{{ $url }}')"
>
<span class="hover:bg-red-400 hover:text-white inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">{{ $label }}</span>
</button>