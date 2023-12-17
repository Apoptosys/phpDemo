
  $(document).ready(function (e) {

    function fetchDataAndPopulateContainer(){
      console.log("Before ajax call");
      $.ajax({
        url: 'loadItems.php', // Replace with the correct path to your PHP script
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log('Data:', data);
          // Handle the data and dynamically populate the webpage
          var resultContainer = $('#album_container');
          
          // Clear existing content
          resultContainer.empty();
    
          // Loop through the data and append it to the result container
          $.each(data, function(index, item) {
            // Modify this part based on your data structure
            var html = '<div class="col"><div class="card shadow-sm d-flex flex-column h-100">';
            html += '<img src="'+item.file_name+ '" width="100%" height="100%" alt="No image available">';
            html += '<div class="card-body flex-fill">';
            html += '<p class="card-text">Title: ' +item.title + '</p>';
            html += '<p class="card-text">Author: ' +item.author + '</p>';
            html += '<div class="d-flex justify-content-between align-items-center"> <div class="btn-group"> <button type="button" class="btn btn-sm btn-outline-secondary">View</button> <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></div>'
            html += '<small class="text-body-secondary">'+item.pages+ " pag." +  '</small> </div></div></div></div>'
            
            resultContainer.append(html);
          });
        },
        error: function(xhr, status, error) {
          console.error('Error fetching data:', error);
        }
      });
      }




   $("#form").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
           url: "../../addBook.php",
     type: "POST",
     data:  new FormData(this),
     contentType: false,
           cache: false,
     processData:false,
     beforeSend : function()
     {
      //$("#preview").fadeOut();
      $("#err").fadeOut();
     },
     success: function(data)
        {
      if(data=='invalid')
      {
       // invalid file format.
       $("#err").html("Invalid File !").fadeIn();
      }
      else
      {
       // view uploaded file.
       $("#preview").html(data).fadeIn();
       $("#form")[0].reset(); 
      }
        },
       error: function(e) 
        {
      $("#err").html(e).fadeIn();
        }          
      });
      this.reset();
      function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
      }

      console.log('Waiting..');
      sleep(2000).then(() => { fetchDataAndPopulateContainer();console.log('Fetched!'); });
   }));

   $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
  })


  fetchDataAndPopulateContainer();
  });
  
