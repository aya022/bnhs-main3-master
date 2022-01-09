@extends('../layout/app')
@section('content')
    <div class="container-fluid">
        <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
            <p style="font-size: 25px;"><i class="fas fa-desktop"></i>&nbsp;&nbsp;Dashboard</p>
            <p>Active Academic Year:{{ empty($activeAY)?'No active academic year': ' S/Y '.$activeAY->from.'-'.$activeAY->to }}</p>
        </div>
    </div>

    <div class="body flex-grow-1 px-3">
        <div class="container-fluid ">
            <div class="row" style="margin-top: -10px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                        <div class="callout-icon  ">
                            <i class="fas fa-user-edit icon-color text-info" style="font-size: 30px"></i>
                        </div>
                        <div class="callout-wrap">
                            <div class="callout-header">
                                <p style="font-size: 20px;">No. of Enrollee</p>
                            </div>
                            <div class="callout-body">
                                <b>{{ $enrollTotal }}</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                        <div class="callout-icon">
                            <i class="fas fa-user icon-color text-info" style="font-size: 30px"></i>
                        </div>
                        <div class="callout-wrap">
                            <div class="callout-header">
                                <p style="font-size: 20px;">No. of Enrolled Student</p>
                            </div>
                            <div class="callout-body">
                                <b>{{ $studentTotal }}</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                        <div class="callout-icon">
                            <i class="fas fa-users icon-color text-info" style="font-size:30px"></i>
                        </div>
                        <div class="callout-wrap">
                            <div class="callout-header">
                                <p style="font-size: 20px;">No. of Teacher</p>
                            </div>
                            <div class="callout-body">
                                <b>{{ $teacherTotal }}</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                        <div class="callout-icon">
                            <i class="fas fa-copy icon-color text-info" style="font-size: 30px;"></i>
                        </div>
                        <div class="callout-wrap">
                            <div class="callout-header">
                                <p style="font-size: 20px;">No. of Section</p>
                            </div>
                            <div class="callout-body">
                                <b>{{ $ectionTotal }}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-12 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Population by Sex</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart4"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-12 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Population by Curriculum</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart3"></canvas>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12 col-lg-12 col-12 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Population by Grade Level</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
    
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    {{-- <div class="card mb-3">
                        <div class="card-header">
                            <h4>Appointment Today</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @forelse ($appointies as $item)
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media-title">{{ $item->fullname }}</div>
                                        <span class="text-small text-muted">{{ $item->address }}</span>
                                    </div>
                                </li>
                                @empty
                                <div class="media-body text-center">No data available</div>
                                @endforelse
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="{{ route('admin.appointment') }}" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <!--  -->
                    <div class="card">
                        <div class="card-header">
                            <h6>No. of Population by Category</h6>
                        </div>
                        <div class="card-body pb-0">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media mb-3">
                                        <!-- <img class=" width=" 50" src="{{ asset('image/avatar-1.png') }}" alt="product">
                                        -->
                                    <i class="mr-3 rounded text-info fas fa-users text-info" style="font-size: 30px"></i>
                                    <div class="media-body">
                                        <div class="media-right my-2" style="font-size: 20px"><b>{{ $njhs }}</b></div>
                                        <div class="media-title">Number of Junior High</div>
                                        <div class="text-dark text-small">Grade 7 to 10
                                        </div>
                                    </div>
                                </li><hr class="text-dark">
                                <li class="media">
                                    <i class="mr-3 rounded text-info fas fa-user-shield  text-info" style="font-size: 30px"></i>
                                    <div class="media-body">
                                        <div class="media-right my-2" style="font-size: 20px"><b>{{ $nshs }}</b></div>
                                        <div class="media-title">Number of Senior High</div>
                                        <div class="text-dark text-small">Grade 11 to 12
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('moreJs')
<script src="{{ asset('js/chart/chart.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard.js') }}"></script>
@endsection