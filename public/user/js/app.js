/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/user/app.js":
/*!**********************************!*\
  !*** ./resources/js/user/app.js ***!
  \**********************************/
/***/ (() => {

eval("window.attendanceDetails = function (id) {\n  $.ajax({\n    type: \"GET\",\n    url: '/staff/attendance/' + id,\n    dataType: \"json\",\n    success: function success(data) {\n      // handle the response data\n      console.log(data);\n      var attendanceDetailsModal = $('#attendanceDetailsModal');\n      attendanceDetailsModal.on('show.bs.modal', function (event) {\n        var full_name = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(1)').find('td:last-child').text(data.user.name);\n        var date = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(2)').find('td:last-child').text(data.date_attendance);\n        var check_in = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(3)').find('td:last-child').text(data.hours_checkin + ' ' + data.status_in);\n        var check_out = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(4)').find('td:last-child').text(data.hours_checkout + ' ' + data.status_out);\n        var note_in = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(5)').find('td:last-child').text(data.note_in);\n        var note_out = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(6)').find('td:last-child').text(data.note_out);\n        var totalWorkHours = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(7)').find('td:last-child').text(data.total_work_time);\n        var overtime = attendanceDetailsModal.find('.modal-body table').find('tr:nth-child(8)').find('td:last-child').text(data.overtime);\n      });\n      attendanceDetailsModal.modal(\"show\");\n    },\n    error: function error(jqXHR, textStatus, errorThrown) {\n      // handle the error\n      console.error(textStatus, errorThrown);\n    }\n  });\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJ3aW5kb3ciLCJhdHRlbmRhbmNlRGV0YWlscyIsImlkIiwiJCIsImFqYXgiLCJ0eXBlIiwidXJsIiwiZGF0YVR5cGUiLCJzdWNjZXNzIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJhdHRlbmRhbmNlRGV0YWlsc01vZGFsIiwib24iLCJldmVudCIsImZ1bGxfbmFtZSIsImZpbmQiLCJ0ZXh0IiwidXNlciIsIm5hbWUiLCJkYXRlIiwiZGF0ZV9hdHRlbmRhbmNlIiwiY2hlY2tfaW4iLCJob3Vyc19jaGVja2luIiwic3RhdHVzX2luIiwiY2hlY2tfb3V0IiwiaG91cnNfY2hlY2tvdXQiLCJzdGF0dXNfb3V0Iiwibm90ZV9pbiIsIm5vdGVfb3V0IiwidG90YWxXb3JrSG91cnMiLCJ0b3RhbF93b3JrX3RpbWUiLCJvdmVydGltZSIsIm1vZGFsIiwiZXJyb3IiLCJqcVhIUiIsInRleHRTdGF0dXMiLCJlcnJvclRocm93biJdLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdXNlci9hcHAuanM/YzgxOSJdLCJzb3VyY2VzQ29udGVudCI6WyJ3aW5kb3cuYXR0ZW5kYW5jZURldGFpbHMgPSBmdW5jdGlvbiAoaWQpIHtcclxuICAgICQuYWpheCh7XHJcbiAgICAgICAgdHlwZTogXCJHRVRcIixcclxuICAgICAgICB1cmw6ICcvc3RhZmYvYXR0ZW5kYW5jZS8nICsgaWQsXHJcbiAgICAgICAgZGF0YVR5cGU6IFwianNvblwiLFxyXG4gICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgIC8vIGhhbmRsZSB0aGUgcmVzcG9uc2UgZGF0YVxyXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuICAgICAgICAgICAgY29uc3QgYXR0ZW5kYW5jZURldGFpbHNNb2RhbCA9ICQoJyNhdHRlbmRhbmNlRGV0YWlsc01vZGFsJyk7XHJcbiAgICAgICAgICAgIGF0dGVuZGFuY2VEZXRhaWxzTW9kYWwub24oJ3Nob3cuYnMubW9kYWwnLCBldmVudCA9PiB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZnVsbF9uYW1lID0gYXR0ZW5kYW5jZURldGFpbHNNb2RhbC5maW5kKCcubW9kYWwtYm9keSB0YWJsZScpLmZpbmQoJ3RyOm50aC1jaGlsZCgxKScpLmZpbmQoJ3RkOmxhc3QtY2hpbGQnKS50ZXh0KGRhdGEudXNlci5uYW1lKTtcclxuICAgICAgICAgICAgICAgIHZhciBkYXRlID0gYXR0ZW5kYW5jZURldGFpbHNNb2RhbC5maW5kKCcubW9kYWwtYm9keSB0YWJsZScpLmZpbmQoJ3RyOm50aC1jaGlsZCgyKScpLmZpbmQoJ3RkOmxhc3QtY2hpbGQnKS50ZXh0KGRhdGEuZGF0ZV9hdHRlbmRhbmNlKTtcclxuICAgICAgICAgICAgICAgIHZhciBjaGVja19pbiA9IGF0dGVuZGFuY2VEZXRhaWxzTW9kYWwuZmluZCgnLm1vZGFsLWJvZHkgdGFibGUnKS5maW5kKCd0cjpudGgtY2hpbGQoMyknKS5maW5kKCd0ZDpsYXN0LWNoaWxkJykudGV4dChkYXRhLmhvdXJzX2NoZWNraW4gKyAnICcgKyBkYXRhLnN0YXR1c19pbik7XHJcbiAgICAgICAgICAgICAgICB2YXIgY2hlY2tfb3V0ID0gYXR0ZW5kYW5jZURldGFpbHNNb2RhbC5maW5kKCcubW9kYWwtYm9keSB0YWJsZScpLmZpbmQoJ3RyOm50aC1jaGlsZCg0KScpLmZpbmQoJ3RkOmxhc3QtY2hpbGQnKS50ZXh0KGRhdGEuaG91cnNfY2hlY2tvdXQgKyAnICcgKyBkYXRhLnN0YXR1c19vdXQpO1xyXG4gICAgICAgICAgICAgICAgdmFyIG5vdGVfaW4gPSBhdHRlbmRhbmNlRGV0YWlsc01vZGFsLmZpbmQoJy5tb2RhbC1ib2R5IHRhYmxlJykuZmluZCgndHI6bnRoLWNoaWxkKDUpJykuZmluZCgndGQ6bGFzdC1jaGlsZCcpLnRleHQoZGF0YS5ub3RlX2luKTtcclxuICAgICAgICAgICAgICAgIHZhciBub3RlX291dCA9IGF0dGVuZGFuY2VEZXRhaWxzTW9kYWwuZmluZCgnLm1vZGFsLWJvZHkgdGFibGUnKS5maW5kKCd0cjpudGgtY2hpbGQoNiknKS5maW5kKCd0ZDpsYXN0LWNoaWxkJykudGV4dChkYXRhLm5vdGVfb3V0KTtcclxuICAgICAgICAgICAgICAgIHZhciB0b3RhbFdvcmtIb3VycyA9IGF0dGVuZGFuY2VEZXRhaWxzTW9kYWwuZmluZCgnLm1vZGFsLWJvZHkgdGFibGUnKS5maW5kKCd0cjpudGgtY2hpbGQoNyknKS5maW5kKCd0ZDpsYXN0LWNoaWxkJykudGV4dChkYXRhLnRvdGFsX3dvcmtfdGltZSk7XHJcbiAgICAgICAgICAgICAgICB2YXIgb3ZlcnRpbWUgPSBhdHRlbmRhbmNlRGV0YWlsc01vZGFsLmZpbmQoJy5tb2RhbC1ib2R5IHRhYmxlJykuZmluZCgndHI6bnRoLWNoaWxkKDgpJykuZmluZCgndGQ6bGFzdC1jaGlsZCcpLnRleHQoZGF0YS5vdmVydGltZSk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBhdHRlbmRhbmNlRGV0YWlsc01vZGFsLm1vZGFsKFwic2hvd1wiKTtcclxuICAgICAgICB9LFxyXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbiAoanFYSFIsIHRleHRTdGF0dXMsIGVycm9yVGhyb3duKSB7XHJcbiAgICAgICAgICAgIC8vIGhhbmRsZSB0aGUgZXJyb3JcclxuICAgICAgICAgICAgY29uc29sZS5lcnJvcih0ZXh0U3RhdHVzLCBlcnJvclRocm93bik7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn1cclxuIl0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDQyxpQkFBaUIsR0FBRyxVQUFVQyxFQUFFLEVBQUU7RUFDckNDLENBQUMsQ0FBQ0MsSUFBSSxDQUFDO0lBQ0hDLElBQUksRUFBRSxLQUFLO0lBQ1hDLEdBQUcsRUFBRSxvQkFBb0IsR0FBR0osRUFBRTtJQUM5QkssUUFBUSxFQUFFLE1BQU07SUFDaEJDLE9BQU8sRUFBRSxpQkFBVUMsSUFBSSxFQUFFO01BQ3JCO01BQ0FDLE9BQU8sQ0FBQ0MsR0FBRyxDQUFD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\n//# sourceURL=webpack-internal:///./resources/js/user/app.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/user/app.js"]();
/******/ 	
/******/ })()
;