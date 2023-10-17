<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pitch Calendar') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div id='calendar'></div>
            </div>
        </div>
    </section>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script>

        $(document).ready(function () {
            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                // defaultView: 'agendaWeek',
                events: {
                    url: SITEURL + "/pitch-calendar",
                    color: 'green',   // an option!
                    textColor: 'white', // an option!
                    backgroundColor: 'green',
                    allDay: true,
                },
                displayEventTime: false,
                editable: false,

                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: false,
                selectHelper: true,
                select: function (start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                        $.ajax({
                            url: SITEURL + "/fullcalenderAjax",
                            data: {
                                description: title,
                                from_date: start,
                                to_date: end,
                                type: 'add'

                            },
                            type: "POST",
                            success: function (data) {
                                displayMessage("Event Created Successfully");

                                calendar.fullCalendar('renderEvent',
                                    {
                                        id: data.id,
                                        description: title,
                                        from_date: start,
                                        to_date: end,
                                        allDay: allDay
                                    },true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function (response) {
                            displayMessage("Event Updated Successfully");
                        }
                    });
                },
                eventClick: function (event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },

                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            }
                        });
                    }
                }
            });
        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

    </script>

    {{--    <link rel="stylesheet" href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" />--}}
</x-app-layout>

