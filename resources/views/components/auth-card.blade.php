<div class="min-h-screen flex flex-col sm:justify-center card card-md border-0">
    <div>
        {{ $logo??'' }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
