window.attendanceDetails = function (id) {
    $.ajax({
        type: "GET",
        url: '/staff/attendance/' + id,
        dataType: "json",
        success: function (data) {
            // handle the response data
            console.log(data);
            const attendanceDetailsModal = $('#attendanceDetailsModal');
            attendanceDetailsModal.on('show.bs.modal', event => {
                var full_name = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(1)').find('td:last-child').text(data.user.name);
                var date = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(2)').find('td:last-child').text(data.date_attendance);
                var check_in = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(3)').find('td:last-child').text(data.hours_checkin + ' ' + data.status_in);
                var check_out = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(4)').find('td:last-child').text(data.hours_checkout + ' ' + data.status_out);
                var note_in = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(5)').find('td:last-child').text(data.note_in);
                var note_out = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(6)').find('td:last-child').text(data.note_out);
                var totalWorkHours = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(7)').find('td:last-child').text(data.total_work_time);
                var overtime = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(8)').find('td:last-child').text(data.overtime);
                var note_overtime = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(9)').find('td:last-child').text(data.note_overtime);
            });
            attendanceDetailsModal.modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // handle the error
            console.error(textStatus, errorThrown);
        }
    });
}
