$(document).ready(function () {
    prev();
    next();
    toDay();
    dataLoad();
   });
 
 var Calendar = tui.Calendar;
 var cal = new Calendar('#calendar',{
   defaultView: 'month',
     week: {
       daynames: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
       startDayOfWeek: 0,
       narrowWeekend: true
     },
     month: {
       daynames: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
       startDayOfWeek: 0,
       narrowWeekend: true
     },
     useCreationPopup: true,
     useDetailPopup: true,
 });
 
 var prev = () => {
     $('#prevBtn').click(function () { 
       cal.prev()
       data = new Date(cal._renderDate._date)
       dataFormatada = moment(data).format("MMMM YYYY");
      $('#date__cal').text(dataFormatada);
     });
 }
 
 
 var next = () => {
     $('#nextBtn').click(function () { 
       cal.next()
       data = new Date(cal._renderDate._date)
       dataFormatada = moment(data).format("MMMM YYYY");
       $('#date__cal').text(dataFormatada);
     });
 }
 
 var toDay = () => {
     $('#btnToday').click(function () { 
         cal.today()
         data = new Date(cal._renderDate._date)
         dataFormatada = moment(data).format("MMMM YYYY");
        $('#date__cal').text(dataFormatada);
       });
 }
 
 var dataLoad = () =>{
     data = new Date(cal._renderDate._date)
     dataFormatada = moment(data).format("MMMM YYYY");
    $('#date__cal').text(dataFormatada);
 }
 
 //cal.createSchedules([]);