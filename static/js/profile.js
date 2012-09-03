$(function()
{
  var hideDelay = 500;  
  var currentID;
  var hideTimer = null;

  // One instance that's reused to show info for the current person
  var container = $('<div id="personPopupContainer">'
      + '<table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="personPopupPopup">'
      + '<tr>'
      + '   <td class="corner topLeft"></td>'
      + '   <td class="top"></td>'
      + '   <td class="corner topRight"></td>'
      + '</tr>'
      + '<tr>'
      + '   <td class="left">&nbsp;</td>'
      + '   <td><div id="personPopupContent"></div></td>'
      + '   <td class="right">&nbsp;</td>'
      + '</tr>'
      + '<tr>'
      + '   <td class="corner bottomLeft">&nbsp;</td>'
      + '   <td class="bottom">&nbsp;</td>'
      + '   <td class="corner bottomRight"></td>'
      + '</tr>'
      + '</table>'
      + '</div>');

  $('body').append(container);

  $('.personPopupTrigger').live('mouseover', function()
  {
      // format of 'rel' tag: pageid,personguid
      var settings = $(this).attr('rel').split(',');
      var pageID = settings[0];
      currentID = settings[1];

      // If no guid in url rel tag, don't popup blank
      if (currentID == '')
          return;

      if (hideTimer)
          clearTimeout(hideTimer);

      var pos = $(this).offset();
      var width = $(this).width();
      container.css({
          left: (pos.left + width) + 'px',
          top: pos.top - 5 + 'px'
      });

      $('#personPopupContent').html('&nbsp;');

      $.ajax({
          type: 'GET',
          url: 'controller/popup.php',
          data: 'param='+"leavePopup"+ '&page=' + pageID + '&uid=' + currentID,
          success: function(data)
          {
              // Verify that we're pointed to a page that returned the expected results.
//              if (data.indexOf('personPopupResult') < 0)
//              {
//                  $('#personPopupContent').html('<span >Page ' + pageID + ' did not return a valid result for person ' + currentID + '.<br />Please have your administrator check the error log.</span>');
//              }

              // Verify requested person is this person since we could have multiple ajax
              // requests out if the server is taking a while.
//              if (data.indexOf(currentID) > 0)
//              {                  
//                  var text = $(data).find('.personPopupResult').html();
                  $('#personPopupContent').html(data);
//              }
          }
      });

      container.css('display', 'block');
  });

  $('.personPopupTrigger').live('mouseout', function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
      hideTimer = setTimeout(function()
      {
          container.css('display', 'none');
      }, hideDelay);
  });

  // Allow mouse over of details without hiding details
  $('#personPopupContainer').mouseover(function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
  });

  // Hide after mouseout
  $('#personPopupContainer').mouseout(function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
      hideTimer = setTimeout(function()
      {
          container.css('display', 'none');
      }, hideDelay);
  });
});