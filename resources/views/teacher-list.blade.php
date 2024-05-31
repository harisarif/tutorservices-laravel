<style>
    /* CSS for table styling */
    table {
        border-collapse: collapse; /* Collapse borders */
        width: 100%; /* Full width */
    }
    th, td {
        border: 1px solid #dddddd; /* Add borders to cells */
        padding: 8px; /* Add padding */
        text-align: left; /* Align text to the left */
    }
    th {
        background-color: #f2f2f2; /* Background color for header */
    }
    
    tbody td {
        text-align: center !important;
        white-space: nowrap !important;
    }
</style>
@php
    $tutors = DB::table('tutors')->get();
@endphp
    {{-- <h1>All Teachers</h1> --}}
    <table class="teachers-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Degree</th>
                <th>Gender</th>
                <th>Country</th>
                <th>City</th>
                <th>Experience</th>
                <th>Availability</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutors as $tutor)
            <tr>
                <td>{{ $tutor->id }}</td>
                <td>{{ $tutor->f_name }} {{ $tutor->l_name }}</td>
                <td>{{ $tutor->qualification }}</td>
                <td>{{ $tutor->gender }}</td>
                <td>{{ $tutor->location }}</td>
                <td>{{ $tutor->city }}</td>
                <td>{{ $tutor->experience }}</td>
                <td>{{ $tutor->availability }}</td>
                <td>{{ $tutor->phone }}</td>
                <td>{{ $tutor->dob }}</td>
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
    
    
