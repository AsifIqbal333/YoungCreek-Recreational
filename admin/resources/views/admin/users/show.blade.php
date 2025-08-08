@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.breadcrumbs', ['title' => 'Users'])

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            {{-- Alert Messages --}}
            @include('admin.partials.alert')

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam totam quam qui repudiandae, deleniti
                voluptatum neque enim soluta mollitia. Quam doloremque iusto aspernatur provident enim. Voluptates dolores
                optio incidunt fugit.</p>
        </div>
    </div>
@endsection
