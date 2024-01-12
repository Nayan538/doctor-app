// var currentDate = new Date();
//
// function deleteItemRow() {
//     deleteItem = document.querySelectorAll('.delete-item');
//     for (var i = 0; i < deleteItem.length; i++) {
//         deleteItem[i].addEventListener('click', function() {
//             this.parentElement.parentNode.parentNode.parentNode.remove();
//         })
//     }
// }
//
// document.getElementsByClassName('additem')[0].addEventListener('click', function() {
//   console.log('dfdf')
//
//   getTableElement = document.querySelector('.item-table');
//   currentIndex = getTableElement.rows.length;
//
//   $html = '<tr>'+
//     '<td class="delete-item-row">'+
//       '<i class="far fa-times-circle text-danger pt-2"></i>'+
//     '</td>'+
//     '<td class="description">' +
//       '<div class="input-group">'+
//         '<select name="" class="form-control form-control-sm tom-select">'+
//         '<option disabled selected>Choose Product *</option>'+
//     '<option>Nylon</option>'+
//     '<option>Silk</option>'+
//     '<option>Collar Sticker</option>'+
//     '<option>Wool</option>'+
//     '</select>'+
//     '<button class="btn btn-sm btn-info" type="button" title="Add New Product" data-bs-toggle="modal" data-bs-target="#createModal">'+
//         '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>'+
//     '</button>'+
//     '</div>' +
//       '</td>'+
//     '<td class="rate">'+
//         '<input type="text" class="form-control  form-control-sm" placeholder="Price">'+
//     '</td>'+
//     '<td class="text-right qty"><input type="text" class="form-control  form-control-sm" placeholder="Quantity"></td>'+
//       '<td class="text-right qty">--' +
//       '</td>'+
//     '<td class="text-right amount"><span class="editable-amount"><span class="currency">$</span> <span class="amount">0.00</span></td>'+
//     '</tr>';
//
//   $(".item-table tbody").append($html);
//   deleteItemRow();
//
// })
//
// deleteItemRow();