@props([
    'heading' => '',
    'items' => [],
    'showSafteyText' => false,
    'safteyText' => 'Selecting the right safety surfacing can be challenging, but our knowledgeable team is here to help.
        We provide expert guidance to determine the best solution for your project. Additionally, we offer a
        full range of surfacing accessories, including drainage systems, geotextile fabric, wear mats,
        containment curbing, and accessible ramps. No matter the size or budget of your project, we are
        committed to delivering safe, durable, and compliant surfacing solutions.',
])

<div class="terms-of-use-item item-scroll-target">
    @if ($heading)
        <h5 class="terms-of-use-title">{{ $heading }}</h5>
    @endif

    <div class="terms-of-use-content">
        @foreach ($items as $item)
            @php
                $explode = explode(':', $item);
            @endphp
            @if (count($explode) == 1)
                <p>{{ $item }}</p>
            @else
                <p><strong>{{ $explode[0] }}</strong>: {{ $explode[1] }}</p>
            @endif
        @endforeach
    </div>
</div>

@if ($showSafteyText)
    <p>{{ $safteyText }}</p>
@endif
