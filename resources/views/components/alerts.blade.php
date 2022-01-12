@if(session()->has('success'))
    <div
        x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="bg-blue-500 bottom-3 flex justify-center px-2 py-4 right-3 rounded-xl text-green-800 text-sm">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session()->has('error'))
    <div
        x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="bg-blue-500 bottom-3 flex justify-center px-2 py-4 right-3 rounded-xl text-red-800 text-sm">
        <p>{{ session('error') }}</p>
    </div>
@endif
