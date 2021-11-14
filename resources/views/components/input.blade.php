@props([
    'value' => "",
    "label" => "",
    "type" => "text",
    "id" => "",
    "name" => "",
    "theme" => "gray",
    "note"=>""
])

<label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $label }}
    </span>
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        class="block w-full mt-1 text-sm border-{{ $theme }}-600 dark:text-{{ $theme }}-300 dark:bg-gray-700 focus:border-{{ $theme }}-400 focus:outline-none focus:shadow-outline-red form-input"
        placeholder="Lorem ipsum dolrem set hums...">
    <span class="text-xs text-{{ $theme }}-600 dark:text-{{ $theme }}-400">
        {{ $note }}
    </span>
</label>