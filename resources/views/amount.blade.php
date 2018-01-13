<head>
    {{-- TODO Ajax zamiast reloadu, ale raczej nie będzie bolało --}}
    <meta http-equiv="refresh" content="30" />
    <style>
        body{
            background-color: #0a0806ff;
            /*overflow-y:hidden;*/
            color: #fff;
            font-family: lato, sans-serif;
        }
        p {
            color: #fff;
        }
        #latawiec-image {
            height: 90%;
            display: block;
        }

        #wrapper {
            display: flex;
        }
        #latawiec {
            flex: 1;
        }
        #hajs {
            flex: 0 0 65%;
            text-align: center;
        }
        #serce-image {
            height: 30%;
            display: block;
            margin: 0 auto;
            margin-top: 5%;
        }
        #total {
            display: block;

            font-size: 3em;
        }
        .waluta {
            float: left;
            width: 25%;
        }
        #waluty {
            font-size: 2em;
        }
        footer {
            text-align: center;
        }
        h1 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="hajs">
        <h1>Sztab WOŚP przy Politechnice Poznańskiej</h1>
        <img id="serce-image" src="serce.png">

        <h1>Zebraliśmy:</h1>
        <div id="waluty">
            <div class="waluta">
                <p>{{ number_format($data['amount_PLN'], 2, ',', ' ') }}zł</p>
            </div>
            <div class="waluta">
                <p>{{ number_format($data['amount_EUR'], 2, ',', ' ') }}€</p>
            </div>
            <div class="waluta">
                <p>{{ number_format($data['amount_GBP'], 2, ',', ' ') }}£</p>
            </div>
            <div class="waluta">
                <p>{{ number_format($data['amount_USD'], 2, ',', ' ') }}$</p>
            </div>
        </div>

        <h1>W sumie (wg. aktualnego kursu NBP) około:</h1>

        <div id="total">
            {{ number_format($data['amount_total_in_PLN'], 2, ',', ' ') }}zł
        </div>
        <div>
            Wolontariuszy na mieście: {{ $data['collectors_in_city'] }}
        </div>
    </div>
    <div id="latawiec">
        <img id="latawiec-image" src="latawiec.png">
    </div>
</div>
<footer>
{{--    &copy 2017-{{ date('Y') }} <a href="http://wosp.put.poznan.pl/">Sztab WOŚP przy Politechnice Poznańskiej</a> i <a href="http://akai.org.pl">AKAI</a> <br>--}}
    Kursy: 1€->{{ $data['rates']['EUR'] }}zł
    1$->{{ $data['rates']['USD'] }}zł
    1£->{{ $data['rates']['GBP'] }}zł
</footer>

</body>
</html>

