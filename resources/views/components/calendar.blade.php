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
                    left: "dayGridMonth,listMonth",
                    center: "title",
                    right: "today prev,next"
                },
                buttonText: {
                    today: '今月',
                    month: '月',
                    list: 'リスト'
                },
                eventSources: [ 
                    {
                        url: '/get_events',
                    },
                ],
                businessHours: true,
                dayCellContent: function(arg){
                    return arg.date.getDate();
                },
                dateClick: (e)=>{// 日付マスのクリックイベント
                    console.log("dateClick:", e);
                    document.getElementById('start_date').value = e.dateStr;
                    document.getElementById('end_date').value = e.dateStr;
                },
                eventClick: (e)=>{// イベントのクリックイベント
                    // document.getElementById('title').value = e.event.title;
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
