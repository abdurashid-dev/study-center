<div>
    <x-jet-label for="full_name" value="F.I.O"/>
    <x-jet-input id="full_name" type="text" name="full_name" :value="old('full_name') ?? $student->full_name" required
                 autofocus/>
    <x-jet-input-error for="full_name" class="mt-2"/>
</div>
<div class="phone_numbers">
    <div>
        <x-jet-label for="phone" value="Telefon raqam"/>
        <x-jet-input class="phone" id="phone" type="phone" name="phone" :value="old('phone') ?? $student->phone"
                     required
                     autofocus/>
        <x-jet-input-error for="phone" class="mt-2"/>
    </div>
</div>
<div class="flex justify-end">
    <input type="button"
           class="phone_btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 mt-2" value="Qo'shish">
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
