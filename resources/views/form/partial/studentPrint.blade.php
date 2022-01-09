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

<body style="background: white" onload="window.print()">
    <div class="container">
        <div class="row">
            <div class="col-2 text-center">
                <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" width="110%">
            </div>
            <div class="col-6 my-2 text-center">
                <b><p class="mb-0 lead" style="font-size: 30px;">Balaogan National High School</p></b>
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
                    <td colspan="4" style="padding: 10px;"><b>Enrollment Information</b></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 10px;">Enrollment No.</td>
                    <td colspan="2" style="padding: 10px;">{{ $tracking_no }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Grade Level to Enroll:</td>
                    <td style="padding: 10px;">{{ $student->grade_level }}</td>
                    <td style="padding: 10px;">Status:</td>
                    <td style="padding: 10px;">{{ $student->state }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 10px;"><b>Student Information</b></td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Name:</td>
                    <td style="padding: 10px;">{{ $student->student_firstname }} {{ $student->student_middlename }} {{ $student->student_lastname }} {{ $student->student_extension }}</td>
                    <td style="padding: 10px;">Date of Birth</td>
                    <td style="padding: 10px;">{{ $student->date_of_birth }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Gender:</td>
                    <td style="padding: 10px;">{{ $student->gender }}</td> 
                    <td style="padding: 10px;">Learning Reference Number:</td>
                    <td style="padding: 10px;">{{ $student->roll_no }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Address:</td>
                    {{-- <td>{{ $student->region }}</td> --}}
                    <td colspan="3" style="padding: 10px;">
                        {{ $student->region }}, 
                        {{ $student->barangay }}, 
                        {{ $student->city }}, 
                        {{ $student->province }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Last School Attended</td>
                    <td style="padding: 10px;">{{ $student->last_school_attended }}</td>
                    <td style="padding: 10px;">Balik Aral?</td>
                    <td style="padding: 10px;">{{ $student->isbalik_aral }}</td>
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
                <tr>
                    <td>Guardian name:</td>
                    <td>{{ $student->guardian_name }}</td>
                    <td>Contact No.</td>
                    <td>{{ $student->guardian_contact_no }}</td>
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