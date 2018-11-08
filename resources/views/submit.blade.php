
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Nowy link</h1>
            <form action="/submit" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Tytuł</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="tytył" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Adres www</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="adres www" value="{{ old('url') }}">
                    @if($errors->has('url'))
                        <span class="help-block">{{ $errors->first('url') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Opis</label>
                    <textarea class="form-control" id="description" name="description" placeholder="opis">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
             
                <button type="submit" class="btn btn-default">Dodaj</button>
                   {{--
                <a  href="{{ url('/') }}" ><button type="submit" formnovalidate="formnovalidate" class="btn btn-default">Anuluj</button></a>
                --}}
            </form>
           
        </div>
    </div>
@endsection