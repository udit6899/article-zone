function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgb(" + parseInt(matches[1], 16) +
                "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
    return rgb;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) +
                "," + parseInt(matches[3], 16) + "," + opacity + ")";
    return rgb;
}

$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

$(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2)
                .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ')
                .replace('.', ',');
        }
    });

    initSparkline();
});

function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}

// Delete items operation
function deleteItem(key) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure ?',
        text: "You won't be able to revert this !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it !',
        cancelButtonText: 'No, cancel !',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-' + key).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your item is safe :)',
                'error'
            )
        }
    })
}

// Approve post operation
function approveItem(key) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure ?',
        text: "You want to approve this !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, approve it !',
        cancelButtonText: 'No, cancel !',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approval-form-' + key).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your item remain pending :)',
                'error'
            )
        }
    })
}

// Edit comment details
function editComment(commentObj) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Modify Your Comment',
        input: 'textarea',
        inputValue: commentObj.comment,
        showCancelButton: true,
        confirmButtonText: 'Update',
        inputPlaceholder: "Write something...",
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            document.getElementById('comment-' + commentObj.id).value = result.value;
            document.getElementById('update-comment-' + commentObj.id).submit();
        } else if (result.value === "") {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'You need to write something !',
                'error'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your comment remain unchanged :)',
                'error'
            )
        }
    })
}


// Reply a message
function replyMessage(messageObj) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Send A Reply',
        input: 'textarea',
        showCancelButton: true,
        confirmButtonText: 'Reply',
        inputPlaceholder: "Write something...",
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            document.getElementById('message-' + messageObj.id).value = result.value;
            document.getElementById('reply-message-' + messageObj.id).submit();
        } else if (result.value === "") {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'You need to write something !',
                'error'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'The message remain pending !',
                'error'
            )
        }
    })
}

// Read category details
function readCategory(category, imageUrl) {
    Swal.fire({
        title: category.name,
        text: category.description,
        imageUrl: imageUrl,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
    })
}

// Read author details
function readAuthor(author, imageUrl) {
    Swal.fire({
        title: author.name,
        html: '<p>Email Address: ' + author.email + '</p>' +
            '<p> Mobile Number: ' + author.mobile_no + '</p>' +
            '<br><p class="text-warning">' + (author.about || " ") + '</p><br>' +
            '<div>' +
                '<i class="material-icons text-primary">library_books</i>' +
                '<span> ' + author.posts_count + '</span>' +
                ' <i class="material-icons text-danger">favorite</i>' +
                '<span> ' + author.favourite_posts_count + '</span>' +
                ' <i class="material-icons text-primary">comment</i>' +
                '<span> ' + author.comments_count + '</span>' +
            '</div>',
        imageUrl: imageUrl,
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Custom image',
    })
}

// Read message details
function readMessage(message) {
    Swal.fire({
        title: message.name,
        html: '<p>Email Address: ' + message.email + '</p>' +
                '<br><p class="text-warning">' + (message.message || " ") + '</p><br>' +
            '<div>' +
                '<span>On :' + message.created_at + ' </span>' +
            '</div>',
        icon: 'info'
    })
}

