<div class="mb-3">
    <x-jet-label for="student_id" value="O'quvchilar"/>
    <select
        class="student-select block py-3 px-4 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="student_id" id="student_id">
        <option value="" selected disabled>O'quvchini tanlang</option>
        @foreach($students as $student)
            <option value="{{ $student->id }}">
                {{ $student->full_name }}
            </option>
        @endforeach
    </select>
    <x-jet-input-error for="student_id" class="mt-2"/>
</div>
<div>
    <x-jet-label for="payment" value="To'lov summasi"/>
    <x-jet-input id="payment" type="number" name="payment" :value="old('payment')" required autofocus/>
    <x-jet-input-error for="payment" class="mt-2"/>
</div>
<div>
    <x-jet-label for="comment" value="Tavsif"/>
    <x-textarea id="comment" name="comment">{!!old('comment')!!}</x-textarea>
    <x-jet-input-error for="comment" class="mt-2"/>
</div>
<div class="flex justify-end">
    <button
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 mt-2"
        type="submit">
        Saqlash
    </button>
</div>
