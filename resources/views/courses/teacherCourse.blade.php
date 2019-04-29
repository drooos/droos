@extends('home')
@section('homeContent')
<div class="container home">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-dark ">
                <thead>
                    <tr>
                        <th scope="col">رقم الكورس</th>
                        <th scope="col">المستوي</th>
                        <th scope="col">المادة</th>
                        <th scope="col">عدد المجموعات</th>
                        <th scope="col">التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $course['level'] }}</td>
                        <td>{{ $course['subject'] }}</td>
                        <td>{{ $course['groups'] }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary">
                                    <a href="/course/show/{{ $course['id'] }}">
                                        <i class="far fa-eye"></i>
                                        عرض
                                    </a>
                                </button>
                                <button type="button" class="btn btn-secondary">
                                    <i class="fal fa-edit"></i>
                                    تعديل
                                </button>
                                <button type="button" class="btn btn-secondary" >
                                    <i class="fal fa-trash-alt"></i>
                                    حذف
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary"><a href="/teacher/addCourse">كورس جديد</a></button>
        </div>
    </div>
</div>
@endsection