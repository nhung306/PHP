$("div.alert").delay(3000).slideUp();

function confirmDelete(delUrl) {
  if (confirm("Bạn có chắc chắn xóa không ?")) {
    document.location = delUrl;
  }
}
