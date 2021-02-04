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
             {{ __('Edit d\'un post') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                   <div class="p-6 hover:underline">
                       <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('admin.posts.index') }}">Retour vers la gestion des posts</a>
                   </div>
                   <h1 class="text-4xl">Edit d'un post</h1>
                   <hr><br>
                   <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                     {{-- Empêche les tentatives de hacking --}}
                      @csrf
                      {{ method_field('PUT') }}
                      {{-- TITLE --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="title">Title</label>
                        <input class="border py-2 px-3 text-grey-darkest" type="text" name="title" id="title" value="{{ $post->title }}">
                      </div>
                      {{-- CONTENT --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="content">Content</label>
                        <textarea class="border py-2 px-3 text-grey-darkest" name="content" id="content" rows="8" cols="80">{{ $post->content }}</textarea>
                      </div>
                      {{-- IMAGE --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="title">Image : {{ $post->image }} </label>
                        <input class="border py-2 px-3 text-grey-darkest" type="file" name="image" id="image" value="{{ $post->image }}">
                      </div>
                      {{-- CATEGORIE --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="categorie_id">Category</label>
                        <select class="border py-2 px-3 text-grey-darkest" name="categorie_id" id="categorie_id">
                          @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" @php if($categorie->id === $post->categorie_id) {echo 'selected';} @endphp>
                            {{ $categorie->name }}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      {{-- SUBMIT --}}
                      <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" name="submit">Submit</button>
                      </div>
                   </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
