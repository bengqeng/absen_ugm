window.attendanceDetails = function (id) {
    $.ajax({
        type: "GET",
        url: '/admin/attendance/' + id,
        dataType: "json",
        success: function (data) {
            // handle the response data
            const attendanceDetailsModal = $('#attendanceDetailsModal');
            attendanceDetailsModal.on('show.bs.modal', event => {
                var full_name = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(1)').find('td:last-child').text(data.user.name);
                var date = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(2)').find('td:last-child').text(data.created_at);
                var check_in = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(3)').find('td:last-child').text(data.hours_checkin + ' ' + data.status_in);
                var check_out = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(4)').find('td:last-child').text(data.hours_checkout + ' ' + data.status_out);
                var note_in = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(5)').find('td:last-child').text(data.note_in);
                var note_out = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(6)').find('td:last-child').text(data.note_out);
                var totalWorkHours = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(7)').find('td:last-child').text(data.total_work_time);
            });
            attendanceDetailsModal.modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // handle the error
            console.error(textStatus, errorThrown);
        }
    });
}



