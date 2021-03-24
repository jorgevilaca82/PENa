@props(['disabled' => false, 'items' => [], 'selectedID' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300
    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    <option>--</option>
    @foreach ($items as $key => $value)
    <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>
        {{ $value }}
    </option>
    @endforeach
</select>