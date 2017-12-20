$(document).ready(function () {
    function getBooksBorrowed() {
        $.ajax({
            url: 'server/bookBorrowed.php',
            data: "",
            dataType: 'json',
            success: function (response) {
                var trHTML = '';
                let data = [];

                response.forEach(element => {
                    let object = {
                        username: element[1],
                        isbn: element[2],
                        dateborrowed: element[3]
                    }
                    data.push(object);
                });

                $.each(data, function (i, item) {
                    trHTML += '<tr><td>' + item.isbn + '</td><td>' + item.username + '</td><td>' + item.dateborrowed + '</td><td></td></tr>';
                });
                $('#records_table').append(trHTML);
            }
        })
    }

    getBooksBorrowed();
});