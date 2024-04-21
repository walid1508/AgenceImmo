@extends('admin.admin')

@section('title', $property->exists ? 'Éditer un bien' : 'Créer un bien')


@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{route($property->exists ? 'admin.property.edit' : 'admin.property.store', ['property' => $property])}}"
          method="post"
    >

        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col' ,'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['class' => 'col', 'name' => 'price', 'label' => 'Prix', 'value' => $property->price])
            </div>
        </div>
        @include('shared.input', ['type' => 'textarea'  ,'class' => 'col' ,'label' => 'Description', 'name' => 'description', 'value' => $property->description])
        <div class="row">
            @include('shared.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Pièces', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Étages', 'value' => $property->floor])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address])
            @include('shared.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city])
            @include('shared.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code])
        </div>
        @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold])

        <div>
            <button class="btn btn-success">
                @if($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
