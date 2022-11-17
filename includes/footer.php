</div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            dateFormat: "yy-mm-dd"
        });
        } );
  </script>
  <script>
        $('.delete-button').on('click', function (e) {
        var id = $(this).attr('data-id');
        $('.confirm-delete').attr('data-id',id);

        });
        $(".confirm-delete").on('click', function (e) {
            var id = $(this).attr('data-id');
            console.log(id);
            location.href="delete.php?id="+id;
        });
  </script>
<div class="footer mt-auto text-center p-3">Copyright &copy; <?php echo date("Y"); ?>. All rights reserve. Designed By <strong><?php echo 'Zreon' ?></strong><a href="#"></a></div>

</body>
</html>