$.getJSON("https://www.googleapis.com/books/v1/volumes?q=2021%20books",
  function (data) {
    var indexOfImage = 0;
    var indexOfBookTitle = 0;

    console.log(data);

    $(".book-image").each(function () {
      let imgLinks = data.items[indexOfImage].volumeInfo.imageLinks.thumbnail;
      $(this).attr("src", imgLinks);
      indexOfImage++;
    });

    $(".book-title").each(function () {
      let bookTitle = data.items[indexOfBookTitle].volumeInfo.title;
      $(this).text(bookTitle);
      indexOfBookTitle++;
    });
  }
);
