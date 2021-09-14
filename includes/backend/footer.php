



<!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved. Designed and Developed by <a href="#">K-Tech</a>. 08066789669
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/backend/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/backend/libs/jquery/dist/jQuery_print.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/backend/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/backend/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/backend/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/backend/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="../assets/backend/libs/DataTables/js/jquery.dataTables.js"></script>
    <!-- bootstrap3661 -->
    <!-- <script src="../dist/bootstrap3661/js/jquery-2.0.0.min.js" type="text/javascript"></script> -->
    <script src="../dist/bootstrap3661/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../dist/bootstrap3661/js/script3661.js?v=2.0" type="text/javascript"></script>
    <script src="../dist/bootstrap3661/js/perfect-scrollbar.js" type="text/javascript"></script>
    <!-- perfect scrollbar -->

    <script type="text/javascript">
    $(document).ready(function(){
      $('#table').dataTable();
      ajaxLoadProduct();
      $("#btn_add").click(function(){
        $("#Modal_add").modal();
      });
      $("#btn_filter_exp").click(function(){
        $("#Modal_filter").modal();
      });
      $('#print_div').hide();
      var date = new Date();
      $('.clock-wrapper').html(
          date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
          );
      var invoice = $('#invoice_no').val();
      var receipt = $('#receipt_no').val();
      $('#tbl_filtered').hide();
      $('#item_form').on('submit', function(event){
          event.preventDefault();
          var count_data = 0;
          var vat_service = $('#vat_services').val();
          $('.item_name').each(function(){
            count_data = count_data + 1;
          });
          if (count_data > 0) {
            var form_data = $(this).serialize();
            $.ajax({
              url: "../post.php",
              method: "POST",
              data: form_data,
              success: function(data){
                //alert('success!');
                if (count_data) {
                  PrintElem('print_div');
                  clearCart();
                  update_invoice(invoice, receipt);
                  saveVatServices(vat_service, invoice);
                }
              }
            })
          }
      });

      $(document).on('click', '.removeItem', function(){
        var row_id = $(this).attr("id");
        var total_item_amount = $('#item_final_amount'+row_id).val();
        var total_item_qty = $('#item_qty'+row_id).val();
        // $('#item'+row_id+'_qty_rmvd_val').val() = total_item_qty;
        var p_id = $('#product_id'+row_id).val();
        var init_qty = $('#item'+p_id+'_qty').attr('max');
        // alert(init_qty);
         let v = parseFloat(init_qty) + parseFloat(total_item_qty)
         console.log(init_qty);
         console.log(total_item_qty);
         console.log(v);
        $('#item'+p_id+'_qty').attr('max', v);
        var final_amount = $('#final_total_amt').text();
        var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
        var item_vat = 7.5/100 * total_item_amount;
        result_amount = parseFloat(result_amount) - parseFloat(item_vat);
        $('#final_total_amt').text(result_amount);
        // $('#vat_services').val();
        $('#row_'+row_id).remove();
        alert(count);
        // loop through cart and increment counter
        // count--;
        alert(count);
        $('#print_div').find('#row_'+row_id).remove();
        $('#print_div').find('#r_final_total_amt').text(result_amount);
        cal_final_total(count);
        //$('#total_item').val(count);
      });

      $(document).on('click', '#clearCart', function(){
         clearCart();
      });

        $(function () {
         $( ".qtyinput" ).change(function() {
            var max = parseInt($(this).attr('max'));
            var min = parseInt($(this).attr('min'));
            if ($(this).val() > max)
            {
                $(this).val(min);
            }
            else if ($(this).val() < min)
            {
                $(this).val(min);
            }
          });
      });
    });
      var count = 0;
      var final_total_amt = $('#final_total_amt').text();
      function cart(id, product_id) {
         count = count + 1;
         var id = id;
         var product_id = product_id;
         var ele=document.getElementById(id);
         var name=document.getElementById(id+"_name").value;
         var price=document.getElementById(id+"_price").value;
         var qty=document.getElementById(id+"_qty").value;
         var maxQty=document.getElementById(id+"_qty").getAttribute("max");
         var invoice_no=document.getElementById(id+"_invoice_no").value;
         var product_id=product_id;
         var total = price * qty;
         var qtyAcVal = maxQty - qty;
         document.getElementById(id+"_qty").setAttribute("max", qtyAcVal);
         if (document.getElementById(id+"_qty").value > 1 || document.getElementById(id+"_qty").value <= 1) {
           document.getElementById(id+"_qty").value = 0;
         }
         if (qtyAcVal < maxQty) {
           $.ajax({
                 type:'post',
                 url:'../ajax_addToCart.php',
                 data:{product_id:product_id, name:name, price:price,  qty:qty, count:count, invoice_no:invoice_no},
                 complete:function(response) {
                   $('#mycart').append(response.responseText);
                   $('#print_content').append(response.responseText);
                   $('#print_div').find('.removeItem').remove();
                   cal_final_total(count);
                }
             });
         }
      }

      function cal_final_total(count)
      {
        var final_item_total = 0;
        for(j=1; j<=count; j++)
        {
          var quantity = 0;
          var price = 0;
          var actual_amount = 0;
          var item_total = 0;
          quantity = $('#item_qty'+j).val();
          if(quantity > 0)
          {
            price = $('#item_price'+j).val();
            if(price > 0)
            {
              actual_amount = parseFloat(quantity) * parseFloat(price);
              $('#item_actual_amount'+j).val(actual_amount);
              item_total = actual_amount;
              final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
              $('#item_final_amount'+j).val(item_total);
            }
          }
        }
        var vat_services = 7.5/100 * final_item_total;
        var grand_total = parseFloat(final_item_total) + parseFloat(vat_services);
        $('#final_total_amt').text(final_item_total);
        $('#r_final_total_amt').text(final_item_total);
        $('#grand_total').text(grand_total);
        $('#vat_services').val(vat_services);
      }

      function clearCart(){
        var total_item_amount = 0;
        var final_amount = 0;
        var result_amount = 0;
        $('#final_total_amt').text(result_amount);
        $('#r_final_total_amt').text(result_amount);
        $('#mycart').html("");
        $('#print_content').html("");
        count = 0;
        window.location.href="sales.php";
      }

      function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
        //window.location.href="sales.php";
      }

      function PrintElem(el)
        {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write(document.getElementById(el).innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.print();
            mywindow.close();

            return true;
        }

        function update_invoice(invoice, receipt){
          var invoice_no = invoice++;
          var receipt_no = receipt++;
          $.ajax({
                 type:'post',
                 url:'../update_invoice.php',
                 data:{invoice_no:invoice_no, receipt_no:receipt_no},
                 complete:function(response) {
                    //alert('success!');
                    window.location.href = "sales.php";
                }
             });
        }

        function reset_quee_no(receipt_no){
          var receipt_no = receipt_no;
          $.ajax({
                 type:'post',
                 url:'../quee_reset.php',
                 data:{receipt_no:receipt_no},
                 complete:function(response) {
                    //alert('success!');
                    window.location.href = "dashboard.php";
                }
             });
        }

        function saveVatServices(vat_services, invoice){
          var invoice_no = invoice;
          var vat_services = vat_services;
          $.ajax({
                 type:'post',
                 url:'../saveVatServices.php',
                 data:{invoice_no:invoice_no, vat_services:vat_services},
                 complete:function(response) {
                    //alert('success!');
                    window.location.href = "sales.php";
                }
             });
        }

    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#normal_modal .modal-body').html('<div style="text-align:center;margin-top:absolute;"><div class="icon"> <i class="fa fa-spinner icon-lg fa-spin orange bigger-125"></i> </div></div>');

        // LOADING THE AJAX MODAL
        jQuery('#normal_modal').modal('show', {backdrop: 'true'});

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            complete: function (response)
            {
                jQuery('#normal_modal .modal-body').html(response.responseText);
            }
        });
    }

    function ajaxLoadProduct(){
      $.ajax({
             type:'get',
             url:'../ajaxLoadProduct.php',
             complete:function(data) {
                if (data != 'No data found') {
                  $('#search_result').html(data.responseText);
                }
            }
         });
    }

    function ajaxLiveSearch(input) {
      var input_val = input;
      if (input_val == '') {
          $('#search_result').html('No data found');
      }
      $.ajax({
             type:'get',
             url:'../ajaxLiveSearch.php',
             data:{input_val:input_val},
             beforeSend: function() {
                 $("#spinner").css("display", "block");
              },
             complete:function(data) {
                if (data != 'No data found') {
                  setTimeout(() => {
                    $("#spinner").css("display", "none");
                  }, 5000);
                  $('#search_result').html(data.responseText);
                }
            }
         });
    }

    $(function () {
      $('#print').click(function () {
          var pageTitle = 'GOLDEN GRILL',
              stylesheet = '../dist/bootstrap3661/css/bootstrap3661.css?v=2.0',
              win = window.open('', 'Print', 'width=500,height=300');
          win.document.write('<html><head><title>' + pageTitle + '</title>' +
              '<link rel="stylesheet" href="' + stylesheet + '">' +
              '</head><body>' + $('#prnt')[0].outerHTML + '</body></html>');
          win.document.close();
          win.print();
          win.close();
          return false;
      });
    });
  </script>
</body>
</html>
<?php
    // close the connection
   if (isset($conn)) {
    mysqli_close($conn);
   }
?>
