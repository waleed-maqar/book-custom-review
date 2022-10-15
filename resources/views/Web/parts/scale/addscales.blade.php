<form action="{{ route('scale.store', $book->id) }}" method="POST" style="padding:5px; border: 5px solid blue;">
    <h3>
        Add scales
    </h3>
    @if ($errors)
        @foreach ($errors->all() as $error)
            <span class="alert alert-danger p-4" style="height: 40px;">
                {{ $error }}
            </span> <br><br>
        @endforeach
    @else
    @endif
    @csrf @method('PUT')
    @for ($i = 1; $i <= 3; $i++)
        <div>
            <input type="text" name="scales[{{ $i }}][scale]">
        </div>
        <div class="">
            <textarea name="scales[{{ $i }}][explain]" id="" cols="30" rows="1"></textarea>
        </div>
    @endfor
    <input type="submit" value="Add">
</form>
