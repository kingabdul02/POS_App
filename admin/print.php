<script type="text/javascript">
$(document).ready(function(){
  printContent('print_div');
  clearCart();
});
function clearCart(){
  var total_item_amount = 0;
  var final_amount = 0;
  var result_amount = 0;
  $('#final_total_amt').text(result_amount);
  $('#r_final_total_amt').text(result_amount);
  $('#mycart').html("");
  $('#print_content').html("");
  count = 0;
}
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
