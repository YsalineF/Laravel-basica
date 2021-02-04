<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <table class="table-fixed border-collapse">
                    <thead>
                      <tr>
                        <th class="border w-1/12">ID</th>
                        <th class="border w-1/6">Title</th>
                        <th class="border w-1/4">Content</th>
                        <th class="border w-1/12">Image</th>
                        <th class="border w-1/6">Created at</th>
                        <th class="border w-1/6">Updated at</th>
                        <th class="border w-1/12">Categorie</th>
                        <th class="border w-1/2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @include('admin.posts._list')
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
