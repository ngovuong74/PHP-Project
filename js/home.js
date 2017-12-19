$(document).ready(function () {
    function getBooksBorrowed() {
        $.ajax({
            url: 'server/bookBorrowed.php',
            data: "",
            dataType: 'json',
            // success: function (data) {
            //     console.log(data);
            // }
            success: function (response) {
                var trHTML = '';
                let data = [];

                response.forEach(element => {
                    let object = {
                        username: element[0],
                        isbn: element[1]
                    }
                    data.push(object);
                });

                $.each(data, function (i, item) {
                    trHTML += '<tr><td>' + item.username + '</td><td>' + item.isbn + '</td></tr>';
                });
                $('#records_table').append(trHTML);
            }
        })
    }

    function getBooks() {
        $.ajax({
            url: 'server/bookDB.php',
            data: "",
            dataType: 'json',
            // success: function (data) {
            //     console.log(data);
            // }
            success: function (response) {
                var trHTML = '';
                let data = [];

                response.forEach(element => {
                    let object = {
                        isbn: element[0],
                        title: element[1],
                        genre: element[2],
                        quantity: element[3]
                    }
                    data.push(object);
                });

                $.each(data, function (i, item) {
                    trHTML += '<tr><td>' + item.isbn + '</td><td>' + item.title + '</td><td>' + item.genre + '</td><td>' + item.quantity + '</td></tr>';
                });
                $('#book_table').append(trHTML);
            }
        })
    }

    getBooks();
    getBooksBorrowed();
});