
@extends('home')
@section('homeContent')
<div class="edit-profile ">
    <h4>اضافة مادة دراسية</h4>
    <form action="/teacher/addCourse" method="POST">
    @csrf
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="level">الصف الدراسي</label>
                        <select class="form-control" id="level" name="level">
                            <option value="0">اختار الصف ...</option>
                            @foreach($levels as $level)
                                <option value = {{ $level->id }}>
                                    {{ $level->levelName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="subject">المادة الدراسية</label>
                        <select class="form-control" id="subject" name="subject">
                            <option value="0"> اختار المادة الدراسية ...</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->categoryId }}">
                                    {{ $subject->categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="about"> الوصف</label>
                        <textarea class="form-control" id="about" rows="4" name="desc"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">اضافة المادة</button>

        </div>
    </form>
</div>


@endsection