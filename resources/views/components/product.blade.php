@php
    $user = Auth::user();
    $products = $user->shop?->products;
@endphp


