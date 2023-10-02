@extends('layout.main')


@section('content')

<style>

    .fc-prev-button, .fc-next-button, .fc-today-button, .fc-dayGridMonth-button, .fc-timeGridWeek-button, .fc-timeGridDay-button, .fc-listMonth-button {
      background-color: #151F34;
      border: none;
      color: #151F34;
    }
   
  </style>


            
   
    <div id="calendar"></div>
  



@endsection

@section('scripts')

<script>


    var events = <?php echo json_encode($data??'') ?>;
     
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
 
    var calendar = new FullCalendar.Calendar(calendarEl, {
      // themeSystem: 'bootstrap',
      
      initialView: 'dayGridMonth',
      
      googleCalendarApiKey: 'AIzaSyBpUN8Ryg4NECIf2oMkVEUZ0CQW3nGM1gY',
      
      
      headerToolbar: {
        left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        
      },
      


      eventSources: [
        // {
        //  events,
        //  color: '#4AB6BB',
        //  textColor: 'black'
         
        // },
        {
          googleCalendarId: 'en.malaysia#holiday@group.v.calendar.google.com',
          color: '#88DA56',
          textColor: 'black'
        }
      ],
      
     
            
      });
      calendar.render();
    });
    
    </script>
    
@endsection