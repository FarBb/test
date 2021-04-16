let timer2 = "00:11";
var interval = setInterval(function() {
  let timer = timer2.split(':');
  let minutes = parseInt(timer[0], 10);
  let seconds = parseInt(timer[1], 10);
  if(seconds==0) {
    $('#modalTimeout').modal('show');
  } else {
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  $('.countdown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
  }
}, 1000);

$('#modalTimeout').on('hidden.bs.modal', function () {
    $('#form_jawab').submit();
});