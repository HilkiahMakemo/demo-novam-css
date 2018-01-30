(function($){

  $(function(){
    $('[data-remote]').each(function(){
      var $trigger = $(this).data('trigger') || 'click';
      $(this).on($trigger, function(){
        var $remote = $(this).data('remote');
        var $target = $(this).data('target') || $(this).attr('href');
        var $data   = $(this).data('data') || [];

        $($target).removeClass('remote-loaded').addClass('remote-loading');
        $($target).closest('.collapse').show();

        $($target, document).load($remote, function(){
          $(this).removeClass('remote-loading').addClass('remote-loaded');
        });
      });

    });
  });

  $(function(){
    $('.remote-loaded form').submit(function(evt){
      evt.preventDefault();
    });
  });

  $(function(){
    $('[data-duplicate]', document).each(function(){
      var $trigger = $(this).data('trigger') || 'click';
      $(this).on($trigger, function(){
        var $remote = $(this).data('remote');
        var $target = $(this).data('duplicate') || $(this).attr('href');
        var $data   = $(this).data('data') || [];

        var $duplicate = $($target).last().clone();
        $duplicate.next($duplicate);
      });
    });
  });




})(jQuery);
