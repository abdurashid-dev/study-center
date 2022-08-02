<div>
    <x-jet-label for="full_name" value="F.I.O"/>
    <x-jet-input id="full_name" type="text" name="full_name" :value="old('full_name') ?? $student->full_name" required
                 autofocus/>
    <x-jet-input-error for="full_name" class="mt-2"/>
</div>
<div class="flex items-end mb-3">
    <div class="phone_numbers relative w-full mr-3 revue-form-group">
        <div>
            <x-jet-label for="phone" value="Telefon raqam"/>
            <x-jet-input class="phone w-100" id="phone" type="phone" name="phones[]"
                         :value="old('phone') ?? $student->phone"
                         required
                         autofocus/>
            <x-jet-input-error for="phone" class="mt-2"/>
        </div>
    </div>
    <div>
        <input type="button"
               class="phone_btn py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-black-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
               value="Qo'shish">
    </div>
</div>
<div class="mb-3">
    <x-jet-label for="groups" value="Guruhlar"/>
    <select
        class="group-select block py-3 px-4 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="groups[]" multiple="multiple" id="groups">
        @foreach($groups as $group)
            <option value="{{ $group->id }}">
                {{ $group->name }}
            </option>
        @endforeach
    </select>
    <x-jet-input-error for="groups" class="mt-2"/>
</div>
<div>
    <x-jet-label for="address" value="Manzil"/>
    <x-jet-input id="address" type="text" name="address" :value="old('address') ?? $student->address" required
                 autofocus/>
    <x-jet-input-error for="address" class="mt-2"/>
</div>
<div>
    <x-jet-label for="description" value="Tavsif"/>
    <x-textarea id="description" name="description">{!!old('description') ?? $student->description !!}</x-textarea>
    <x-jet-input-error for="description" class="mt-2"/>
</div>
<div class="flex justify-end">
    <button
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 mt-2"
        type="submit">
        Saqlash
    </button>
</div>
