<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        .table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            /* width: 100%; */
            /* align-items: center; */
        }
        /* .table td {
            border: 1px solid;
            padding: 8px;
        } */
        td {
            border: none;
        }
    </style>
</head>
<body>
    {{-- <div style="text-align: center;">
        <p style="font-size: 14px;"><b>BALAOGAN NATIONAL HIGH SCHOOL</b></p><br>
        <small>Balaogan, Bula, Camarines Sur</small><br>
        <h5>STUDENT ENROLLMENT FORM</h5>
    </div> --}}
    <table class="table">
        <tr style="border-top: 0px;">
            <td colspan="4" align="left" height="35" valign="center" >&nbsp;&nbsp;&nbsp; SF: 12499</td>
        </tr>
        <tr>
            {{-- <td><img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid " style="height: 100px;"></td> --}}
            <td colspan="4" align="center" height="35" valign="center">
                    BALAOGAN NATIONAL HIGH SCHOOL
                <br>
                <small>Balaogan, Bula, Camarines Sur</small>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="35" valign="center"><h3>STUDENT ENROLLMENT FORM</h3></td>
        </tr>

        <tr>
            <td colspan="2"  height="33" valign="center">&nbsp;&nbsp;&nbsp; ENROLLMENT INFORMATION:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp; Enrollment No. :</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp; <b style="color: red">{{ $data->tracking_no }}</b></td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Grade level to Enroll:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Grade {{ $data->grade_level }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Status:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->state }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Curriculum | Strand:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->curriculum }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Date enrolled:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->date_of_enroll }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center" colspan="4">&nbsp;&nbsp;&nbsp;STUDENT INFORMATION:</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Name:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->student_firstname.' '.$data->student_middlename.' '.$data->student_lastname }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Age:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Not Available</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Learning Reference Number:</td>
            <td  height="33" valign="center" align="left"> &nbsp;&nbsp;&nbsp;{{ $data->roll_no }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Date of Birth:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->date_of_birth }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Gender:</td>
            <td  height="33" valign="center" colspan="3">&nbsp;&nbsp;&nbsp;{{ $data->gender }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center" colspan="4">&nbsp;&nbsp;&nbsp;PERNAMENT ADDRESS:</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->region }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->province }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{$data->city }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->barangay }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center" colspan="4">&nbsp;&nbsp;&nbsp;EDUCATION AND QUALIFICATION:</td>
        </tr>
        <tr>
            <td  height="33" valign="center" colspan="2">&nbsp;&nbsp;&nbsp;Last School Attended:</td>
            <td  height="33" valign="center" colspan="2">&nbsp;&nbsp;&nbsp;{{ $data->last_school_attended }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center" colspan="2">&nbsp;&nbsp;&nbsp;Balik-Aral:</td>
            <td  height="33" valign="center" colspan="2">&nbsp;&nbsp;&nbsp;{{ $data->isbalik_aral }}{{ $data->last_schoolyear_attended }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center" colspan="4">&nbsp;&nbsp;&nbsp;FAMILY INFORMATION:</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Father Name:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->father_name }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Contact No.:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->father_contact_no }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Mother Name:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->mother_name }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Contact No.:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->mother_contact_no }}</td>
        </tr>
        <tr>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Guardian Name:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->guardian_name }}</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;Contact No.:</td>
            <td  height="33" valign="center">&nbsp;&nbsp;&nbsp;{{ $data->guardian_contact_no }}</td>
        </tr>
    </table>
</body>
</html>