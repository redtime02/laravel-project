@extends('layouts.app')

@section('title', 'Cảm ơn quý khách')

@section('content')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    {{-- @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif --}}
                    <div class="p-4 shadow bg-white">
                        <img src="{{ asset('assets/img/success-green-check-mark.png') }}" alt="Check Logo" style="width:150px; height:150px">
                        <h4>Cảm ơn quý khách đã đến mua sắm tại Computer Shop !</h4>
                        <a href="{{ url('collections') }}" class="btn btn-primary">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
