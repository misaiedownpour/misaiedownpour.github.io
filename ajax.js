
function ajaxGet(url, callback){
  var f = callback || function(data);
  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200){
      f(request.responceText);
    }
  }
  request.open('GET',url);
  request.send();
}
