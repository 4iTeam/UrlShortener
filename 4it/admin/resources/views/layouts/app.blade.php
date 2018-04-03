@extends('admin::layouts.base')
@section('breadcrumbs')
    {{-- {{Breadcrumbs::render()}} --}}
@endsection
@section('page')
    @hasSection('h1')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('h1')
                <small>@yield('h1sub')</small>
            </h1>
            @yield('breadcrumbs')
        </section>

    @endif
    <section class="content">
        <?php if ( $errors->has( 'error' ) )
            Message::error( $errors->first( 'error' ) );
        ?>
        @if(Message::has())
            <div class="row">
                <div class="col-lg-12">
                    {!! Message::display(true) !!}
                </div>
            </div>
        @endif
        @yield('content')
    </section>
@endsection
