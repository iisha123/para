@extends('layout')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Votre Panier</h1>
    <div class="bg-white rounded-lg shadow-md p-6">
        @if($order && $order->order_details)
            @php
                $items = json_decode($order->order_details, true);
                $subtotal = 0;
            @endphp
            <table class="table-auto w-full mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Produit</th>
                        <th class="px-4 py-2">Prix</th>
                        <th class="px-4 py-2">Quantité</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        @php $itemTotal = $item['price'] * $item['quantity']; $subtotal += $itemTotal; @endphp
                        <tr>
                            <td class="border px-4 py-2">{{ $item['name'] }}</td>
                            <td class="border px-4 py-2">{{ number_format($item['price'], 2) }} €</td>
                            <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                            <td class="border px-4 py-2">{{ number_format($itemTotal, 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-between items-center mb-4">
                <span class="text-gray-700">Sous-total:</span>
                <span class="font-semibold">{{ number_format($subtotal, 2) }} €</span>
            </div>
            <div class="flex justify-between items-center mb-4">
                <span class="text-gray-700">TVA (20%):</span>
                <span class="font-semibold">{{ number_format($subtotal * 0.2, 2) }} €</span>
            </div>
            <div class="flex justify-between items-center mb-4 text-lg">
                <span class="font-bold">Total:</span>
                <span class="font-bold">{{ number_format($subtotal * 1.2, 2) }} €</span>
            </div>
            <div class="flex justify-end mt-6">
                <a href="{{ route('checkout') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200">Process to End Order</a>
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500 text-xl">Votre panier est vide</p>
                <a href="{{ route('produits.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">Continuer vos achats</a>
            </div>
        @endif
    </div>
</div>
@endsection 