<x-app-layout>
    @section('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
              integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
              crossorigin="anonymous">
        @include('links.datatablecss')
    @endsection

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$group->name}}
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('groups.index')}}">
                <i class="fas fa-arrow-left"></i>
                Orqaga
            </a>
        </div>
    </x-slot>

    <div class="container p-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        @include('admin.groups.group-info')
                    </div>
                    <div class="col-md-7 col-sm-12">
                        @include('admin.groups.student-payments')
                    </div>
                </div>
{{--                @include('admin.groups.show-student-table')--}}
                <livewire:group.group-students :group="$group"/>
            </div>
        </div>
    </div>

    @section('scripts')
        @include('links.datatablejs')
        <script>
            $(document).ready(function () {
                $('#students-table').DataTable(
                    {
                        responsive: true,
                    }
                );
            });
        </script>
    @endsection
</x-app-layout>
