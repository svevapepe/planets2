$(window).load(function(){

  var body = $("body"),
      universe = $("#universe"),
      solarsys = $("#solar-system");

  var init = function() {
    body.removeClass('view-2D opening').addClass("view-3D").delay(2000).queue(function() {
      $(this).removeClass('hide-UI').addClass("set-speed");
      $(this).dequeue();
    });
  };

  var setView = function(view) { universe.removeClass().addClass(view); };

  $("#toggle-data").click(function(e) {
    body.toggleClass("data-open data-close");
    e.preventDefault();
  });

  $("#toggle-controls").click(function(e) {
    body.toggleClass("controls-open controls-close");
    e.preventDefault();
  });

  //cambia pianeta selezionato
  $("#data a").click(function(e) {
    var ref = $(this).attr("class");
    solarsys.removeClass().addClass(ref);
    $(this).parent().find('a').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

jQuery(function($) {
    $('#golink1').click(function() {
        return false;
    }).dblclick(function() {
        window.location = this.href;
        return false;
    });
});

jQuery(function($) {
  $('#golink2').click(function() {
      return false;
  }).dblclick(function() {
      window.location = this.href;
      return false;
  });
});

jQuery(function($) {
  $('#golink3').click(function() {
      return false;
  }).dblclick(function() {
      window.location = this.href;
      return false;
  });
});

jQuery(function($) {
$('#golink4').click(function() {
    return false;
}).dblclick(function() {
    window.location = this.href;
    return false;
});
});

jQuery(function($) {
  $('#golink5').click(function() {
      return false;
  }).dblclick(function() {
      window.location = this.href;
      return false;
  });
});

jQuery(function($) {
$('#golink6').click(function() {
    return false;
}).dblclick(function() {
    window.location = this.href;
    return false;
});
});

jQuery(function($) {
  $('#golink7').click(function() {
      return false;
  }).dblclick(function() {
      window.location = this.href;
      return false;
  });
});

jQuery(function($) {
$('#golink8').click(function() {
    return false;
}).dblclick(function() {
    window.location = this.href;
    return false;
});
});


  $(".set-view").click(function() { body.toggleClass("view-3D view-2D"); });
  $(".set-zoom").click(function() { body.toggleClass("zoom-large zoom-close"); });
  $(".set-speed").click(function() { setView("scale-stretched set-speed"); });
  $(".set-size").click(function() { setView("scale-s set-size"); });
  $(".set-distance").click(function() { setView("scale-d set-distance"); });

  init();

});