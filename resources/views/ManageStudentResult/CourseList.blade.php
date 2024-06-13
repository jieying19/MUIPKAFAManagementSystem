@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><b>Courses List</b></h2>
        </div>
        <div class="col-md-6 mt-4 d-flex justify-content-end align-items-center">
            <!--Only admin and teacher can see ADD button -->
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
            <a href="{{ route('ManageStudentResult.newCourse') }}">
                <button type="button" class="btn" style="background-color:#2a82d5; color:white;">Add New Course</button>
            </a>
            @endif
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 40%">Course</th>
                    <th style="width: 40%">Exam Date</th>
                    <th style="width: 20%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subjects)
                <tr style="height: 50px; vertical-align:middle;">
                    <td>{{ $subjects->subjectName }}</td>
                    <td>{{ $subjects->subjectExamDate }}</td>

                    <td>

                        <!--Only accessed by staffs-->
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')

                        <a href="{{ route('ManageStudentResult.viewStudentList', ['subjectID' => $subjects->subjectID]) }}"><box-icon type='solid' name='user-plus'></box-icon></a>

                        <a href="{{ route('ManageStudentResult.editResult', ['subjectID' => $subjects->subjectID]) }}"><box-icon type='solid' name='pencil'></box-icon></a>
                        
                        <a href=# onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this course?')) { document.getElementById('delete-form-{{ $subjects->subjectID }}').submit(); }">
                            <box-icon name='trash' type='solid'></box-icon>
                        </a>
                        <form id="delete-form-{{ $subjects->subjectID }}" action="{{ route('ManageStudentResult.deleteCourse', ['id' => $subjects->subjectID]) }}" method="POST" style="display: none;">
                         method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form><!--Pop up alert for deletion -->
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-row-reverse">
        
    </div>
</div>
<div style="position: fixed; left: 50%; transform: translate(-50%, -50%);">
        @if (session('failure'))
            <div class="alert alert-danger">
                {{ session('failure') }}
            </div>
        @endif <!--Red pop up message-->

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif <!--Green pop up message-->
    </div>
@endsection