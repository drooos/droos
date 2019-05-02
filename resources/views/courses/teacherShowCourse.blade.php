@extends('home')
@section('homeContent')
    <div class="container home"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <h2>
                        معلومات المدرس والمادة
                    </h2>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src={{ URL::asset('imgs/male.png') }} class="card-img" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title ">    
                                        {{ $courseAll['tFname'] . " " . $courseAll['tLname'] }}
                                    </h5>
                                    <p class="card-text">
                                        {{ $courseAll['tDesc'] }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                                <div class="row no-gutters">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            المادة : {{ $courseAll['subject'] }} <br/>
                                            الصف :   {{ $courseAll['level']   }}
                                        </h5>
                                        <p class="card-text">
                                            {{ $courseAll['desc'] }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;"></div>
                </div>
            </div>

            <div class="col-lg-12">
                <h2>
                    المادة
                </h2>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">رقم الجروب</th>
                            <th scope="col" class="text-center">اليوم</th>
                            <th scope="col" class="text-center">الموعد</th>
                            <th scope="col" class="text-center">المكان</th>
                            <th scope="col" class="text-center">عدد الطلاب</th>
                            <th scope="col" class="text-center">عدد الحصص الحالية</th>
                            <th scope="col" class="text-center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($groups as $group)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td class="text-center">{{ $group['groupDay']       }}</td>
                                <td class="text-center">{{ $group['groupTime']      }}</td>
                                <td class="text-center">{{ $group['groupLocation']  }}</td>
                                <td class="text-center">{{ $group['acctiveStudent'] }}</td>
                                <td class="text-center">{{ $group['sectionNum']     }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">
                                            <a href="/section/new/{{ $group['groupId'] }}">
                                                <i class="far fa-plus-circle"></i>
                                                حصة جديدة
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-secondary">
                                            <i class="fal fa-edit"></i>
                                            تعديل الموعد
                                        </button>
                                        <button type="button" class="btn btn-success">
                                            <i class="fal fa-angle-double-right"></i>
                                            المزيد
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-primary"><a href="/teacher/courses/addGroup/{{ $courseId }}">انشاء جروب</a></button>
        <hr>
        <div class="row">
            <h2>المنهج الدراسي</h2>
            <form action="addmaterial" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="file" name="file">
                <input type="hidden" name="courseId" value="1">
                <button type="submit" class="btn btn-primary">رفع فايل جديد ++</button>
            </form>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ملف</th>
                    <th scope="col">تحميل</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach($materials as $mat)
                        <tr>
                            <td>{{$mat->materialUploadate}}</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    <input name="url" type="hidden" value="{{$mat->materialUrl}}">
                                    <button type="submit" class="btn btn-primary">تحميل</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                  
                </tbody>
              </table>
            
        </div>
    </div>
@endsection