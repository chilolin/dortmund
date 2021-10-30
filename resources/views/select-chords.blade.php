<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Select Chords</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark">
            <div class="container">
                <div class="col">
                    <div class="text-center">
                        <a class="navbar-brand text-warning" href="/">Dortmund</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">



            <form action="{{ route('merody') }}" method="GET" class="needs-validation" novalidate>
                <div class='col-12'>

                <div class="row p-3">

                        <x-chord-selector id="first-chord" name="firstChord" />
                        <x-chord-selector id="second-chord" name="secondChord" />
                        <x-chord-selector id="third-chord" name="thirdChord" />
                        <x-chord-selector id="forth-chord" name="forthChord" />

                </div>

             </div>


                <div class="row p-5">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-8">
                                <x-range-slider min="1" max="10" name="smoothness" />
                                <x-range-slider min="1" max="10" step="0.1" name="harmonious" />
                            </div>
                            <div class="col-2">
                            </div>
                        </div>

                    </div>

                    <x-scale-selector />


                </div>
                <div class="col text-right">
                    <button type="submit" class="btn btn-dark">メロディ生成</button>

                </div>

                <div>
                    {{-- <button type="submit">メロディ生成</button> --}}
                </div>
            </form>
        </div>
    </body>
</html>
