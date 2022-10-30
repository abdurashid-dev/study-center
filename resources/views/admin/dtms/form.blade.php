<div>
    <x-jet-label for="name" value="DTM nomi"/>
    <x-jet-input id="name" type="text" name="name" :value="old('name') ?? $dtm->name" required
                 autofocus/>
    <x-jet-input-error for="name" class="mt-2"/>
</div>
<div>
    <x-jet-label for="count_tests" value="Testlar soni"/>
    <x-jet-input id="count_tests" type="number" name="count_tests" :value="old('count_tests') ?? $dtm->count_tests"
                 required
                 autofocus/>
    <x-jet-input-error for="count_tests" class="mt-2"/>
</div>
<div class="mb-3">
    <x-jet-label for="groups" value="Guruhlar"/>
    <select
        class="group-select block py-3 px-4 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="group_id" id="groups">
        <option value="">Umumiy test</option>
        @foreach($groups as $group)
            <option value="{{ $group->id }}" @if($dtm->group_id == $group->id) selected @endif>
                {{ $group->name }}
            </option>
        @endforeach
    </select>
    <x-jet-input-error for="group_id" class="mt-2"/>
</div>
<div>
    <x-jet-label for="description" value="Tavsif"/>
    <x-textarea id="description" name="description">{!!old('description') ?? $dtm->description!!}</x-textarea>
    <x-jet-input-error for="description" class="mt-2"/>
</div>
<div class="flex justify-end">
    <button
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 mt-2"
        type="submit">
        Saqlash
    </button>
</div>
