<label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">{{ $label }}</span>
        <textarea id="{{ $id }}" name="{{ $name }}"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="{{ $rows }}"
                placeholder="Enter some long form content.">{{ $value ?? old($name) ?? "" }}</textarea>
</label>