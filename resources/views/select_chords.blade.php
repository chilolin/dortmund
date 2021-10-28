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
        <div class='container'>
            <form action="{{ route('merody') }}" method="GET">
                <label for="first-chord">Choose a first-chord:</label>
                <select name="first_chord" id="first-chord">
                    <option value="">--Please choose an option--</option>
                    @foreach($chords as $chord)
                            <option value="{{ $chord->id }}" @if (old('first_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                    @endforeach
                </select>
                @error('first_chord')
                    <p>必ず指定してください。</p>
                @enderror
    
                <label for="second-chord">Choose a second-chord:</label>
                <select name="second_chord" id="second-chord">
                    <option value="">--Please choose an option--</option>
                    @foreach($chords as $chord)
                        <option value="{{ $chord->id }}" @if (old('second_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                    @endforeach
                </select>
                @error('second_chord')
                    <p>必ず指定してください。</p>
                @enderror
    
                <label for="third-chord">Choose a third-chord:</label>
                <select name="third_chord" id="third-chord">
                    <option value="">--Please choose an option--</option>
                    @foreach($chords as $chord)
                        <option value="{{ $chord->id}}" @if (old('third_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                    @endforeach
                </select>
                @error('third_chord')
                    <p>必ず指定してください。</p>
                @enderror
    
                <label for="forth-chord">Choose a forth-chord:</label>
                <select name="forth_chord" id="forth-chord">
                    <option value="">--Please choose an option--</option>
                    @foreach($chords as $chord)
                        <option value="{{ $chord->id }}" @if (old('forth_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                    @endforeach
                </select>
                @error('forth_chord')
                    <p>必ず指定してください。</p>
                @enderror

                <h6>キー選択</h6>
                <?php $keys = DB::table('keys')->whereBetween('id', [52, 64])->get(); ?>
                <?php foreach($keys as $val){ ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="keys[]" id="keys1" value="{{ $val->id }}" 
                    <?php if (strpos($val->name,'#') === false) echo("checked"); ?> 
                    > 
                    <label class="form-check-label" for="keys1">
                      <?php echo($val->name)?>
                    </label>
                </div>
                <?php  } ?>
                
    
                <button type="submit">メロディ生成</button>
    
                
            </form>
        </div>
        
    </body>
</html>
