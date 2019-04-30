@extends('home')
@section('homeContent')
    <div class="container home"> 
        <div class="row">
                 
            <div class="col-lg-12">
               
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            
                            <th scope="col" class="text-center">   </th>
                            <th scope="col" class="text-center"> اسم المادة</th>
                            <th scope="col" class="text-center"> المرحلة</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($courses as $course)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td class="text-center">{{ $course['courseDescription']      }}</td>
                                <td class="text-center">{{ $course['courseLevel']  }}</td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection

