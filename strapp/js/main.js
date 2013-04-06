$(document).ready(function () {
  var container = $('#lists');
  var template = $('#lists-template').html();
  var url = 'http://hotspot.local/tasklists';

  $.getJSON(url, function(data) {
      var lists = $.map(data, function(list) {
          return list;
      });
      var templateHandlebars = Handlebars.compile(template);
      container.append(templateHandlebars(lists));
  });
});

