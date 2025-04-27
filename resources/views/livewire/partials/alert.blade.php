@session('response')
<div class="toast toast-center md:bottom-0 w-full md:w-full z-[100] px-2" id="php-toast">
    <div class="flex gap-2 w-full max-w-[95vw] md:max-w-md pointer-events-auto alert alert-{{session('response')['status']}} shadow-lg flex-wrap md:flex-nowrap">
        <div class="flex items-center gap-2 flex-1 min-w-0">
            @php
                $icons = [
                    'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>',
                    'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>',
                    'warning' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 shrink-0">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
</svg>
',
                    'info' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>',
                ];
            @endphp
            {!!$icons[strToLower(session('response')['status'])]!!}
            <div class="min-w-0 break-words whitespace-normal">
                {!!session('response')['message']!!}
            </div>
        </div>
        <button onclick="this.closest('.toast').remove()" class="btn btn-ghost btn-xs self-start md:self-center ml-auto md:ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>

<script>
    setTimeout(() => {
        const toast = document.getElementById('php-toast');
        if (toast) toast.remove();
    }, 4000);
</script>
@endsession