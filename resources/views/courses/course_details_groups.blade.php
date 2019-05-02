@extends('home')
@section('homeContent')
    <div class="container">
        <div class="row margin-tp-30">
            <div class="col-lg-4 mx-auto">
                <div class="card card-cascade wider">
                    <div class="view view-cascade overlay">
                            <img  class="card-img-top" src={{ URL::asset('ProfilePics/'.$teacherData['imagePath']) }} alt="Card image cap">
                            <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body card-body-cascade text-center">
                        <h4 class="card-title"><strong>
                            {{ $teacherData['userFname'] . ' ' . $teacherData['userLname']}} 
                        </strong></h4>
                        <h5 class="blue-text pb-2"><strong>
                            {{ $subject }}<br>
                            {{ $level }}
                        </strong></h5>
                        <p class="card-text">
                            {{ $courseData['courseDescription'] }}
                        </p>
                        <a class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                        <a class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a><br>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-cascade narrower">
                        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                    <i class="fas fa-th-large mt-0"></i>
                                </button>
                                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                    <i class="fas fa-columns mt-0"></i>
                                </button>
                            </div>
                            <a href="" class="white-text mx-3">جروبات المادة</a>
                            <div>
                                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                    <i class="fas fa-pencil-alt mt-0"></i>
                                </button>
                                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                    <i class="far fa-trash-alt mt-0"></i>
                                </button>
                                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                    <i class="fas fa-info-circle mt-0"></i>
                                </button>
                            </div>
                    </div>
                    <div class="px-4">
                        <div class="table-wrapper">
                            <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="th-lg">
                                        <a>اليوم
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">المعاد
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">المكان
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">العدد الحالي
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">العدد الكامل
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">التحكم
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach( $groups as $group )
                                    <tr>
                                        <th scope="row">
                                            {{ $group['groupDay'] }}
                                        </th>
                                        <td>
                                            {{ $group['groupTime'] }}
                                        </td>
                                        <td>
                                            {{ $group['groupLocation'] }}
                                        </td>
                                        <td>
                                            {{ $groupLimit[$i++] }}
                                        </td>
                                        <td>
                                            {{ $group['groupLimit'] }}
                                        </td>
                                        <td>
                                            <a class="btn blue-gradient" href="/student/join/course/{{ $group['groupId'] }}">التحاق الجروب</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection