<x-app-layout>

    <div class="p-6">

        <h2 class="text-2xl font-bold text-white mb-6 text-center">
            Product Magement
        </h2>

        {{-- Success Alert --}}
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                })
            </script>
        @endif

        <div class="flex justify-between items-center py-4">

            {{-- Search --}}
            <form method="GET" action="{{ route('products.index') }}" class="flex items-center gap-2">

                <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                    placeholder="🔎 Search product..."
                    class="border rounded-lg px-4 py-2 w-64 focus:ring-2 focus:ring-blue-400" onkeyup="liveSearch()">

                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('products.index') }}"
                        class="bg-red-400 hover:bg-red-500 text-white px-3 py-2 rounded">
                        ✖
                    </a>
                @endif

                {{-- Add Product --}}
                <a href="{{ route('products.create') }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    ➕ Add Product
                </a>

            </form>
        </div>

        {{-- Table --}}
        <table class="w-full border rounded-lg overflow-hidden">

            <thead class="bg-gray-200 text-gray-700">

                <tr>
                    <th class="px-4 py-3 text-center w-16">#</th>
                    <th class="px-4 py-3 text-left"><a
                            href="{{ route('products.index', ['sort' => 'name', 'search' => request('search')]) }}">Name
                            🔽
                    </th>
                    <th class="px-4 py-3 text-left"><a
                            href="{{ route('products.index', ['sort' => 'price', 'search' => request('search')]) }}">Price
                            🔽
                    </th>
                    <th class="px-4 py-3 text-center w-40">Action</th>
                </tr>

            </thead>

            <tbody class="divide-y" id="productTable">

                @forelse ($products as $product)
                    <tr class="hover:bg-blue-50 odd:bg-white even:bg-gray-50">

                        <td class="px-4 py-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $product->name }}
                        </td>

                        <td class="px-4 py-3 text-left">
                            ฿{{ number_format($product->price, 2) }}
                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    ✏
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded delete-btn"
                                        data-name="{{ $product->name }}">
                                        🗑
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">
                            📦 No products found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $products->onEachSide(1)->links() }}
        </div>

        <style id="j4e3p6">
            .pagination svg {
                width: 16px;
                height: 16px;
            }

            .pagination a {
                transition: all 0.2s ease;
            }

            .pagination a:hover {
                transform: translateY(-1px);
            }
        </style>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function liveSearch() {

            let search = document.getElementById('searchInput').value;

            fetch(`/products?search=${search}`)
                .then(response => response.text())
                .then(data => {

                    let parser = new DOMParser();
                    let html = parser.parseFromString(data, 'text/html');

                    let newTable = html.querySelector("#productTable").innerHTML;

                    document.querySelector("#productTable").innerHTML = newTable;

                });
        }

        document.querySelectorAll('.delete-btn').forEach(button => {

            button.addEventListener('click', function(e) {

                e.preventDefault();

                let form = this.closest("form");
                let productName = this.dataset.name;

                Swal.fire({
                    title: `Delete "${productName}" ?`,
                    text: "This action cannot be undone.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#ef4444",
                    cancelButtonColor: "#6b7280",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel"
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });
    </script>

</x-app-layout>
