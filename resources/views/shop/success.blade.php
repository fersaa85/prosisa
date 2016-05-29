@extends('template')
@section('section')
    <div class="container">
        <div class="row">
            <div class="list_products_catalog marginBottom texe-center" style="border-bottom:0px;" >
                     {!!  $languaje["buy_success"]  !!}
                    <h1 class="text-center">{{ $order_id }}.</h1>
            </div>
        </div>
    </div>
@endsection