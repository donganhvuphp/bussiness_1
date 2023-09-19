@extends('client.layouts.app')

@section('title')
    {{ __('Giỏ hàng') }}
@endsection

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('client_assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ __('Giỏ hàng') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('client.home.index') }}">{{ __('Trang chủ') }}</a>
                            <span>{{ __('Giỏ hàng') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(!empty($carts))
        <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Name</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($carts as $cart)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="img/cart/cart-1.jpg" alt="">
                                            <h5> {{ $cart->product->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $cart->size }}
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ formatCurrency($cart->product->price, ' đ') }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $cart->quantity }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ formatCurrency($cart->price, ' đ') }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close"></span>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
{{--                            <li>Subtotal <span>$454.98</span></li>--}}
                            <li>Total <span>{{ formatCurrency($cart->shoppingSession->price_total, ' đ') }}</span></li>
                        </ul>
                        <a href="{{ route('client.order.store', ['id' => $cart->shoppingSession->id]) }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
        <section class="shoping-cart spad">
            <div class="container">
                <h3>Bạn chưa có sản phẩm nào trong giỏ hàng, hãy quay lại và tiếp tục mua sắm nào</h3>
            </div>
        </section>
    @endif
@endsection

@section('script')
    <script src="{{ asset('client_assets/js/product_detail.js') }}" type="module"></script>
@endsection
