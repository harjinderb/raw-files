$(window).bind("beforeunload", function() { 
  alert('hello');
        return confirm("asasa"); 
    });

/*window.onbeforeunload = function (event) {
  console.log(event);
    var message = 'Important: Please click on \'Save\' button to leave this page.';
    if (typeof event == 'undefined') {
        event = window.event;
    }
    if (event) {
        event.returnValue = message;
    }
    return message;
};*/
/*window.onbeforeunload = WindowCloseHanlder;
function WindowCloseHanlder()
{
window.alert('My Window is reloading');
}*/

