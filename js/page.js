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
