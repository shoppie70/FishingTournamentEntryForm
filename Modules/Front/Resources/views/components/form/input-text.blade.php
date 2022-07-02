<label class="block text-sm font-bold text-gray-700" for="{{ $id ?? '' }}">
    {{ $title }}
</label>
<input
    class="{{ isset($readonly) ? 'bg-gray-100' : '' }} text-right rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
    id="{{ $id ?? '' }}" type="text" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}"
    {{ isset($required) ? 'required' : '' }} {{ isset($readonly) ? 'readonly' : '' }} autofocus="autofocus">
