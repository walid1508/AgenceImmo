@extends('base')

@section('title', 'Les Biens')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi asperiores cum doloremque eius, error est, exercitationem facere fugit neque quisquam sequi tenetur unde voluptas voluptatem. Ab doloribus harum minima?
            </p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
            @endforeach
        </div>
    </div>

@endsection
