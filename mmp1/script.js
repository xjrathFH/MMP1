// Studiengang: MultiMediaTechnology / FHS
// Zweck: MultiMediaProjekt 1
// Autor: Xaver Rath
$(document).ready(function() {
    $('#search-input').keyup(function() {
      var searchQuery = $(this).val();
  
      if (searchQuery.length >= 2) {
        performSearch(searchQuery);
      } else {
        $('#search-results').empty().addClass('hidden');
      }
    });
  
    $(document).on('click', '.search-result', function() {
      var resultText = $(this).text().trim();
      $('#search-input').val(resultText);
      $('#search-results').empty().addClass('hidden');
    });
  
    function performSearch(searchQuery) {
      $.ajax({
        url: 'search.php',
        type: 'GET',
        data: { search: searchQuery },
        dataType: 'json',
        success: function(response) {
          displaySearchResults(response);
        }
      });
    }
  
    function displaySearchResults(results) {
      var searchResultsContainer = $('#search-results');
      searchResultsContainer.empty().removeClass('hidden');
  
      if (results.length > 0) {
        for (var i = 0; i < results.length; i++) {
          var resultItem = $('<div class="search-result bg-white mt-1 p-2 cursor-pointer">' + results[i] + '</div>');
          searchResultsContainer.append(resultItem);
        }
      } else {
        searchResultsContainer.html('<div class="no-results bg-white mt-1 p-2">No results found.</div>');
      }
    }
  });
  