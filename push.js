function initPusher(cssBind, limit) {
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('b227f5df488b51be2735', {
      encrypted: true
    });
    var channel = pusher.subscribe('events_channel');
  var channel = pusher.subscribe('events_channel');
  channel.bind('my_event', function(data) {
    $(cssBind).prepend(data);
    $(cssBind+' .individual-events').first().show(function() {
      if($(cssBind+' .individual-events').length > limit) {
	$(cssBind+' .individual-events').last().hide(function() {$('#home-events .individual-events').last().remove();});
	}
});
  });
    $(cssBind+' .individual-events').show();

}
