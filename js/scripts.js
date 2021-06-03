$.getJSON("https://www.googleapis.com/books/v1/volumes?q=2021%20books",
  function (data) {

    var indexOfData = 0;

    console.log(data);

    $(".book-image").each(function () {
      let imgLinks = data.items[indexOfData].volumeInfo.imageLinks.thumbnail;
      let bookID = data.items[indexOfData].id;
      let bookTitle = data.items[indexOfData].volumeInfo.title;

      $(this).attr("src", imgLinks);
      $(this).parent().parent().attr("href", "book.php?id=" + bookID);
      $(this).next().next().text(bookTitle);

      indexOfData++;
    });
    
  }
);
