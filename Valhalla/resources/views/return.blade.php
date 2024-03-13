{{-- Author @BM786 = Basit Ali Mohammad --}}
<x-guest-layout>
    <div class=" mb-4 text-white">
        <h2 class="text-2xl font-bold px-4 py-2 mt-0">Return Request</h2>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('return.request.submit') }}" class="max-w-md mx-auto bg-violet-700 rounded shadow p-4">
        @csrf

        <!-- Order Number -->
        <div class="mb-4">
            <x-input-label for="orderNumber" :value="__('Order Number')" class="text-white" />
            <x-text-input id="orderNumber" class="block mt-1 w-full" type="text" name="orderNumber" :value="old('orderNumber')" required autofocus />
            <x-input-error :messages="$errors->get('orderNumber')" class="mt-2" />
        </div>

        <!-- Item Name -->
        <div class="mb-4">
            <x-input-label for="productName" :value="__('Product Name')" class="text-white" />
            <x-text-input id="productName" class="block mt-1 w-full" type="text" name="productName" :value="old('productName')" required />
            <x-input-error :messages="$errors->get('productName')" class="mt-2" />
        </div>

        <!-- Reason for Return -->
        <div class="mb-4">
            <x-input-label for="reason" :value="__('Reason for Return')" class="text-white" />
            <select id="reason" name="reason" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                <option value="">Select a reason</option>
                <option value="Defective">Defective</option>
                <option value="Wrong Item">Wrong Item</option>
                <option value="Changed Mind">Changed my Mind</option>
                <option value="Other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>

        <!-- Preferred Resolution -->
        <div class="mb-4">
            <x-input-label for="resolution" :value="__('Preferred Resolution')" class="text-white" />
            <select id="resolution" name="resolution" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                <option value="">Select a resolution</option>
                <option value="Refund">Refund</option>
                <option value="Exchange">Exchange</option>
            </select>
            <x-input-error :messages="$errors->get('resolution')" class="mt-2" />
        </div>

        <!-- Comments -->
        <div class="mb-4">
            <x-input-label for="comments" :value="__('Comments')" class="text-white" />
            <textarea id="comments" name="comments" rows="4" class="form-textarea rounded-md shadow-sm mt-1 block w-full" required>{{ old('comments') }}</textarea>
            <x-input-error :messages="$errors->get('comments')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
    <div class="items-center justify-start -mt-12 ml-3.5">
        <x-primary-button onclick="goBack()">
            {{ __('Back') }}
        </x-primary-button>
    </div>
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</x-guest-layout>

