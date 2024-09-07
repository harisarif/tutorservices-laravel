
@php
    $tutors = DB::table('tutors')->get();
@endphp
    {{-- <h1>All Teachers</h1> --}}
    <div class=" AB-sb">
        <table class="table teachers-table">
            <thead>
                <tr>
                    <th><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Experience</th>
                    <th>Availability</th>
                    <th>Phone</th>
                    {{-- <th>DOB</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutors as $tutor)
                <tr>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked"></label></td>
                    <td>{{ $tutor->id }}</td>
                    <td>{{ $tutor->f_name }} {{ $tutor->l_name }}</td>
                    <td>{{ $tutor->qualification }}</td>
                    <td>{{ $tutor->gender }}</td>
                    <td>{{ $tutor->location }}</td>
                    <td>{{ $tutor->city }}</td>
                    <td>{{ $tutor->experience }} {{ $tutor->experience > 1 ? 'years' : 'year' }}</td>
                    <td>{{ $tutor->availability }}</td>
                    <td>{{ $tutor->phone }}</td>
                    {{-- <td>{{ $tutor->dob }}</td> --}}
                    <td>
                        <a href="{{ route('edit-teacher', $tutor->id) }}" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('teachers.destroy', $tutor->id) }}" method="POST" style="display:inline;">
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
    
    
