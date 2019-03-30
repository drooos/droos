@extends('layout')
@section('content')


    <form class="login" method="POST" action="{{ URL::to('/addsubjects') }}" >
        @csrf
        <div class="margin">
        <div class="spe">اضافة المواد</div>
        <div class="form-group">
            <label >اسم المادة</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-user"></i>
                </div>
                <div class="inp">
                    <input  name="subject" type="text" class="form-control"  placeholder="اسم المادة"  required autofocus>
                </div>
            </div>

        </div>
        <div class="form-group">
            <label >تاريخ البداية</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-key"></i>
                </div>
                <div class="inp">
                    <input name="fdate" type="date" class="form-control"  placeholder="تاريخ البداية" required>
                </div>
            </div>

        </div>
        <div class="form-group">
            <label >تاريخ النهاية</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-key"></i>
                </div>
                <div class="inp">
                    <input name="ldate" type="date" class="form-control"  placeholder="تاريخ النهاية" required>
                </div>
            </div>


        </div>
        <button name="submit" type="submit" class="btn app-btn-back app-btn-form">موافقة</button>
    </form>
@endsection
