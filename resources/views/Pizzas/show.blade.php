@extends('layouts.app')

@section('content')
        <div class="wrapper pizza-details">
            <h1> Order for {{  $pizza->name }} </h1>
            <p class="type"> Type - {{ $pizza->type }} </p>
            <p class="base"> Base - {{ $pizza->base }} </p>
            <p class='topings'>Extra Topings</p>
            <ul>
                @foreach($pizza->topings as $toping)
                <li>{{ $toping }}</li>
                @endforeach
            </ul>

            <form action="{{route('pizzas.destroy',$pizza->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Complete Order</button>
            </form>
        </div>

        <a href="/pizzas" class="back"> <- Back to all pizzas </a>
@endsection