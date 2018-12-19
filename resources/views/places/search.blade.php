@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">      
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Please type here in text box to get search data</div>
                    <div class="panel-body">
                        <autocomplete v-debounce="500"></autocomplete>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('footer_scripts')
@endsection
