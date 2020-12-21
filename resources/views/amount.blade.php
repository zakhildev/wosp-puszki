@extends('layouts.home_page')

@section('content')
    <div class="collected_site--full row"
         style="background-image: linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.3) 0%), url('{{ asset('images/background.svg') }}')">
        <section class="main">
            <div class="final-logo">
                <img src="{{ asset('images/logo_final.svg') }}">
            </div>
            <h2>Zebraliśmy</h2>
            <h1 class="total">
                <span id="amount_total_in_PLN">
                    {{ number_format($data['amount_total_in_PLN'], 2, ',', ' ') }}
                </span>
                zł
            </h1>
        </section>
        <section class="details">
            <div class="currencies">
                <div class="currency">
                    <p>
                        <span id="amount_PLN">
                            {{ number_format($data['amount_PLN'], 2, ',', ' ') }}
                        </span>
                        zł
                    </p>
                </div>
                <div class="currency">
                    <p>
                        <span id="amount_EUR">
                            {{ number_format($data['amount_EUR'], 2, ',', ' ') }}
                        </span>
                        €</p>
                </div>
                <div class="currency">
                    <p>
                        <span id="amount_GBP">
                            {{ number_format($data['amount_GBP'], 2, ',', ' ') }}
                        </span>
                        £</p>
                </div>
                <div class="currency">
                    <p>
                        <span id="amount_USD">
                            {{ number_format($data['amount_USD'], 2, ',', ' ') }}
                        </span>
                        $</p>
                </div>
            </div>
            <div class="extras">
                <div class="extras-field">
                    <div class="extras-field-description">
                        Wolontariuszy
                    </div>
                    <div class="extras-field-description">
                        na mieście
                    </div>

                    <div class="extras-field-value" id="collectors_in_city">
                        {{ $data['collectors_in_city'] }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('footer')
    &copy 2017-{{ date('Y') }} <a href="http://wosp.put.poznan.pl/">Sztab WOŚP przy Politechnice Poznańskiej</a> i <a
            href="http://akai.org.pl" class="footer-akai"><span style="color: #FAA21B">A</span>KAI</a> <br>
    Kursy: 1€→{{ $data['rates']['EUR'] }}zł
    1$→{{ $data['rates']['USD'] }}zł
    1£→{{ $data['rates']['GBP'] }}zł
@endsection
