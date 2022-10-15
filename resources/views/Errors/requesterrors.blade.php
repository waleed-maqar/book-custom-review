@if ($errors->any())
    <div class="request-errors" id="requestErrors">
        <span class="btn element-hide-btn request-errors-hide-btn" data-element="#requestErrors">
            <i class="fa-solid fa-rectangle-xmark fa-2xl"></i>
        </span>
        @foreach ($errors->all() as $error)
            <span class="d-block alert alert-request-error pt-1">
                {{ $error }}
            </span>
        @endforeach
    </div>
@else
    {{-- <div class="request-errors" id="requestErrors">
        <span class="btn element-hide-btn request-errors-hide-btn" data-element="#requestErrors">
            <i class="fa-solid fa-rectangle-xmark fa-2xl"></i>
        </span>
        @for ($i = 1; $i < 10; $i++)
            <span class="d-block alert alert-request-error pt-1">
                Expermintal Test Error to examin style of errors container
            </span>
        @endfor
    </div> --}}
@endif
