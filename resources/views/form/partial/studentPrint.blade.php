<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>PRINT REPORT</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        td {
            font-size: 20px;
        }
    </style>
</head>

<body style="background: white">
    <div class="container">
        <div class="row">
            <div class="col-2 text-center">
                <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" width="110%">
            </div>
            <div class="col-6 my-2 text-center">
                <p class="mb-0 lead" style="font-size: 30px;">Balaogan National High School</p>
                <small class="lead" style="font-size: 20px;">Balaogan, Bula, Camarines Sur</small><br>
                <small class="lead" style="font-size: 20px;">Region V</small><br><br>
                <p style="font-size: 25px;"><b>Enrollment Form</b></p><br>
            </div>
            <div class="col-2 text-center">
                <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid" width="110%">
            </div>
            <div class="col-2 text-center">
                <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid" width="110%">
            </div>
        </div><br>
        {{-- <small>Total Student: {{ $total->mtotal+$total->ftotal }}</small>&nbsp;&nbsp;
        <small>Male: {{ $total->mtotal }}</small>&nbsp;&nbsp;
        <small>Female: {{ $total->ftotal }}</small> --}}
        <table class="table table-bordered table-sm mt-2">
            {{-- <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Teacher's Name</th>
                    <th>Gender</th>
                </tr>
            </thead> --}}
            <tbody>
                @foreach ($dataNow as $key =>$student)
                <tr>
                    <td colspan="4"><b>Enrollment Information</b></td>
                </tr>
                <tr>
                    <td colspan="2">Enrollment No.</td>
                    <td colspan="2">{{ $tracking_no }}</td>
                </tr>
                <tr>
                    <td>Grade Level to Enroll:</td>
                    <td>{{ $student->grade_level }}</td>
                    <td>Status:</td>
                    <td>{{ $student->state }}</td>
                </tr>
                <tr>
                    <td colspan="4"><b>Student Information</b></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{ $student->student_firstname }} {{ $student->student_middlename }} {{ $student->student_lastname }}</td>
                    <td>Date of Birth</td>
                    <td>{{ $student->date_of_birth }}</td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>{{ $student->gender }}</td> 
                    <td>Learning Reference Number:</td>
                    <td>{{ $student->roll_no }}</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    {{-- <td>{{ $student->region }}</td> --}}
                    <td colspan="3">
                        {{ $student->barangay }}, 
                        {{ $student->city }}, 
                        {{ $student->province }}
                    </td>
                </tr>
                <tr>
                    <td>Last School Attended</td>
                    <td>{{ $student->last_school_attended }}</td>
                    <td>Balik Aral?</td>
                    <td>{{ $student->isbalik_aral }}</td>
                </tr>
                <tr>
                    <td colspan="4"><b>Family Information</b></td>
                </tr>
                <tr>
                    <td>Father name:</td>
                    <td>{{ $student->father_name }}</td>
                    <td>Contact No.</td>
                    <td>{{ $student->father_contact_no }}</td>
                </tr>
                <tr>
                    <td>Mother name:</td>
                    <td>{{ $student->mother_name }}</td>
                    <td>Contact No.</td>
                    <td>{{ $student->mother_contact_no }}</td>
                </tr>
                @endforeach
            </tbody>
            {{-- <tbody>
                @foreach ($dataNow as $key =>$teacher)
                <tr>
                    <td>{{  ++$key }}</td>
                    <td>{{  $teacher->roll_no }}</td>
                    <td>{{  $teacher->teacher_lastname }}, {{  $teacher->teacher_firstname }} {{  $teacher->teacher_middlename[0] }}.</td>
                    <td>{{  $teacher->teacher_gender }}</td>
                </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</body>

</html>