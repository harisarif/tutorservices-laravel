

@php
    $students = DB::table('student')->get();
@endphp
    {{-- <h1>All Students</h1> --}}
    <div class="AB-sb">
        <table class="student-table table table-responsive">
            <thead>
                <tr>
                    <th><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked"></label></td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->country }}</td>
                    <td>{{ $student->city }}</td>
                    <td>{{ $student->subject }}</td>
                    <td>
                        <a href="{{ route('edit-student', $student->id) }}" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
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
    
