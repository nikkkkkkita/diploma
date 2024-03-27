@if (count($breadcrumbs))
    <ol class="custom-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="custom-breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="custom-breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endif
