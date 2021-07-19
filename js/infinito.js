var endless = {
  // (A) PROPERTIES
  url : "paginador.php", // CHANGE THIS TO YOUR OWN!
  first : true, // LOADING FIRST PAGE?
  proceed : true, // OK TO LOAD MORE PAGES? "LOCK" TO PREVENT LOADING MULTIPLE PAGES
  page : 0, // CURRENT PAGE
  hasMore : true, // HAS MORE CONTENT TO LOAD?

  // (B) INITIALIZE INFINITE SCROLL
  init : function () {
    // (B1) LISTEN TO END OF PAGE SCROLL - LOAD MORE CONTENTS
    window.addEventListener("scroll", function () {
      if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
        endless.load();
      }
    });

    // (B2) LOAD INITIAL PAGE
    endless.load();
  },

  // (C) AJAX LOAD CONTENT
  load : function () { if (endless.proceed && endless.hasMore) {
    // (C1) ENSURE ONLY 1 PAGE CAN LOAD AT ONCE
    endless.proceed = false;

    // (C2) PAGINATION & POST DATA
    var data = new FormData(),
        nextPg = endless.page + 1;
    data.append("page", nextPg);
    // APPEND MORE OF YOUR OWN DATA IF YOU WANT
    // data.append("KEY", "VALUE");

    // (C3) AJAX LOAD CONTENT
    var xhr = new XMLHttpRequest();
    xhr.open("POST", endless.url);
    xhr.onload = function () {
      // (C3A) NO MORE CONTENT
      if (this.response == "END") { endless.hasMore = false;  $("#loader").fadeOut("slow") ;  $("#finale").fadeIn("slow");}
      // (C3B) APPEND CONTENT INTO HTML WRAPPER
      else {
        $("#loader").fadeIn("slow") ;
        var el = document.createElement("div");
        el.innerHTML = this.response;
        document.getElementById("page-content").appendChild(el);
        endless.proceed = true; // UNLOCK
        endless.page = nextPg; // UPDATE CURRENT PAGE

        // (C3C) FIRST PAGE ONLY - MAKE SURE CONTENT COVERS WINDOW HEIGHT
        if (endless.first) {
          if (document.body.scrollHeight <= window.innerHeight) { endless.load(); }
          else { endless.first = false; }
        } else { endless.first = false; }
      }
    };
    xhr.send(data);
  }}
};
window.addEventListener("DOMContentLoaded", endless.init);
