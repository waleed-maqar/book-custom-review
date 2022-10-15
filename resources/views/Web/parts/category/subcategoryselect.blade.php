@if ($action == 'update')
    <select name="categories[]" class="form-control" multiple>
        @forelse ($category->subCats as $cat)
            <option value="{{ $cat->id }}" @selected($cat->is_containing($book->id)) class="mb-1">
                {{ $cat->name }}</option>
        @empty
        @endforelse
    </select>
@else
    <select name="categories[]" class="form-control" multiple>
        @forelse ($category->subCats as $cat)
            <option value="{{ $cat->id }}" class="mb-1">{{ $cat->name }}</option>
        @empty
        @endforelse
    </select>
@endif
