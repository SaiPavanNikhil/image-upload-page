<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>displaying Content</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style1.css')}}"></link> 
</head>
<body>
    <h2>Displaying Content</h2>
    <table id="image-table" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Operations</th>
        </tr>
        <!-- table data will be displayed here -->
        @foreach($images as $image)
        <tr>
            <td>{{ $image->id }}</td>
            <td>{{ $image->name }}</td>
            <td>{{ $image->email }}</td>
            <td><img src="{{ asset('app/public/uploads/'. $image->image) }}" style="width:60px; height:50px" alt="Image"></td>
            <td>
                {{-- <button>edit</button> --}}
                {{-- <button>delete</button> --}}
                <form action="{{ route('edit', $image->id) }}" method="GET" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </form>
                <form action="{{ route('delete', $image->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    &nbsp;&nbsp;<button type="button" id="back-button">Back</button>
    <script>
        document.getElementById('back-button').addEventListener('click', function() {
            window.location.href = "{{ route('upload') }}";
        });
    </script>
     <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete your data?');
        }
    </script>
    
</body>
</html>