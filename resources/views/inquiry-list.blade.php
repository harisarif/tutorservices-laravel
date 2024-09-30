

@php
    $inquires = DB::table('inquiries')->get();
@endphp
    {{-- <h1>All Students</h1> --}}
    <div class="AB-sb">
        <table class="student-table table table-responsive">
            <thead>
                <tr>
                <th> <input class="form-check-input" type="checkbox" id="select-all-inquiry">
                <label class="form-check-label" for="select-all"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inquires as $inquiry)
                <tr>
                <td>
                    <input class="form-check-input inquiry-checkbox" type="checkbox" value="{{ $inquiry->id }}" id="flexCheckChecked-{{ $inquiry->id }}">
                    <label class="form-check-label" for="flexCheckChecked-{{ $inquiry->id }}"></label>
                </td>
                    <td>{{ $inquiry->id }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone }}</td>
                    <td>{{ $inquiry->description }}</td>
                    <td>
                        <a href="{{ route('edit-student', $inquiry->id) }}" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('students.destroy', $inquiry->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
