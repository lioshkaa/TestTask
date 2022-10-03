@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                                <div id="external-events">
                                    </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Создать пользователя</h3>
                            </div>
                            <div class="card-body">
                                <!-- /btn-group -->
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                       Добавить
                                    </button>
                                </div>
                                @error('email')
                                <p class="text-danger">Ошибка почта используется</p>
                                @enderror
                                @error('password')
                                <p class="text-danger">Ошибка  не введен пароль</p>
                                @enderror
                                @error('name')
                                <p class="text-danger">Ошибка  имя не введенно</p>
                                @enderror
                                @error('title')
                                <p class="text-danger">Ошибка  поле: "чем занимается" не заполненно</p>
                                @enderror
                                <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <form action="{{route('admin.user.store')}}" METHOD="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Почта</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleName" class="form-label">Имя</label>
                                        <input type="text" class="form-control" name="name" id="exampleName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleTitle" class="form-label">Чем занимается</label>
                                        <input type="text" name="title" class="form-control" id="exampleTitle">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" id="validationCustom04" name="role_id">
                                            <option value="2">Пользователь</option>
                                        </select>
                                    </div>
                                        <input type="submit" value="Создать" class="btn btn-primary">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal" tabindex="-1" id="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" id="butt" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.workday.store')}}" METHOD="POST">
                                @csrf
                            <div class="mb-3">
                                <select class="form-select" id="validationCustom04" name="user_id">
                                    @foreach($user as $user)
                                    <option  value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="mb-3">
                                    <label>Дата работы: </label>
                                    <input type="date" id="date" name="date_work">
                                </div>
                                <div class="mb-3">
                                    <label>Начало работы</label>
                                    <input type="time" id="start" name="start_at">
                                </div>
                                <div class="mb-3">
                                    <label>Конец работы</label>
                                    <input type="time" id="end" name="stop_at">
                                </div>
                                <div class="mb-3">
                                    <button type="button" id="buttons" class="btn btn-primary">Добавить промежутки времени</button>
                                </div>
                                <div class="mb-3" id="group">
                                </div>
                                <select class="form-select" aria-label="Default select example" name="client_id" style="display: none">
                                    <option value="0">Клиент</option>
                                </select>
                                <input type="submit" value="Создать" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-closes" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @error('date_work')
            <p class="text-danger">Ошибка  дата работы не заполнено</p>
            @enderror
            @error('start_at')
            <p class="text-danger">Ошибка  начало работы не заполнено</p>
            @enderror
            @error('stop_at')
            <p class="text-danger">Ошибка  конец работы не заполен</p>
            @enderror
            @error('start_break')
            <p class="text-danger">Перерыв "c" не заполнено</p>
            @enderror
            @error('stop_break')
            <p class="text-danger">Перерыв  "до" не заполнен</p>
            @enderror
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <script>

        var but = document.getElementById('buttons');

        let btn = document.getElementById('btn-closes');
        let butt = document.getElementById('butt');


        btn.addEventListener('click',()=>{

            document.querySelectorAll('.flex-row').forEach(function(a) {
                a.remove()
            })
            document.querySelectorAll('.p-2').forEach(function(a) {
                a.remove()
            })
            document.querySelectorAll('.pq').forEach(function(a) {
                a.remove()
            })

            but.removeAttribute('disabled')
            but.setAttribute('enable', true);

        });
        butt.addEventListener('click',()=>{

            document.querySelectorAll('.flex-row').forEach(function(a) {
                a.remove()
            })
            document.querySelectorAll('.p-2').forEach(function(a) {
                a.remove()
            })
            document.querySelectorAll('.pq').forEach(function(a) {
                a.remove()
            })

            but.removeAttribute('disabled')
            but.setAttribute('enable', true);

        });
        but.addEventListener('click',()=>{

            let firstDate = document.getElementById('start');
            let secondDate = document.getElementById('end');
            firstDate=String(firstDate.value);
            secondDate=String(secondDate.value);

            let getDate = (string) => new Date(0, 0,0, string.split(':')[0], string.split(':')[1]); //получение даты из строки (подставляются часы и минуты
            let different = Math.abs((getDate(secondDate) - getDate(firstDate)));

            let hours = Math.floor((different % 86400000) / 3600000);
            let result = hours;
            let form = document.getElementById('group')
            for (let i=0;i<result-1;i++){
                for (let j=0;j<result-1;j++){
                    if(i==j) {
                        var input = document.createElement('input');
                        var div = document.createElement('div');
                        var inputTwo = document.createElement('input');
                        let labelStartBreak = document.createElement('label');
                        let labelText = document.createTextNode('c:');
                        labelStartBreak.appendChild(labelText);
                        let labelStopBreak = document.createElement('label');
                        let labelTextStopBreak = document.createTextNode('до:');
                        labelStopBreak.appendChild(labelTextStopBreak);

                        input.type = 'time';
                        input.name = 'start_recored[]';
                        input.value = i;

                        inputTwo.type = "time";
                        inputTwo.name = "stop_recored[] ";
                        inputTwo.value = j;

                        div.className += "d-flex flex-row";
                        input.className += 'p-2';
                        inputTwo.className += 'p-2';

                        div.appendChild(labelStartBreak);
                        div.appendChild(input);
                        div.appendChild(labelStopBreak);
                        div.appendChild(inputTwo);
                        form.appendChild(div);
                    }
                }
            }

            let Break = document.createElement('p');
            let text = document.createTextNode('Перерыв:');
            Break.className="pq";
            Break.appendChild(text);
            form.appendChild(Break);
            var input = document.createElement('input');
            var div = document.createElement('div');
            var inputTwo = document.createElement('input');
            let labelStartBreak = document.createElement('label');
            let labelText = document.createTextNode('c:');

            labelStartBreak.appendChild(labelText);

            let labelStopBreak = document.createElement('label');

            let labelTextStopBreak = document.createTextNode('до:');

            labelStopBreak.appendChild(labelTextStopBreak);

            input.type = 'time';
            input.name = 'start_break';

            inputTwo.type = 'time';
            inputTwo.name = 'stop_break';
            div.className += "d-flex flex-row";
            input.className += 'p-2';
            inputTwo.className += 'p-2';

            div.appendChild(labelStartBreak);
            div.appendChild(input);
            div.appendChild(labelStopBreak);
            div.appendChild(inputTwo);
            form.appendChild(div);

            but.setAttribute('disabled', true);
        });

        $(function () {

            function ini_events(ele) {
                ele.each(function () {
                    var eventObject = {
                        title: $.trim($(this).text())
                    }

                    $(this).data('eventObject', eventObject)

                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                        borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                        textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
                    };
                }
            });

            function starts(heloo){

                let dat = new Date(heloo);
                let year = dat.getFullYear();
                let month = dat.getMonth();
                let day = dat.getDate();
                let hour = dat.getHours();
                let minute = dat.getMinutes()
                return new Date(year,month,day,hour+3,minute);
            }

            var calendar = new Calendar(calendarEl, {

                timeZone:'Europe/Belarus',
                locale: 'ru',
                headerToolbar: {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',

                events: [
                        @if(isset($data))
                        @foreach($data as $event)
                        {
                            title: "{{App\Models\User::find($event->user_id)->name}}",
                            start : starts("{{$event->date_day}} {{$event->start}}"),
                            end : starts("{{$event->date_day}} {{$event->end}}"),
                            backgroundColor: '#0073b7', //Blue
                            borderColor    : '#0073b7', //Blue
                            allDay         : false,
                        },
                    @endforeach
                    @endif
                ],

                editable  : false,
                droppable : true, // this allows things to be dropped onto the calendar !!!
                selectable: true,
                dateClick: function(info) {
                    var today = new Date(info.dateStr).toISOString().split('T')[0];
                    $("#date").val(today);
                    $('#modal').modal('show');
                },
                drop : function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });


            calendar.render();
            // $('#calendar').fullCalendar()
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color'    : currColor
                })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color'    : currColor,
                    'color'           : '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)
                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>
@endsection
