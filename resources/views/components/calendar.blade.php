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
                    document.getElementById('date').value = e.dateStr;
                },
                // eventClick: (e)=>{// イベントのクリックイベント
		        //     alert(e.event.extendedProps.description);
	            // },
        });
            calendar.render();
        });
    </script>

    <input type="text" name="date" id="date" disabled>

</div>
