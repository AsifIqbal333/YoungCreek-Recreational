<p class="form-row form-row-wide">
    <label for="billing_country" class="">Country / Region&nbsp;<abbr class="required"
            title="required">*</abbr></label>
    {{-- @selected(old($attr_name, $default_value) == $item->id) --}}
    <select name="{{ $attr_name }}" id="billing_country" wire:change="$dispatch('countryChanged', $event.target.value)">
        <option value="">Select a country / region…</option>
        @foreach ($countries as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</p>
