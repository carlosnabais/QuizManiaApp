var seconds = 600;

function countdown() {
  var minutes = Math.round((seconds - 30) / 60)
  var remainingSec = seconds % 60

  if (remainingSec < 10) {
    remainingSec = "0" + remainingSec
  }

  document.getElementById('countdown').innerHTML = minutes + ":" + remainingSec

  if (seconds == 0) {
    clearInterval(countdownTimer)
  } else {
    seconds--
  }
}

var countdownTimer = setInterval('countdown()', 1000)
