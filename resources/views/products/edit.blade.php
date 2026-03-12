<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">

    @csrf
    @method('PUT')

    Name
    <input type="text" name="name" value="{{ $product->name }}">

    price
    <input type="number" name="price" value="{{ $product->price }}">

    Description
    <textarea name="description">{{ $product->description }}</textarea>

    <button type="submit">Update</button>
</form>
