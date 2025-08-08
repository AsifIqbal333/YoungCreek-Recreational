@props(['category' => ''])
<div class="d-flex align-items-center justify-content-center flat-spacing">
    <a href="{{ route('contacts.index', $category ? ['category' => $category] : []) }}" class="tf-btn btn-onsurface">Get A
        Quote Today!</a>
</div>
