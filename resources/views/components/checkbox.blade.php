<label class="flex items-center dark:text-gray-400">
            <input type="checkbox"
            id="{{ $id }}"
            name="{{ $name }}"
            @if ($checked ?? false)
                checked
            @endif
                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <span class="ml-2">
                {{ $label }}
                <span class="underline">{{ $uLabel }}</span>
            </span>
        </label>