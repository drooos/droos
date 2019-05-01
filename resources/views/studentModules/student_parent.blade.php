@extends('home')
@section('homeContent')
    <div class="container">
            @if(sizeof($parentDetails) > 0)
                <?php 
                    if(is_null($parentDetails[0]['imagePath']))
                        $imagePath = URL::asset('imgs/female.png');
                    else
                        $imagePath = URL::asset('ProfilePics/'.$parentDetails[0]['imagePath']);
                ?>
                <h1>
                    معلومات ولي الامر
                </h1>
                <br><br>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="view overlay">
                            <img class="card-img-top" src={{ $imagePath }} alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $parentDetails[0]['userFname'] . ' ' . $parentDetails[0]['userLname'] }}
                            </h4>
                            <p class="card-text">
                                البريد الالكتروني : {{ $parentDetails[0]['email'] }} <br>
                                رقم الموبايل : {{ $parentDetails[0]['userNumber'] }} <br>
                            </p>
                            <a href="/profile/{{ $parentDetails[0]['id'] }}" class="btn btn-secondary">عرض الصفحة الشخصية</a>
                        </div>
                    </div>
                </div>
            @endif
            @if(sizeof($parentDetails) == 0)
                <br><br>
                <h3>لما تضاف الي اي ولي امر حتي الان</h3>
                <p>قم بنسخ كودك الشخصي واعطيه لولي امرك لاضافتك</p>
                <br>
                كودك الشخصي:
                <button type="button" class="btn btn-dark btn-lg">{{ $studentCode }}</button>
            @endif
    </div>
@endsection