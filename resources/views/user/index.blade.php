@extends('layouts.user')
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
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
        </div>

        <div class="modal" tabindex="-1" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" id ="btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modals">

                        <p id="interval">Ваши промежутки работы: </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-closes" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

        let but = document.getElementById('btn-closes');

        let btn = document.getElementById('btn');

        btn.addEventListener('click',()=>{

            document.querySelectorAll('.p').forEach(function(a) {
                a.remove()
            })

        });

        but.addEventListener('click',()=>{

            document.querySelectorAll('.p').forEach(function(a) {
                a.remove()
            })

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

                    @if(isset($workDays))
                    @foreach($workDays as $workday)
                    {
                        title:"{{$user->name}}",
                        start:starts("{{$workday->date_day}} {{$workday->start}}"),
                        end:starts("{{$workday->date_day}} {{$workday->end}}")

                    },
                    @endforeach
                    @endif
                ],

                editable  : false,
                droppable : false, // this allows things to be dropped onto the calendar !!!
                selectable: true,

                dateClick: function(info) {
                    @if(isset($recoreds))
                        @foreach($recoreds as $recored)
                    if("{{$recored->date_day}}"===info.dateStr){

                        let modal = document.getElementById('modals');
                        let newDiv = document.createElement("p");
                        let y = document.createTextNode("{{$recored->start_record}} - {{$recored->stop_record}}");
                        newDiv.className = "p";
                        newDiv.appendChild(y);
                        modal.appendChild(newDiv);
                        $('#modal').modal('show');

                    }
                    @endforeach
                    @endif


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
