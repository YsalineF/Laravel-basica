{{--
  Variables disponibles :
    - $clients : ARRAY(Client)
    - $tags : ARRAY(Tag)
 --}}

 @php
   $clients = \App\Models\Client::orderBy('name', 'ASC')->get();
   $tags = \App\Models\Tag::orderBy('name', 'ASC')->get();
 @endphp



 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Ajout d\'un work') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                   <div class="p-6 hover:underline">
                       <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('admin.works.index') }}">Retour vers la gestion des works</a>
                   </div>
                   <h1 class="text-4xl">Ajout d'un work</h1>
                   <hr><br>
                   <form action="{{ route('admin.works.store') }}" method="post">
                     {{-- Empêche les tentatives de hacking --}}
                      @csrf
                      {{-- TITLE --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="title">Title</label>
                        <input class="border py-2 px-3 text-grey-darkest" type="text" name="title" id="title">
                      </div>
                      {{-- CONTENT --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="content">Content</label>
                        <textarea class="border py-2 px-3 text-grey-darkest" name="content" id="content" rows="8" cols="80"></textarea>
                      </div>
                      {{-- IMAGE --}}
                      <divclass="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">Image</label>
                        <input class="border py-2 px-3 text-grey-darkest" type="file" name="image" id="image">
                      </div>
                      {{-- INSLIDER --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="inSlider">In Slider</label>
                        <select class="border py-2 px-6 text-grey-darkest" name="inSlider" id="inSlider">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                      </div>
                      {{-- CLIENT --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="client_id">Client</label>
                        <select class="border py-2 px-3 text-grey-darkest" name="client_id" id="client_id">
                          @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- TAGS --}}
                      <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="tags">Tags</label>
                        <p>Press CTRL + click to select multiple tags</p>
                        <select class="border py-2 px-3 text-grey-darkest" name="tags[]" id="tag" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div>
                        <button class="block uppercase text-lg mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" name="submit">Submit</button>
                      </div>
                   </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
