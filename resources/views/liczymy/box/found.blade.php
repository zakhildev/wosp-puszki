@extends('layouts.app')

@section('styles')
    <style>
        {{-- TODO wycentrować ten jebany przycisk i checkbox --}}
        .center-block {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection

@section('content')
    <h4>Znaleziono puszkę {{ $box->id }}</h4>
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <td>Wolontariusz</td>
                <td>{{ $collector->firstName }} {{ $collector->lastName }}</td>
            </tr>
            <tr>
                <td>Numer identyfikatora i na puszce</td>
                <td>{{ $collector->identifier }}</td>
            </tr>
        <tr>
            <td>ID puszki w bazie</td>
            <td>{{ $box->id }}</td>
        </tr>
        </tbody>
    </table>
    <ul style="text-align: center; font-size: 2em;list-style-type: none;">
        <li>Potwierdź że dane z puszki i identyfikatora są zgodne z wyświetlonymi.</li>
        <li>Potwierdź że puszka nie nosi śladów uszkodzeń.</li>
        <li>Nie oddawaj rozliczonej puszki wolontariuszowi.</li>
    </ul>
    <div class="center-block">
        <form class="form-horizontal" method="POST" action="{{ route('box.findConfirm') }}">
            <fieldset>

                {{ csrf_field() }}

                {{-- Cichy alarm --}}
                <div class="form-group center-block">
                    <label class="control-label" for="silent-alarm">PU</label>
                    <input type="checkbox" id="silentalarm" name="silentalarm" @if(old('silentalarm')) checked @endif>
                </div>
                {{-- Przekazujemy ID puszki --}}
                <input type="hidden" value="{{ $box->id }}" name="boxID">
                <!-- Button -->
                <div class="form-group center-block">
                    <label class="control-label" for="singlebutton">Zgodność z danymi rzeczywistymi</label><br>
                    <div class="">
                        <button id="singlebutton" name="singlebutton" class="btn btn-success btn-lg">Potwierdzam</button>
                    </div>
                </div>


            </fieldset>
        </form>
    </div>


@endsection