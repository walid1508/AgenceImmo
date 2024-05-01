@extends('base')

@section('title', $property->title)


@section('content')
    <div class="container">
        <h1>{{ $property->title }}</h1>
        <h1>{{ $property->rooms }} pièces - {{ $property->surface }} m2</h1>

        <div class="text-primary fw-bold" style="font-size: 4rem">
            {{ number_format($property->price, thousands_separator: ' ') }} CAD
        </div>

        <hr>

        <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>

            <form action="" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom'])
                    @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
                    @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])
                    @include('shared.input', ['class' => 'col', 'name' => 'email', 'label' => 'Email', 'type' => 'email'])
                    @include('shared.input', ['class' => 'col', 'name' => 'message', 'label' => 'Votre message', 'type' => 'textarea'])
                    <div>
                        <button class="btn btn-primary">
                            Nous Contacter
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
