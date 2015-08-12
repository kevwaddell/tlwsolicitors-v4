<script type="text/javascript">
jQuery.noConflict();
  jQuery(document).ready(function($) {

		$('li.capitalize input').keyup(function(event) {
		    var textBox = event.target;
		    var start = textBox.selectionStart;
		    var end = textBox.selectionEnd;
		    textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1);
		    textBox.setSelectionRange(start, end);
		});

  });
</script>