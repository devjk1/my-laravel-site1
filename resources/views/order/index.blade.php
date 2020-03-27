@extends ('layout')

@section ('content')

    <h1>{{ $customer->first_name . ' ' . $customer->last_name }}'s Orders</h1>

    <ul>
        @foreach ($orders as $order)

            <li>
                <a href="{{ route('order.show', ['order' => $order, 'customer' => $customer]) }}">
                    <div>{{ $order->id }}</div>
                    <div>{{ $order->customer_id }}</div>
                    <div>{{ $order->created_at }}</div>
                </a>
            </li>

        @endforeach
    </ul>

@endsection
