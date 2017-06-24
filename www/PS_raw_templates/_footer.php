      <!--anything below this is not required-->
      <div class='text-center' style='margin-top:100px'> 
Change theme: 
      <a href="#" id="united">united</a>
      <a href="#" id="journal">journal</a></div>
      <script>
        $(document).ready(function() {
          console.log("ready!");
          $("#journal").click(function() {
            $("#abcd").attr("href", "http://bootswatch.com/journal/bootstrap.min.css");

          });
          $("#united").click(function() {
            $("#abcd").attr("href", "http://bootswatch.com/united/bootstrap.min.css");

          });
        });
      </script>

    </body>

    </html>