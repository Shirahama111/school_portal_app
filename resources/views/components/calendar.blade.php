<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<div>
    <div id='calendar'></div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',
                locale: 'ja',
                headerToolbar: {
                    left: "dayGridMonth,listMonth,multiMonthYear",
                    center: "title",
                    right: "today prev,next"
                },
                buttonText: {
                    today: '今月',
                    month: '月',
                    year: '年',
                    list: '予定リスト'
                },
                eventSources: [ 
                    {
                        url: '/get_events',
                    },
                ],
                aspectRatio: 1.25,
                businessHours: true,
                dayCellContent: function(arg){
                    return arg.date.getDate();
                },
                dateClick: (e)=>{// 日付マスのクリックイベント
                    console.log("dateClick:", e);

                    const startDate = document.getElementById('start_date');
                    const endDate = document.getElementById('end_date');

                    if(startDate !== null && endDate !== null){
                        startDate.value = e.dateStr+'T00:00';
                        endDate.value = e.dateStr+'T00:00';
                    }

                    // console.log("dateClick:", e.date);
                    // document.getElementById('end_date').value = e.dateStr;
                },
                eventClick: (e)=>{// イベントのクリックイベント
                    console.log("eventClick:", e);

                    const deleteButton = document.getElementById('delete_button');

                    if(deleteButton !== null && e.event.extendedProps.created_user_id === e.event.extendedProps.access_user_id){
                        document.getElementById('schedule_id').value = e.event.extendedProps.schedule_id;
                        deleteButton.disabled = false;
                    }

                    if(deleteButton !== null && e.event.extendedProps.created_user_id !== e.event.extendedProps.access_user_id){
                        deleteButton.disabled = true;
                    }

                    // document.getElementById('delete_button').value = e.event.title;
                    // document.getElementById('create_user_id').value = e.event.extendedProps.create_user_id;
		            // alert(e.event.extendedProps.description);
	            },
                eventDidMount: (e)=>{
                    tippy(e.el, {
                        content: e.event.extendedProps.description,
                    });
                },
                
        });
        
            calendar.render();
        });

    </script>

</div>
