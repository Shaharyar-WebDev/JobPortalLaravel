@session('response')
{{-- toast toast-top pointer-events-none w-full justify-center items-center md:wd-auto top-20 toast-center md:toast-end z-50" id="php-toast --}}
<div class="toast toast-center md:toast-start 
md:bottom-10 w-full md:w-auto z-[100]" id="php-toast">
    <div class="flex gap-2 w-full md:w-auto pointer-events-auto alert alert-{{session('response')['status']}} shadow-lg">
        <div class="flex items-center gap-2">
            <!-- Icons based on type -->
            @php
                $icons = [
                    'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>',
                    'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>',
                    'warning' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M6.938 4h10.124C18.07 4 19 4.93 19 6v12c0 1.07-.93 2-2.082 2H7.082C6.03 20 5 19.07 5 18V6c0-1.07.93-2 2.062-2z"/></svg>',
                    'info' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>',
                ];
                @endphp
                {!!$icons[strToLower(session('response')['status'])]!!}
            <span>{!!session('response')['message']!!}</span>
        </div>
        <button onclick="this.closest('.toast').remove()" class="btn btn-ghost btn-xs ml-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>

<!-- Auto-dismiss in 4 seconds -->
<script>
    setTimeout(() => {
        const toast = document.getElementById('php-toast');
        if (toast) toast.remove();
    }, 4000);
</script>

@endsession
