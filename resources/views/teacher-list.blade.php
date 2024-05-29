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
</style>
@php
    $tutors = DB::table('tutors')->get();
@endphp
    {{-- <h1>All Students</h1> --}}
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
            </tr>
        </thead>
        <tbody>
            @foreach ($tutors as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->f_name }} {{ $student->l_name }}</td>
                <td>{{ $student->qualification }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->location }}</td>
                <td>{{ $student->city }}</td>
                <td>{{ $student->experience }}</td>
                <td>{{ $student->availability }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->dob }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
