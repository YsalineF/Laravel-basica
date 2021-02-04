@foreach($posts as $post)
  <tr class="border">
    <td>{{ $post->id }}</td>
    <td>{{ $post->title }}</td>
    <td>{!! Str::of($post->content)->limit(50) !!}</td>
    <td><img src="{{ asset('assets/img/blog/'. $post->image) }}" alt="{{ $post->image }}"></td>
    <td>{{ \Carbon\Carbon::parse($post->created_at)->format('M j, Y') }}</td>
    <td>{{ \Carbon\Carbon::parse($post->updated_at)->format('M j, Y') }}</td>
    <td>{{ $post->categorie->name }}</td>
    <td>
      <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
      <a href="#">Delete</a>
    </td>
  </tr>
@endforeach
