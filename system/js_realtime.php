<script>
$(function() {
   $.get('get_teplota1.php', function(data){
        $('#stavteplota1').text(data + " °C")
       });
  
    $.get('get_teplota2.php', function(data){
        $('#stavteplota2').text(data + " °C")
       });
	   
	   $.get('get_teplota3.php', function(data){
        $('#stavteplota3').text(data + " °C")
       });
    
   $.get('get_tlak.php', function(data){
        $('#stavbarometer').text(data + " hPa")
       });

   $.get('get_vlhkost.php', function(data){
        $('#stavvlhkomer').text(data + " %")
       });



    $.get('get_nazovteplomer1.php', function(data){
        $('#nazovteplomer1').text(data)
      });
      
    $.get('get_nazovteplomer2.php', function(data){
        $('#nazovteplomer2').text(data)
      });
	  $.get('get_nazovteplomer3.php', function(data){
        $('#nazovteplomer3').text(data)
      });
    $.get('get_nazovbarometer.php', function(data){
        $('#nazovbarometer').text(data)
      });
	  
	   $.get('get_nazovvlhkomer.php', function(data){
        $('#nazovvlhkomer').text(data)
      });
	  	   $.get('get_cas.php', function(data){
        $('#casvlhkomer').text(data)
      });
	  	   $.get('get_cas.php', function(data){
        $('#casbarometer').text(data)
      });
	  
	  	   $.get('get_cas.php', function(data){
        $('#casteplota1').text(data)
      });
	     $.get('get_cas.php', function(data){
        $('#casteplota2').text(data)
      });
	   $.get('get_cas.php', function(data){
        $('#casteplota3').text(data)
      });
	      $.get('get_tendenciateplota1.php', function(data){
        $('#tendenciateplota1').html(data)
      }); 
	       $.get('get_tendenciateplota2.php', function(data){
        $('#tendenciateplota2').html(data)
      });
	   $.get('get_tendenciateplota3.php', function(data){
        $('#tendenciateplota3').html(data)
      });
	   $.get('get_tendenciabarometer.php', function(data){
        $('#tendenciabarometer').html(data)
      }); 
	    $.get('get_tendenciavlhkomer.php', function(data){
        $('#tendenciavlhkomer').html(data)
      });  
      $.get('stavnodemcu.php', function(data){
        $('#stavnodemcu').html(data)
    });
     $.get('get_reset.php', function(data){
        $('#getreset').text(data)
    });
    $.get('get_cas.php', function(data){
        $('#poslednateplotacas').text(data)
    });
  });
  </script>
<script>
  setInterval(function(){
    $.get('get_teplota1.php', function(data){
        $('#stavteplota1').text(data + " °C")
       });
  
    $.get('get_teplota2.php', function(data){
        $('#stavteplota2').text(data + " °C")
       });
	   
	   $.get('get_teplota3.php', function(data){
        $('#stavteplota3').text(data + " °C")
       });
    
   $.get('get_tlak.php', function(data){
        $('#stavbarometer').text(data + " hPa")
       });

   $.get('get_vlhkost.php', function(data){
        $('#stavvlhkomer').text(data + " %")
       });



    $.get('get_nazovteplomer1.php', function(data){
        $('#nazovteplomer1').text(data)
      });
      
    $.get('get_nazovteplomer2.php', function(data){
        $('#nazovteplomer2').text(data)
      });
	  $.get('get_nazovteplomer3.php', function(data){
        $('#nazovteplomer3').text(data)
      });
    $.get('get_nazovbarometer.php', function(data){
        $('#nazovbarometer').text(data)
      });
	  
	   $.get('get_nazovvlhkomer.php', function(data){
        $('#nazovvlhkomer').text(data)
      });
	  	   $.get('get_cas.php', function(data){
        $('#casvlhkomer').text(data)
      });
	  	   $.get('get_cas.php', function(data){
        $('#casbarometer').text(data)
      });
	  
	  	   $.get('get_cas.php', function(data){
        $('#casteplota1').text(data)
      });
	     $.get('get_cas.php', function(data){
        $('#casteplota2').text(data)
      });
	   $.get('get_cas.php', function(data){
        $('#casteplota3').text(data)
      });
	      $.get('get_tendenciateplota1.php', function(data){
        $('#tendenciateplota1').html(data)
      }); 
	       $.get('get_tendenciateplota2.php', function(data){
        $('#tendenciateplota2').html(data)
      });
	   $.get('get_tendenciateplota3.php', function(data){
        $('#tendenciateplota3').html(data)
      });
	   $.get('get_tendenciabarometer.php', function(data){
        $('#tendenciabarometer').html(data)
      }); 
	    $.get('get_tendenciavlhkomer.php', function(data){
        $('#tendenciavlhkomer').html(data)
      }); 
      $.get('stavnodemcu.php', function(data){
        $('#stavnodemcu').html(data)
    });
     $.get('get_reset.php', function(data){
        $('#getreset').text(data)
    });
    $.get('get_cas.php', function(data){
        $('#poslednateplotacas').text(data)
    });
   },15000);  
   
</script>



