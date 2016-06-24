<select name="test" id="testId">
  <option value="1">One</option>
  <option value="2">Two</option>
</select>

<select name="AnyOtherDropDown" id="AnyOtherDropDown">
</select>

<script type="text/javascript">
$(function() {

  $('#testId').change(function() {
    var value = $(this).val();
    console.log(value);
    $.getJSON('/cake2/Test/getModel/'+value, function(data) {
    	var items = "";
    	items += "<option value=0> -- </option>";
    	$.each(data,function(k,v) {
    		items += "<option value='" + k + "'>" + v + "</option>";
    	});
      $("#AnyOtherDropDown").html(items);

    });
  })
});
</script>