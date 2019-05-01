@extends('home')
@section('homeContent')
    <div class="col-md-7">
        <h3>الغياب الخاص بالحصة رقم {{ $sectionNumber }}</h3>
        <form action="/section/takeAttendance" method="POST">
            @csrf
            <input type="hidden" name="sectionId" value="{{ $sectionId }}">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">الرقم</th>
                        <th class="text-center" scope="col">صورة الطالب</th>
                        <th class="text-center" scope="col">اسم الطالب</th>
                        <th class="text-center" scope="col">حاضر</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach($students as $student)
                    <tr>
                        <th class="text-center" scope="row" >{{ $i++ }}</th>
                        <td class="text-center">
                            <div class="img-cirx">
                                <img src="{{ URL::asset( $student['studentImage'] ) }}" alt="{{ $student['studentFname'] . ' ' . $student['studentLname'] }}">
                            </div>
                        </td>
                        <td class="text-center">{{ $student['studentFname'] . ' ' . $student['studentLname'] }}</td>
                        <td class="text-center">
                            <input name = {{ $student['studentId'] }} type="checkbox">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">اخذالغياب</button>
            </div>
        </form>
        <button class="btn btn-primary"><a href={{ URL::previous() }}>الرجوع للجروبات</a></button>
    </div>
@endsection