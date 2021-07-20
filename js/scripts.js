var book_data;
var filtered_book_data = [];
var jsondata;
var start_i = 0;

// Query
// https://developers.google.com/books/docs/v1/using

//https://www.googleapis.com/books/v1/volumes?q=Cooking&filter=paid-ebooks&orderBy=relevance&maxResults=40
//https://www.googleapis.com/books/v1/volumes?q=Health%20&%20Fitness&filter=paid-ebooks&orderBy=relevance&startIndex=0&maxResults=40

$(document).ready(function() {

  let author = $("#current_author").text();
  
  getBookData(author);
  // getBookData("Games & Activities");

});

function getBookDatabyAuthor(q) {
  $.getJSON("https://www.googleapis.com/books/v1/volumes?q="+q+"&filter=paid-ebooks&orderBy=relevance&startIndex=0&maxResults=20",
    function (data) {
  
      console.log(data);
  
      //When sending data to a web server, the data has to be a string.
      //Convert a JavaScript object into a string with JSON.stringify().
      book_data = JSON.stringify(data.items);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "process.php", !0);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(book_data);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText);
          // in case we reply back from server
          jsondata = JSON.parse(xhr.responseText);
          console.log(jsondata);
        }
      };

    }
  );
}

function getBookData(q) {
  $.getJSON("https://www.googleapis.com/books/v1/volumes?q="+q+"&filter=paid-ebooks&orderBy=relevance&startIndex=20&maxResults=30",
    function (data) {
  
      console.log(data);
  
      //When sending data to a web server, the data has to be a string.
      //Convert a JavaScript object into a string with JSON.stringify().
      book_data = JSON.stringify(data.items);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "process.php", !0);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(book_data);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText);
          // in case we reply back from server
          jsondata = JSON.parse(xhr.responseText);
          console.log(jsondata);
        }
      };

    }
  );
}