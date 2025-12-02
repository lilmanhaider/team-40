
<form id="productsearch" action="{{ route('product') }}" method="POST">
    @csrf
    <input type="hidden" name="category" id="category">
    <button type="button" onclick="category('games')">game</button>
    <button type="button" onclick="category('console')">console</button>
    <button type="button" onclick="category('accessory')">accessory</button>
    <button type="button" onclick="category('service')">service</button>
</form>
@foreach($products as $product)
    <div>
        <p>{{$product->category}}</p>
            
    </div>
@endforeach

<script>
    function category(value) {
        document.getElementById('category').value = value;
        document.getElementById('productsearch').submit();
    }
</script>
