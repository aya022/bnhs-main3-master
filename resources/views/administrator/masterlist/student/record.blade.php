@extends('../layout/app')
@section('content')
    @php
    $sum7=0;
    $sum8=0;
    $sum9=0;
    $sum10=0;
    $sumElevenFirst=0;
    $sumElevenSecond=0;
    $sumTwelveFirst=0;
    $sumTwelveSecond=0;
    $seven=0;
    $eight=0;
    $nine=0;
    $ten=0;
    $elevenFirst=0;
    $elevenSecond=0;
    $twelveFirst=0;
    $twelveSecond=0;
    function computedGrade($first=null,$second=null,$third=null,$fourth=null, $need=null){
        switch ($need) {
            case 'final':
                if (!empty($first) && !empty($second) && !empty($third) && !empty($fourth)) {
                    $final = intval($first) + intval($second) + intval($third) + intval($fourth);
                    return round($final / 4);
                }
            break;
            case 'final-shs':
                if (!empty($first) && !empty($second)) {
                    $final = intval($first) + intval($second) ;
                    return round($final / 2);
                }
            break;
            case 'remark':
                if (!empty($first) && !empty($second) && !empty($third) && !empty($fourth)) {
                    $final = intval($first) + intval($second) + intval($third) + intval($fourth);
                    return round($final / 4)<75?'Failed':'Passed';
                }
            break;
            case 'remark-shs':
                if (!empty($first) && !empty($second)) {
                    $final = intval($first) + intval($second) + intval($third) + intval($fourth);
                    return round($final / 2)<75?'Failed':'Passed';
                }
            break;
            case 'term':
                if (!empty($first) && !empty($second)) {
                    $final = intval($first) + intval($second);
                    return round($final / 2)<75?'Failed':'Passed';
                }
            break;
            default: 
                return false; 
            break;
        } 
    }
    @endphp

    <div class="container-fluid">
        <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
            <p style="font-size: 25px;"><i class="fas fa-id-badge text-dark"></i>&nbsp;&nbsp;Student: [ <b>{{ $student->student_lastname.', '.$student->student_firstname.' '.$student->student_middlename }}</b> ]</p>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('admin.student') }}" class="nav-link"><i class="fa fa-arrow-left"></i> Back</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#home3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user"></i>&nbsp;&nbsp;Junior High</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#profile3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Senior High</a>
                        </li>
                    </ul>

                    {{-- <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('admin.student') }}" class="nav-link"><i class="fa fa-arrow-left"></i> Back</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Junior High</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Senior High</a>
                        </li>
                    </ul> --}}

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            @include('administrator.masterlist.student.junior')
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            @include('administrator.masterlist.student.senior')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection