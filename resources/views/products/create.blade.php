<x-app-layout>

    <div class="p-6">

        <h2 class="text-2xl font-bold text-white mb-6 text-center">
            ➕ Add Product
        </h2>

        {{-- center form --}}
        <div class="flex justify-center">

            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl">

                <form action="{{ route('products.store') }}" method="POST">

                    @csrf

                    {{-- Product Name --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">
                            Product Name
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter product name">

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">
                            Price
                        </label>

                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter price">

                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">
                            Description
                        </label>

                        <textarea name="description" rows="3" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            placeholder="Product description">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-3">

                        <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg">
                            Add Product
                        </button>

                        <a href="{{ route('products.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
