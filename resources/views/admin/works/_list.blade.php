@foreach($works as $work)
  <tr class="border">
    <td class="border">{{ $work->id }}</td>
    <td class="border">{{ $work->title }}</td>
    <td class="border">{!! Str::of($work->content)->limit(50) !!}</td>
    <td class="border"><img src="{{ asset('assets/img/portfolio/'. $work->image) }}" alt="{{ $work->image }}"></td>
    <td class="border">
      @if ($work->inSlider === 1)
        yes
      @elseif($work->inSlider === 0)
        no
      @endif
    </td>
    <td class="border">{{ \Carbon\Carbon::parse($work->created_at)->format('M j, Y') }}</td>
    <td class="border">{{ \Carbon\Carbon::parse($work->updated_at)->format('M j, Y') }}</td>
    <td class="border">{{ $work->client->name }}</td>
    <td class="border">
      <p>@include('tags._work_tags', ['tags' => $work->tags])</p>
    </td>
    <td class="border">
      <a href='{{ route('admin.works.edit', $work->id) }}'>Edit</a>
      <form action="{{ route('admin.works.delete', $work->id) }}" method="post">
        {{-- Protection contre les tentatives de hacking --}}
        {{-- Obligation d'utiliser un form car une url a une methode GET et
              on a besoin de la methode DELETE --}}
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" name="delete">Delete</button>
      </form>
    </td>
  </tr>
@endforeach
