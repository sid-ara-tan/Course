<html>
  <head>
    <script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>  
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      
    </script>
    
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
                $("#graph_button").click(function(){

                     var form_data ={
                            sid: '1'
                     };

                    $.ajax({
                        url:"<?php echo site_url('admin/unitTest/exampleJson'); ?>",
                        type:'POST',
                        data:form_data,
                        dataType: 'json',
                        success:function(msg){
                            alert(msg);
                            var options = {
                              title: 'Company Performance'
                            };

                            drawAgain(msg,options);
                        }
                    });

                  /*  var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],
                        ['2004',  Math.floor((Math.random()*100)+1),      Math.floor((Math.random()*100)+1)],
                        ['2005',  Math.floor((Math.random()*100)+1),      Math.floor((Math.random()*100)+1)],
                        ['2006',  Math.floor((Math.random()*100)+1),      Math.floor((Math.random()*100)+1)],
                        ['2007',  Math.floor((Math.random()*100)+1),      Math.floor((Math.random()*100)+1)]
                    ]);
                    var options = {
                      title: 'Company Performance'
                    };
                    
                    drawAgain(data,options);*/
                });

                $("#graph_button_input").click(function(){
                       var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],

                    [$("#year").val(),  parseInt($("#sales").val())+100,     parseInt($("#expenses").val())+8],

                    [$("#year").val(),  parseInt($("#sales").val()),     parseInt($("#expenses").val())]
                    ]);

                    var options = {
                       title: 'Company Performance'
                    };
                    
                    drawAgain(data,options);
                });

                function drawAgain(data,options) {
                       
                        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                }


        });
          
     </script>
     
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>

    <div>
        <?php echo form_open();?>
        <?php echo form_label("Year","year");?>
        <?php echo form_input('year','','id="year"');?>
        <?php echo form_label("Sales","sales");?>
        <?php echo form_input('sales','','id="sales"');?>
        <?php echo form_label("Expenses","expenses");?>
        <?php echo form_input('expenses','','id="expenses"');?>
        <?php echo form_close();?>
    </div>
    
    <div><button id="graph_button">Generate Randomly</button></div>
    <div><button id="graph_button_input">Generate From Input</button></div>
    
  </body>
</html>