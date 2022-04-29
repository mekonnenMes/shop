<?php
    $active ='Shop';
    include("includes/header.php");
?>
   <div id="content"><!-- content begin -->
       <div class="container"><!-- container begin -->
           <div class="col-md-12"><!-- col-md-12 begin -->
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
               </ul><!-- breadcrumb Finish -->
           </div><!--  col-md-12 Finish -->
           <div class="col-md-3"><!-- col-md-3 begin -->
   <?php 
    include("includes/sidebar.php");
   ?>
           </div><!--col-md-3 Finish -->
            <div class="col-md-9"><!--col-md-9 begin -->
            
                    <div class='box'><!--box begin -->
                        <h1>Shop</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen.  
                            
                        </p>
                    </div><!--box Finish -->
                           
                <div id="products" class="row"><!-- row Begin -->
                    <?php getProducts(); 
                    
                    
                    
                    ?>
                </div><!--row finish -->
                    <center>
                        <ul class="pagination"><!--pagination begin  -->
                            <?php getPaginator(); ?>
                        </ul><!--pagination finish  -->
                    </center>     
            </div><!--col-md-9 Finish -->
            <div id="wait" style="position: absolute;top: 40%;left:45%; 
            padding: 200px 100px 100px 100px;"></div>
       </div><!-- container -->
   </div><!-- content Finish -->

   <?php 
    include("includes/footer.php");
   ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script>
        $(document).ready(function(){
            //Hide and show Sideebar toggle //
            $('.nav-toggle').click(function(){
                $('.panel-collapse,.collapse-data').slideToggle(100,function(){
                    if($(this).css('display')=='none'){
                        $(".hide-show").html('Show');
                    }else{
                        $(".hide-show").html('Hide');
                    }
                    
                });
            
            });
            //finish Hide and show Sideebar toggle //
            //search filters by letter //
            $(function(){
                $.fn.extend({
                    filterTable: function(){
                        return this.each(function(){
                            $(this).on('keyup', function(){
                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');

                                if(search == ''){
                                    rows.show();
                                }else{
                                    rows.each(function(){
                                        var $this = $(this);
                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                                    });
                                }

                            });

                        });
                    }

                });

                $('[data-action="filter"][id="dev-table-filter"]').filterTable();

            });

            //finish search filters by letter //
        });
    </script>
    <script>
        $(document).ready(function(){
            //getProducts() Function begin //
            function getProducts(){
                //Code for Manufacturer Begin //
                var sPath = '';
                var aInputs = $('li').find('.get_manu');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value

                    };
                    iKey++;
                });
                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'man[]=' + aKeys[i]+'&';
                    }
                }
                 //Code for Manufacturer finish //

                 //Code for Product Categories Begin //
                var aInputs = Array();
                var aInputs = $('li').find('.get_p_cat');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value

                    };
                    iKey++;
                });
                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';
                    }
                }
                 //Code for Product Categories finish //

                 //Code for Categories Begin //
                var aInputs = Array();
                var aInputs = $('li').find('.get_cat');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value

                    };
                    iKey++;
                });
                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'cat[]=' + aKeys[i]+'&';
                    }
                }
                 //Code for Categories finish //
                 //Loader when loading begin //
                 $('#wait').html('<img src="images/loader.gif"');
                 //Loader when loading finish //
                 $.ajax({
                     url:"load.php",
                     method:"POST",

                     data: sPath+'sAction=getProducts',
                     success:function(data){
                         $('#products').html('');
                         $('#products').html(data);
                         $('#wait').empty();
                     }
                 });
                 $.ajax({
                     url:"load.php",
                     method:"POST",

                     data: sPath+'sAction=getPaginator',
                     success:function(data){
                         $('.pagination').html('');
                         $('.pagination').html(data);
                     }
                 });
            }
             //getProducts() Function Finish //
             $('.get_manu').click(function(){
                getProducts();
             });
             $('.get_p_cat').click(function(){
                getProducts();
             });
             $('.get_cat').click(function(){
                getProducts();
             });
        });
    </script>
    
</body>
</html>
   