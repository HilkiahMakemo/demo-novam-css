@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endpush
<div id="site-map-container">
  <ul v-for="pg in ">

  </ul>
</div>
@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
  <script>
    var pVM = new Vue({
      el: '#site-map-container',
      data: {
        json: null
      },
      created: function () {
        var _this = this;
        $.getJSON('/admin/pages/data', function (json) {
            _this.json = json;
        });
      }
    });
    console.log(pVM);

  (function($){

    $(function () {
      // $('#site-map-container').jstree({
      //   'core' : {
      //     'data' : {
      //       'url' : '/admin/pages/data',
      //       'data' : function (node) {
      //         dump(node);
      //         return { 'id' : node.id, 'parent': node.parent };
      //       }
      //     }
      //   }
      // });
    });

    $('#site-map-container').on("changed.jstree", function (e, data) {
      console.log(data.selected);
    });

    $('#site-map-container button').on('click', function () {
      $('#jstree').jstree(true).select_node('child_node_1');
      $('#jstree').jstree('select_node', 'child_node_1');
      $.jstree.reference('#jstree').select_node('child_node_1');
    });
  })(jQuery);
</script>
@endpush
