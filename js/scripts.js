var book_data;
var jsondata;

$.getJSON(
  "https://www.googleapis.com/books/v1/volumes?q=2021%20books",
  function (data) {
    var indexOfData = 0;

    console.log(data);

    $(".book-image").each(function () {
      let imgLinks = data.items[indexOfData].volumeInfo.imageLinks.thumbnail;
      let bookID = data.items[indexOfData].id;
      let bookTitle = data.items[indexOfData].volumeInfo.title;

      $(this).attr("src", imgLinks);
      $(this)
        .parent()
        .parent()
        .attr("href", "book.php?id=" + bookID);
      $(this).next().next().text(bookTitle);

      indexOfData++;
    });

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

    // https://javascript.info/xmlhttprequest
  }
);

