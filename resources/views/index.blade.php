@extends('layout.app')
@section('content')
    @if (count($applicants)) {
    <table style="color:white">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Experience Years</th>
            <th>Is Hired</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applicants as $applicant)
            <tr>
                <td>{{$applicant->id}}</td>
                <td>{{$applicant->name}}</td>
                <td>{{$applicant->surname}}</td>
                <td>{{$applicant->experience_years}}</td>
                <td style="padding: 10px">{{$applicant->is_hired ? 'HIRED' : 'NOT HIRED'}}</td>
                <td>
                    <a href="{{route('applicants.edit', $applicant->id)}}">Edit</a>
                    <form method="POST" action="{{route('applicants.delete', $applicant->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer">
                            DELETE
                        </button>
                    </form>
                    <form method="POST" action="{{route('applicants.hire', $applicant->id)}}">
                        @csrf
                        @method('PUT')
                        <button type="submit" style="cursor: pointer">
                            @if ($applicant->is_hired)
                                <span>FIRE</span>

                                @else
                                    HIRE

                                @endif
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$applicants->links()}}
    }
    @else {
        <h1 style="font-weight: bold; color: white">Applicants Not Found</h1>
    }
    @endif
@endsection
