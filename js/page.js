  var sites = [
    "pages/page3.html",
    "pages/page2.html",
    "pages/page1.html"
  ];
  var currentSite = sites.length;

  $(document).ready(function () {
    var $iframe = $("iframe")
    setInterval(function() {
      (currentSite == 0) ? currentSite = sites.length - 1 : currentSite = currentSite -1;
      $iframe.attr("src",sites[currentSite]);
    }, 7000);
  });

function datum() {
  var d = new Date();
  var day = leadingCharacter(d.getDate());
  var month = leadingCharacter(d.getMonth()+1);
  var year = d.getFullYear();
  document.getElementById("clock-date").innerHTML = [day, month, year].join('.');
}

function clock() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  m = leadingCharacter(m);
  document.getElementById('clock-time').innerHTML = h + ":" + m;
  var t = setTimeout(clock, 500);
}

function leadingCharacter(i) {
  if (i < 10) {i = "0" + i}
  return i;
}
