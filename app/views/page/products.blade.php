@extends( 'layout.master' )

@section( 'content' )
<ul>
 @foreach( $products as $k => $product )
 <li>
 <h3>{{ $product->name  }}</h3>
 <p>R {{ number_format($product->price,2, '.', ',') }}</p>
 <form action="/orders/place" method="post">
 <input type="hidden" name="product_id" value="{{ $product->id }}">
 <input type="submit" value="Buy Now">
 </form>
 </li>
 @endforeach
</ul>
@stop