@extends ('layout')

@section ('content')

    <h1>{{ $customer->first_name . ' ' . $customer->last_name }}'s Order</h1>

    <ul>
        @foreach ($orderLines as $orderLine)

            <li>
                <div>Product_id: {{ $orderLine->product_id }}</div>
                <div>Quantity: {{ $orderLine->quantity }}</div>
            </li>

        @endforeach
    </ul>

@endsection
