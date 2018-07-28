console.log('sdfsdf');


/*var magic = document.getElementById('magic');

magic.addEventListener('click', function(event) {
  //loadJquery('');
  console.log('josdfsdf')
  loadVanilla('');
  event.preventDefault()
});

function loadVanilla(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
      console.log(response)
    }
  };

  xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhttp.open("POST", "http://localhost/infinum/wp-json/wp/v2/posts", true);
  xhttp.send();
}*/

/*
// Create a request variable and assign a new XMLHttpRequest object to it.
var upit = new XMLHttpRequest();
// Open a new connection, using the GET request on the URL endpoint
upit.open('GET', 'http://localhost/infinum/wp-json/wp/v2/posts', true);
upit.onload = function () {
  // Begin accessing JSON data here
  // Begin accessing JSON data here
var data = JSON.parse(this.response);
data.forEach(results => {
  // Log each movie's title
  console.log(results.title.rendered);
  console.log(results.id);
});
  }
// Send request
upit.send();*/


/*let app = document.getElementById('app');

      function createNode(element){
        return document.createElement(element);
      }
 
     function append(parent,el){
        return parent.appendChild(el);
     }
    
      console.log(createNode('img'))
       const url = 'http://localhost/infinum/wp-json/wp/v2/posts';
        fetch(url)
        .then((resp) => resp.json())
        .then(function(data){
            console.log(data);
            let results = data.result;
            return results.map(function(result){
              console.log(result);
              let img = createNode('img');
              img.src = result.imageUrl;
               append(app,img);
            })
        })
        .catch(function(error){
            console.log('error');
        })*/




jQuery(document).ready(function( $ ) {
	//OWL CARUSEL
 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

	
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


//http://jsbin.com/caduxugu/1/edit?html,css,js,output
  //Dohvaćanje postova preko API-a
  $("#magic").click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: "http://localhost/nivas/wp-json/wp/v2/posts/",
     
      success: function(result){
               console.log(result);
               
                /*  $.each(response, function(i) {
                console.log(response[i].link);
            }); */

                for(var i=0;i<result.length;i++){

                


                  $('.owl-carousel').owlCarousel().trigger('add.owl.carousel', [jQuery('<div class="owl-item">' + result[i].id + '</div>')]).trigger('refresh.owl.carousel');
               
            };

               // console.log(response[i].id)
               /*var img = response["items"][i].img;
               var alt = response["items"][i].alt;
         
               content += "<img src=\"" +img+ "\" alt=\"" +alt+ "\">"*/
               
            
               
             

            
              
 
            },
      error: function(result) {
        alert('error');
      }
    });
  });

});