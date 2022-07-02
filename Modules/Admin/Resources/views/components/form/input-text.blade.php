<label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
    {{ $label }}
</label>
<input type="text"
       id="{{ $id ?? '' }}"
       class="{{ $class ?? '' }} {{ isset($readonly) && $readonly === true ? 'bg-gray-100' : '' }} border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
       value="{{ $value }}"
       name="{{ $name }}"
    {{ isset($placeholder) ? 'placeholder='. $placeholder  : '' }}
    {{ isset($readonly) && $readonly === true ? 'readonly' : '' }}
>
