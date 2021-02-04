{{--
  Variables disponibles :
    - $categories : ARRAY(Categorie)
 --}}

 @php
   $categories = \App\Models\Categorie::orderBy('name', 'ASC')->get();
 @endphp

 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Ajout d\'un post') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                   <div class="p-6 hover:underline">
                       <a href="{{ route('admin.posts.index') }}">Retour vers la gestion des posts</a>
                   </div>
                   <h1>Ajout d'un post</h1>
                   <hr><br>
                   <form action="{{ route('admin.posts.store') }}" method="post">
                     {{-- Empêche les tentatives de hacking --}}
                      @csrf
                      {{-- TITLE --}}
                      <div>
                        <label for="title">Title</label>
                      </div>
                      <div>
                        <input type="text" name="title" id="title">
                      </div>
                      {{-- CONTENT --}}
                      <div>
                        <label for="content">Content</label>
                      </div>
                      <div>
                        <textarea name="content" id="content" rows="8" cols="80"></textarea>
                      </div>
                      {{-- IMAGE --}}
                      <div>
                        <label for="image">Image</label>
                      </div>
                      <div>
                        <input type="file" name="image" id="image">
                      </div>
                      {{-- CATEGORIE --}}
                      <div>
                        <label for="categorie_id">Category</label>
                      </div>
                      <div>
                        <select name="categorie_id" id="categorie_id">
                          @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- SUBMIT --}}
                      <br>
                      <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" name="submit">Submit</button>
                      </div>
                   </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
