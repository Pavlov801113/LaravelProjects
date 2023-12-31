<div>
    <a href="/">Home</a>
</div>
<a href="{{ route('categories.create') }}">New Category</a>
@if(session('message'))
<div style="color: green;">{{ session('message') }}</div>
@endif
<table cellpadding="10" cellspacing="1" border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $key => $category)
        <tr>
            <td>{{ $categories->firstItem() + $key }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}">Edit</a>
                <form action="{{ route('categories.delete', $category) }}" method="post">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td collspan="5">No data found in table</td>
        </tr>
        @endforelse
    </tbody>
</table>