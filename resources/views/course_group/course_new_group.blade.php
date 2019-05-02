@extends('home')
@section('homeContent')
<div class="edit-profile col-md-5">
    <h4>اضافة مادة دراسية</h4>
    <form action="/teacher/courses/addGroup" method="POST">
        @csrf
        <input type="hidden" name="group_id" value={{ $courseId }}>
        <div class="container">
            <div class="row">
                <div class="form-group col-md-4">
                    <div class="sm-form ">
                        <label for="inputMDEx1" class="text-right">معاد الحصة</label>
                        <input type="time" id="inputMDEx1" class="form-control" name="groupTime">
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <div class="form-group">
                        <label for="day"> اليوم</label>
                        <select class="form-control" id="day" name="day">
                            <option value="0">اختار اليوم ...</option>
                            @foreach($days as $day)
                                <option value = {{ $day[0] }}>
                                    {{ $day[1] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group row col-lg-6">
                    <label for="location" class="col-sm-5 col-form-label">مكان الحصة</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="location" placeholder="ادخل المكان" name="location">
                    </div>
                </div>
                <div class="form-group row col-lg-6">
                    <label for="groupLimit" class="col-sm-5 col-form-label">عدد الجروبات</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="groupLimit" placeholder="اقصي عدد للمجموعة" name="groupLimit">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">اضافة الجروب</button>
        </div>
    </form>
</div>

@endsection