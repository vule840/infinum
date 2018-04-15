console.log('sdfsdf');


jQuery(document).ready(function( $ ) {
	
	
	$('.single article img').unwrap();
	$( ".single .entry-content p" ).addClass( "kontejner2" );
	$( ".single .entry-content ul" ).addClass( "kontejner2" );
	$( ".single .entry-content h1" ).addClass( "kontejner2" );
	$( ".single .entry-content h2" ).addClass( "kontejner2" );
	$( ".single .entry-content h3" ).addClass( "kontejner2" );
	$( ".single .entry-content ol" ).addClass( "kontejner2" );
	$( ".single .entry-content h4" ).addClass( "kontejner2" );
	$( ".single .entry-content h5" ).addClass( "kontejner2" );
	$( ".single .entry-content h6" ).addClass( "kontejner2" );
	$( ".single .entry-content hr" ).addClass( "kontejner2" );



	//Dohvaćanje postova preko API-a
	$("#magic").click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: "http://localhost/infinum/wp-json/wp/v2/posts",
     
      success: function(response){
                console.log(response);
            },
      error: function(result) {
        alert('error');
      }
    });
  });
});
