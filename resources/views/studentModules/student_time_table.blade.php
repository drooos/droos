@extends('home')
@section('homeContent')

<div class="home col-lg-12">
    <div class="row">
        <div class="cd-schedule loading">
            <div class="timeline">
                <ul>
                    <li><span>06:00</span></li>
                    <li><span>06:30</span></li>
                    <li><span>07:00</span></li>
                    <li><span>07:30</span></li>
                    <li><span>08:00</span></li>
                    <li><span>08:30</span></li>
                    <li><span>09:00</span></li>
                    <li><span>09:30</span></li>
                    <li><span>10:00</span></li>
                    <li><span>10:30</span></li>
                    <li><span>11:00</span></li>
                    <li><span>11:30</span></li>
                    <li><span>12:00</span></li>
                    <li><span>12:30</span></li>
                    <li><span>13:00</span></li>
                    <li><span>13:30</span></li>
                    <li><span>14:00</span></li>
                    <li><span>14:30</span></li>
                    <li><span>15:00</span></li>
                    <li><span>15:30</span></li>
                    <li><span>16:00</span></li>
                    <li><span>16:30</span></li>
                    <li><span>17:00</span></li>
                    <li><span>17:30</span></li>
                    <li><span>18:00</span></li>
                    <li><span>18:30</span></li>
                    <li><span>19:00</span></li>
                    <li><span>19:30</span></li>
                    <li><span>20:00</span></li>
                    <li><span>20:30</span></li>
                    <li><span>21:00</span></li>
                    <li><span>21:30</span></li>
                    <li><span>22:00</span></li>
                    <li><span>22:30</span></li>
                    <li><span>23:00</span></li>
                    <li><span>23:30</span></li>
                    <li><span>24:00</span></li>
                </ul>
            </div> <!-- .timeline -->

            <div class="events">
                <ul>
                    <li class="events-group table-7">
                        <div class="top-info"><span>الجمعة</span></div>
                        <ul>
                            @if(isset($times['Fri']))
                                @foreach ($times['Fri'] as $time)
                                <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}  <br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="events-group table-7">
                        <div class="top-info"><span>الخميس</span></div>
                        <ul>
                            @if(isset($times['Thu']))
                                @foreach ($times['Thu'] as $time)
                                    <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}<br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="events-group table-7">
                        <div class="top-info"><span>الاربعاء</span></div>
                        <ul>
                            @if(isset($times['Wed']))
                                @foreach ($times['Wed'] as $time)
                                <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}<br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="events-group table-7">
                        <div class="top-info"><span>الثلاثاء</span></div>
                        <ul>
                            @if(isset($times['Tue']))
                                @foreach ($times['Tue'] as $time)
                                <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}<br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="events-group table-7">
                        <div class="top-info"><span>الاثنين</span></div>
                        <ul>
                            @if(isset($times['Mon']))
                                @foreach ($times['Mon'] as $time)
                                <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}<br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="events-group table-7">
                        <div class="top-info"><span>الاحد</span></div>
                        <ul>
                            @if(isset($times['Sun']))
                                @foreach ($times['Sun'] as $time)
                                <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}<br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="events-group table-7">
                        <div class="top-info"><span>السبت</span></div>
                        <ul>
                            @if(isset($times['Sat']))
                                @foreach ($times['Sat'] as $time)
                                <li class="single-event" data-start={{ $time['groupTime'] }} data-end={{ $time['endTime'] }} data-content="event-abs-circuit" data-event="event-{{ rand(1,4) }}">
                                        <a href="#0">
                                            <em class="event-name">
                                                {{ $time['categoryName'] }} <br>
                                                {{ $time['courseLevel'] }}<br><br>
                                                <button class="btn purple-gradient">{{ $time['teacher_first_name'] . ' ' . $time['teacher_last_name'] }}</button>
                                            </em>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
            </div><!-- end of div.events-->

            <div class="event-modal">
            <header class="header">
                <div class="content">
                    <span class="event-date"></span>
                    <h3 class="event-name"></h3>
                </div>
                <div class="header-bg"></div>
            </header>
            <div class="body">
                <div class="event-info"></div>
                <div class="body-bg"></div>
                asdasads
            </div>
            <a href="#0" class="close">Close</a>
            </div>
            <div class="cover-layer"></div>
        </div> <!-- .cd-schedule -->
    </div>
</div>
@endsection
