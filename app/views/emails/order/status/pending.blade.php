@extends( 'emails.layout.master' )

@setion( 'content' )
<p>The order ID {{ $order_id  }} is in a pending state.</p>

@stop

@section( 'heading' )
Order Pending
@stop