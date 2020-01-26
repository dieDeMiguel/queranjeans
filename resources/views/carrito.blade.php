@extends('plantilla')

@section("titulo")

QueranJeans - CARRITO

@endsection

@section("principal")


<div class="contenedorCarrito">
    <section class="carrito">
       
            @php
                $total = 0;
            @endphp

            <h2 style="text-align: center;">Numero de Orden de Compra: #{{$carrito[0]->id}}</h2>
            @forelse($result as $product) 
          
            <article class="productoCarrito">
                <img src="{{$product->image}}" alt="">
                <span class="nombreProducto" ><a href="/{{$product->category}}">{{$product->name}} {{$product->category}}</a></span>
                <span>${{$product->price}}</span>
                <span class="spanCantidad">{{$product->quantity}}</span>

                <form class="formCarrito" action="/eliminar" method="post">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <button class="botonMobile" type="submit"><i class="large material-icons">delete</i></button>
                    <button class="botonWeb" type="submit" style="border-radius: 10px;"><i class="large material-icons">delete</i>Eliminar</button>
                </form>
            </article>
           
            @php
                $total += $product->price * $product->quantity;
            @endphp

            @empty
                <h3 style="text-align: center;">Sin productos en el Carrito</h3>
            @endforelse
            <span class="totalCarrito" style="text-align: right; padding: 9px;">Total: ${{$total}}</span>

    </section>
    <form class="botonFinalizar" action="/finalizarcompra" method="post">
        @csrf
        @php
            if(empty($carritoActivo->products->count())){
                echo '<button type="submit" disabled>Finalizar Compra</button>';
            } else {
                echo '<button class="boton1" type="submit">Finalizar Compra</button>';  
            }
        @endphp
    </form>
</div>
@stop