<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>PRINT REPORT</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background: white">
    <div class="container">
        <div class="row">
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" width="110%">
            </div>
            <div class="col-9 my-2 text-center">
                <h5 class="mb-0">Balaogan National High School</h5>
                <small style="font-size: 14px;">Balaogan, Bula, Camarines Sur</small><br>
                <small style="font-size: 14px;">Region V</small><br><br>
                <small style="font-size: 16px;"><b>List of student</b></small><br>
            </div>
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid" width="110%">
            </div>
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid" width="110%">
            </div>
        </div><br>
        <p class="mb-0">Section: <b>@if($term!='') @endif 
        {{ $section }}</b></p>
        {{-- <small style="font-size: 14px;">Total Student: <b>{{ $total->mtotal+$total->ftotal }}</b></small>&nbsp;&nbsp; --}}
        {{-- <small style="font-size: 14px;">Male: <b>{{ $total->mtotal }}</b></small>&nbsp;&nbsp; --}}
        {{-- <small style="font-size: 14px;">Female: <b>{{ $total->ftotal }}</b></small> --}}
        <table class="table table-bordered table-sm mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Contact no.</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataNow as $key =>$student)
                <tr>
                    <td>{{  ++$key }}</td>
                    <td>{{  $student->student_lastname }}, {{  $student->student_firstname }} {{  $student->student_middlename }}</td>
                    <td>{{  $student->gender }}</td>
                    <td>{{  $student->date_of_birth }}</td>
                    <td>{{  $student->student_contact }}</td>
                    <td style="text-transform: capitalize;">{{  $student->barangay }}, {{  $student->city }}, {{  $student->province }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>