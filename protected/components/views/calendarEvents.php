<div class="calendarwidget"> <!--calender widget is loaded here--> </div>
<script>
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        //vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

$(document).ready(function() {

var url=window.location.href.slice(0,window.location.href.indexOf('?'))
var newUrl=url+"?";
var params=getUrlVars();
for (key in params){
    if(key=='title')
        params[key]="Agenda";
    if(key!="date" && key!="show")
        newUrl=newUrl+key+"="+params[key]+"&";
}

<?php 
$selectedDate="";
if(isset($_GET['date'])){
    $selectedDate=$_GET['date'];    
}
?>

var selectedDate='<?php echo $selectedDate?>';
$.ajax({
  url: "index.php",
  data: "r=site/ajaxEventsDates",
  dataType: "json",
  success: function(calendarEvents){
           $(".calendarwidget").datepicker({
           numberOfMonths: [1, 1],
           showCurrentAtPos: 0,
           firstDay:1,
            showOtherMonths: true,
           onSelect:function(dateText, inst){
               dateText=dateText.split("/").join("_")
               window.location.href = newUrl + 'date=' + dateText;
               
           },
           beforeShowDay: function (date){
                          for (i = 0; i < calendarEvents.length; i++) {
                              if (date.getMonth() == calendarEvents[i][0] - 1
                              && date.getDate() == calendarEvents[i][1]
                              && date.getFullYear() == calendarEvents[i][2]) {
                              //[disable/enable, class for styling appearance, tool tip]
                                  if(selectedDate!=''){
                                    dateArr=selectedDate.split('_');
                                    if (date.getMonth() == dateArr[0] - 1
                                          && date.getDate() == dateArr[1]
                                          && date.getFullYear() == dateArr[2]){
                                            return [true,"ui-state-active ui-state-selected","Event Name"];
                                          }
                                  }
                                  return [true,"ui-state-active","Event Name"];
                              }
                           }
                           return [false, ""];//enable all other days
                        }
           });
           }
         });
    });
</script>