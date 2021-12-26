@if (session('status'))
    <div class="border border-teal-500 text-teal-700 px-4 py-3 mb-3 rounded" role="alert">
        <p class="font-sm">{{ session('status') }}</p>
    </div>
@endif
